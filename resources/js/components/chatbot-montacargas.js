export default function forkliftChatbot(dataset, csrfToken) {
    return {
        open: false,
        step: 'type',
        messages: [],
        currentOptions: [],
        results: [],
        fallbackImage: '/img/home/shop/650-10-500.png',
        csrfToken: csrfToken || '',
        isSubmitting: false,

        state: {
            type: null,
            measure: null,
        },

        rawProducts: dataset?.products ?? [],
        products: [],

        showSpecialistForm: false,
        specialistForm: {
            name: '',
            company: '',
            phone: '',
            email: '',
            message: '',
        },

        init() {
            this.products = this.normalizeProducts(this.rawProducts);
            this.restart();
        },

        normalizeProducts(products) {
            return (products || [])
                .filter(item => item && item.title && item.url && item.type)
                .map(item => ({
                    ...item,
                    type: (item.type || '').trim(),
                    measure: (item.measure || '').trim(),
                    title: (item.title || '').trim(),
                    price_label: item.price_label || null,
                    image: item.image || null,
                }));
        },

        getTypeLabel(type) {
            const labels = {
                solida: 'Sólida',
                solida_con_arillo: 'Sólida con arillo',
                neumatica: 'Neumática',
                neumatica_radial: 'Neumática radial',
                poliuretano: 'Poliuretano',
            };

            return labels[type] || type;
        },

        uniqueByValue(values) {
            return [...new Set(values.filter(Boolean))];
        },

        getAvailableTypes() {
            const types = this.uniqueByValue(
                this.products
                    .filter(item => item.measure)
                    .map(item => item.type)
            );

            return types
                .map(type => ({
                    value: type,
                    label: this.getTypeLabel(type),
                }))
                .sort((a, b) => a.label.localeCompare(b.label, 'es'));
        },

        getAvailableMeasures(type) {
            return this.uniqueByValue(
                this.products
                    .filter(item => item.type === type && item.measure)
                    .map(item => item.measure)
            ).sort((a, b) => a.localeCompare(b, 'es', { numeric: true, sensitivity: 'base' }));
        },

        isBusinessHours() {
            const now = new Date();
            const day = now.getDay();
            const hour = now.getHours();
            const minute = now.getMinutes();
            const currentTime = hour + (minute / 60);

            return day >= 1 && day <= 5 && currentTime >= 9 && currentTime < 18;
        },

        getWhatsAppUrl() {
            const text = encodeURIComponent(
                'Hola, necesito ayuda para encontrar la llanta correcta para mi montacargas.'
            );

            return `https://wa.me/528332395885?text=${text}`;
        },

        bot(text) {
            this.messages.push({
                id: crypto.randomUUID(),
                role: 'bot',
                text,
            });
        },

        user(text) {
            this.messages.push({
                id: crypto.randomUUID(),
                role: 'user',
                text,
            });
        },

        restart() {
            this.step = 'type';
            this.results = [];
            this.currentOptions = [];
            this.showSpecialistForm = false;
            this.isSubmitting = false;

            this.state = {
                type: null,
                measure: null,
            };

            this.specialistForm = {
                name: '',
                company: '',
                phone: '',
                email: '',
                message: '',
            };

            this.messages = [];
            this.bot('Hola. Te ayudo a encontrar la llanta adecuada para tu montacargas.');
            this.askType();
        },

        resetAndClose() {
            this.open = false;
            this.restart();
        },

        askType() {
            this.step = 'type';
            this.showSpecialistForm = false;
            this.bot('Para empezar, dime qué tipo de llanta necesitas.');

            this.currentOptions = [
                ...this.getAvailableTypes(),
                { value: 'no_se', label: 'No estoy seguro' },
            ];
        },

        askMeasure() {
            this.step = 'measure';
            this.showSpecialistForm = false;

            const measures = this.getAvailableMeasures(this.state.type);

            if (!measures.length) {
                this.askSpecialistHelp('No encontré medidas configuradas para ese tipo. Te ayudo mejor con un asesor.');
                return;
            }

            this.bot('Ahora selecciona la medida para mostrarte opciones disponibles en tienda.');

            this.currentOptions = [
                ...measures.map(measure => ({
                    value: measure,
                    label: measure,
                })),
                { value: 'no_se', label: 'No estoy seguro' },
            ];
        },

        filteredProducts(filters = {}) {
            return this.products.filter(item => {
                if (filters.type && filters.type !== 'no_se' && item.type !== filters.type) return false;
                if (filters.measure && filters.measure !== 'no_se' && item.measure !== filters.measure) return false;
                return true;
            });
        },

        rankResults(items) {
            return [...items].sort((a, b) => {
                const aFeed = a.matched_from_feed ? 1 : 0;
                const bFeed = b.matched_from_feed ? 1 : 0;

                if (aFeed !== bFeed) return bFeed - aFeed;

                const aPrice = typeof a.price_mxn === 'number' ? a.price_mxn : Number.MAX_SAFE_INTEGER;
                const bPrice = typeof b.price_mxn === 'number' ? b.price_mxn : Number.MAX_SAFE_INTEGER;

                return aPrice - bPrice;
            });
        },

        showResults() {
            this.step = 'results';
            this.currentOptions = [];
            this.showSpecialistForm = false;

            const exact = this.filteredProducts(this.state);
            const fallbackByType = this.filteredProducts({
                type: this.state.type,
            });

            if (exact.length) {
                this.results = this.rankResults(exact).slice(0, 6);
                this.bot('Estas son las opciones que encontré para tu selección.');
                return;
            }

            if (fallbackByType.length) {
                this.results = this.rankResults(fallbackByType).slice(0, 6);
                this.bot('No encontré una opción exacta para esa medida. Te muestro otras alternativas del mismo tipo.');
                return;
            }

            this.results = [];
            this.askSpecialistHelp('No encontré una opción exacta en este momento. Te ayudo a cotizarla con un asesor.');
        },

        askSpecialistHelp(customMessage = null) {
            this.step = 'specialist';
            this.currentOptions = [];
            this.showSpecialistForm = false;

            this.bot(
                customMessage ||
                'Si no tienes clara la medida o el tipo de llanta, uno de nuestros asesores puede ayudarte a elegir la opción correcta.'
            );

            this.currentOptions = [
                { value: 'form', label: 'Solicitar asesoría especializada' },
                ...(this.isBusinessHours()
                    ? [{ value: 'whatsapp', label: 'Atención inmediata por WhatsApp' }]
                    : []),
            ];
        },

        selectOption(option) {
            this.user(option.label);

            if (this.step === 'type') {
                if (option.value === 'no_se') {
                    this.askSpecialistHelp();
                    return;
                }

                this.state.type = option.value;
                this.askMeasure();
                return;
            }

            if (this.step === 'measure') {
                if (option.value === 'no_se') {
                    this.askSpecialistHelp('Si no tienes clara la medida, te ayudo a encontrar la opción correcta con un asesor.');
                    return;
                }

                this.state.measure = option.value;
                this.showResults();
                return;
            }

            if (this.step === 'specialist') {
                if (option.value === 'form') {
                    this.showSpecialistForm = true;
                    this.bot('Déjanos tus datos y un asesor especializado te ayudará a identificar la opción adecuada para tu equipo.');
                    this.currentOptions = [];
                    return;
                }

                if (option.value === 'whatsapp') {
                    window.open(this.getWhatsAppUrl(), '_blank', 'noopener');
                }
            }
        },

        async submitSpecialistForm() {
            if (this.isSubmitting) return;

            this.isSubmitting = true;

            const payload = {
                name: this.specialistForm.name?.trim() || '',
                company: this.specialistForm.company?.trim() || '',
                phone: this.specialistForm.phone?.trim() || '',
                email: this.specialistForm.email?.trim() || '',
                message: this.specialistForm.message?.trim() || '',
                type: this.state.type,
                measure: this.state.measure,
            };

            try {
                const response = await fetch('/chatbot/specialist-request', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(payload),
                });

                const data = await response.json();

                if (!response.ok) {
                    if (data.errors) {
                        const firstError = Object.values(data.errors)?.[0]?.[0];
                        throw new Error(firstError || data.message || 'No se pudo enviar la solicitud.');
                    }

                    throw new Error(data.message || 'No se pudo enviar la solicitud.');
                }

                this.showSpecialistForm = false;
                this.bot('Gracias. Tu solicitud fue enviada correctamente y un asesor se pondrá en contacto contigo lo antes posible.');

                this.specialistForm = {
                    name: '',
                    company: '',
                    phone: '',
                    email: '',
                    message: '',
                };
            } catch (error) {
                this.bot(error.message || 'Ocurrió un problema al enviar tu solicitud. Intenta nuevamente.');
            } finally {
                this.isSubmitting = false;
            }
        },
    };
}
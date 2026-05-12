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
            tread: null,
            function: null,
            service: null,
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
                    type: item.type?.trim() || null,
                    measure: item.measure?.trim() || null,
                    tread: item.tread?.trim() || 'cualquiera',
                    function: item.function?.trim() || 'cualquiera',
                    service: item.service?.trim() || 'cualquiera',
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

        getAvailableTypes() {
            const grouped = {};

            this.products.forEach(item => {
                if (!item.type) return;
                if (!grouped[item.type]) grouped[item.type] = [];
                grouped[item.type].push(item);
            });

            return Object.entries(grouped)
                .filter(([_, items]) => items.some(item => item.measure))
                .map(([type]) => ({
                    value: type,
                    label: this.getTypeLabel(type),
                }))
                .sort((a, b) => a.label.localeCompare(b.label, 'es'));
        },

        getAvailableMeasures(type) {
            return [...new Set(
                this.products
                    .filter(item => item.type === type && item.measure)
                    .map(item => item.measure)
            )].sort((a, b) => a.localeCompare(b, 'es', { numeric: true, sensitivity: 'base' }));
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
            this.showSpecialistForm = false;
            this.isSubmitting = false;

            this.state = {
                type: null,
                measure: null,
                tread: null,
                function: null,
                service: null,
            };

            this.specialistForm = {
                name: '',
                company: '',
                phone: '',
                email: '',
                message: '',
            };

            this.messages = [];
            this.bot('Hola. Te ayudo a encontrar la llanta correcta para tu montacargas.');
            this.askType();
        },

        resetAndClose() {
            this.open = false;
            this.restart();
        },

        askType() {
            this.step = 'type';
            this.showSpecialistForm = false;
            this.bot('¿Qué tipo de llanta buscas?');

            const availableTypes = this.getAvailableTypes();

            this.currentOptions = [
                ...availableTypes,
                { value: 'no_se', label: 'No estoy segura' },
            ];
        },

        askMeasure() {
            this.step = 'measure';
            this.showSpecialistForm = false;

            const measures = this.getAvailableMeasures(this.state.type);

            if (!measures.length) {
                this.askSpecialistHelp('No encontré medidas configuradas para ese tipo. Te ayudo mejor con un especialista.');
                return;
            }

            this.bot('¿Qué medida necesitas?');

            this.currentOptions = [
                ...measures.map(measure => ({
                    value: measure,
                    label: measure,
                })),
                { value: 'no_se', label: 'No estoy segura' },
            ];
        },

        askTread() {
            this.step = 'tread';
            this.showSpecialistForm = false;

            const pool = this.filteredProducts({
                type: this.state.type,
                measure: this.state.measure,
            });

            const labels = {
                lisa: 'Lisa',
                traccion: 'Tracción',
                cualquiera: 'Cualquiera',
            };

            const options = [...new Set(pool.map(item => item.tread).filter(Boolean))]
                .filter(value => labels[value])
                .map(value => ({
                    value,
                    label: labels[value],
                }));

            if (!options.length) {
                this.state.tread = 'cualquiera';
                this.askFunction();
                return;
            }

            this.bot('¿Qué rodamiento buscas?');

            this.currentOptions = options.some(opt => opt.value === 'cualquiera')
                ? options
                : [...options, { value: 'cualquiera', label: 'Cualquiera' }];
        },

        askFunction() {
            this.step = 'function';
            this.showSpecialistForm = false;

            const pool = this.filteredProducts({
                type: this.state.type,
                measure: this.state.measure,
                tread: this.state.tread,
            });

            const labels = {
                estandar: 'Estándar',
                no_manchante: 'No manchante',
                cualquiera: 'Cualquiera',
            };

            const options = [...new Set(pool.map(item => item.function).filter(Boolean))]
                .filter(value => labels[value])
                .map(value => ({
                    value,
                    label: labels[value],
                }));

            if (!options.length) {
                this.state.function = 'cualquiera';
                this.askService();
                return;
            }

            this.bot('¿Qué función necesitas?');

            this.currentOptions = options.some(opt => opt.value === 'cualquiera')
                ? options
                : [...options, { value: 'cualquiera', label: 'Cualquiera' }];
        },

        askService() {
            this.step = 'service';
            this.showSpecialistForm = false;

            const pool = this.filteredProducts({
                type: this.state.type,
                measure: this.state.measure,
                tread: this.state.tread,
                function: this.state.function,
            });

            const labels = {
                medio: 'Trabajo medio',
                pesado: 'Trabajo pesado',
                extra_pesado: 'Trabajo extra pesado',
                cualquiera: 'Cualquiera',
            };

            const options = [...new Set(pool.map(item => item.service).filter(Boolean))]
                .filter(value => labels[value])
                .map(value => ({
                    value,
                    label: labels[value],
                }));

            if (!options.length) {
                this.state.service = 'cualquiera';
                this.showResults();
                return;
            }

            this.bot('¿Qué nivel de trabajo necesitas?');

            this.currentOptions = options.some(opt => opt.value === 'cualquiera')
                ? options
                : [...options, { value: 'cualquiera', label: 'Cualquiera' }];
        },

        askSpecialistHelp(customMessage = null) {
            this.step = 'specialist';
            this.currentOptions = [];
            this.results = [];
            this.showSpecialistForm = false;

            this.bot(
                customMessage ||
                'Si no tienes clara la medida o el tipo de llanta, te ayudo a hablar con un especialista.'
            );

            const specialistOptions = [
                { value: 'form', label: 'Hablar con un especialista' },
            ];

            if (this.isBusinessHours()) {
                specialistOptions.push({
                    value: 'whatsapp',
                    label: 'Chatear por WhatsApp',
                });
            }

            this.currentOptions = specialistOptions;
        },

        showResults() {
            this.step = 'results';
            this.currentOptions = [];
            this.showSpecialistForm = false;

            const exact = this.filteredProducts(this.state);
            const fallbackByMeasure = this.filteredProducts({
                type: this.state.type,
                measure: this.state.measure,
            });
            const fallbackByType = this.filteredProducts({
                type: this.state.type,
            });

            if (exact.length) {
                this.results = exact.slice(0, 4);
                this.bot('Estas son las opciones disponibles para tu selección.');
                return;
            }

            if (fallbackByMeasure.length) {
                this.results = fallbackByMeasure.slice(0, 4);
                this.bot('No encontré una coincidencia exacta con todos esos filtros. Te muestro alternativas de la misma medida.');
                return;
            }

            if (fallbackByType.length) {
                this.results = fallbackByType.slice(0, 4);
                this.bot('No encontré una opción exacta para esa medida. Te muestro otras opciones disponibles del mismo tipo.');
                return;
            }

            this.results = [];
            this.askSpecialistHelp('No encontré opciones exactas con esos filtros. Te ayudo mejor con un especialista.');
        },

        filteredProducts(filters = {}) {
            return this.products.filter(item => {
                if (filters.type && filters.type !== 'no_se' && item.type !== filters.type) return false;
                if (filters.measure && filters.measure !== 'no_se' && item.measure !== filters.measure) return false;
                if (filters.tread && filters.tread !== 'cualquiera' && item.tread !== filters.tread) return false;
                if (filters.function && filters.function !== 'cualquiera' && item.function !== filters.function) return false;
                if (filters.service && filters.service !== 'cualquiera' && item.service !== filters.service) return false;
                return true;
            });
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
                    this.askSpecialistHelp('Si no tienes clara la medida, te ayudo a contactar a un especialista.');
                    return;
                }

                this.state.measure = option.value;
                this.askTread();
                return;
            }

            if (this.step === 'tread') {
                this.state.tread = option.value;
                this.askFunction();
                return;
            }

            if (this.step === 'function') {
                this.state.function = option.value;
                this.askService();
                return;
            }

            if (this.step === 'service') {
                this.state.service = option.value;
                this.showResults();
                return;
            }

            if (this.step === 'specialist') {
                if (option.value === 'form') {
                    this.showSpecialistForm = true;
                    this.bot('Déjame tus datos y un especialista te ayudará a encontrar la llanta correcta.');
                    this.currentOptions = [];
                    return;
                }

                if (option.value === 'whatsapp') {
                    window.open(this.getWhatsAppUrl(), '_blank', 'noopener');
                    return;
                }
            }
        },

        async submitSpecialistForm() {
            if (this.isSubmitting) return;

            this.isSubmitting = true;
            

            try {
                const response = await fetch('/chatbot/specialist-request', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        name: this.specialistForm.name,
                        company: this.specialistForm.company,
                        phone: this.specialistForm.phone,
                        email: this.specialistForm.email,
                        message: this.specialistForm.message,
                        type: this.state.type,
                        measure: this.state.measure,
                    }),
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'No se pudo enviar la solicitud.');
                }

                this.showSpecialistForm = false;
                this.bot('Tu solicitud fue enviada correctamente. Un especialista te contactará pronto.');

                this.specialistForm = {
                    name: '',
                    company: '',
                    phone: '',
                    email: '',
                    message: '',
                };
            } catch (error) {
                this.bot(error.message || 'Ocurrió un error al enviar tu solicitud. Intenta de nuevo.');
            } finally {
                this.isSubmitting = false;
            }
        },
    };
}
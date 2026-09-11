import { sendRgxChatMessage } from '../services/rgx-chatbot-api';

export default function forkliftChatbot(dataset, csrfToken) {
    return {
        open: false,
        step: 'type',
        messages: [],
        currentOptions: [],
        results: [],
        fallbackImage: '/img/home/shop/650-10-500.png',
        csrfToken: csrfToken || '',
        isChatting: false,
        chatInput: '',
        claudeHistory: [],
        conversationId: null,
        chatStartedTracked: false,
        trackedProductKeys: [],
        trackedQuoteKeys: [],
        advisorSubmissionTracked: false,

        state: {
            type: null,
            measure: null,
        },

        rawProducts: dataset?.products ?? [],
        products: [],


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

        pushChatbotEvent(event, product = null) {
            const allowedEvents = [
                'rgx_chatbot_started',
                'rgx_chatbot_product_resolved',
                'rgx_chatbot_store_click',
                'rgx_chatbot_quote_generated',
                'rgx_chatbot_specialist_submitted',
            ];

            if (!allowedEvents.includes(event)) {
                return;
            }

            const payload = {
                event,
                brand: 'RUGUEX',
                channel: 'Chatbot IA',
            };

            const productId = Number(
                product?.product_id
            );

            if (
                Number.isInteger(productId)
                && productId > 0
                && [
                    'rgx_chatbot_product_resolved',
                    'rgx_chatbot_store_click',
                    'rgx_chatbot_quote_generated',
                ].includes(event)
            ) {
                payload.product_id = productId;
            }

            window.dataLayer =
                window.dataLayer || [];

            window.dataLayer.push(payload);
        },

        trackChatStarted() {
            if (this.chatStartedTracked) {
                return;
            }

            this.chatStartedTracked = true;

            this.pushChatbotEvent(
                'rgx_chatbot_started'
            );
        },

        openChat() {
            this.open = true;
            this.trackChatStarted();
        },

        trackProductResolved(product) {
            if (!product) {
                return;
            }

            const key = String(
                product.product_id
                || product.url
                || ''
            ).trim();

            if (
                !key
                || this.trackedProductKeys.includes(key)
            ) {
                return;
            }

            this.trackedProductKeys.push(key);

            this.pushChatbotEvent(
                'rgx_chatbot_product_resolved',
                product
            );
        },

        trackQuoteGenerated(quote, product = null) {
            const key = String(
                quote?.folio || ''
            ).trim();

            if (
                !key
                || this.trackedQuoteKeys.includes(key)
            ) {
                return;
            }

            this.trackedQuoteKeys.push(key);

            this.pushChatbotEvent(
                'rgx_chatbot_quote_generated',
                product
            );
        },

        trackStoreClick(product) {
            this.pushChatbotEvent(
                'rgx_chatbot_store_click',
                product
            );
        },

        trackAdvisorSubmitted(advisorRequest) {
            if (
                this.advisorSubmissionTracked
                || advisorRequest?.status !== 'submitted'
            ) {
                return;
            }

            this.advisorSubmissionTracked = true;

            this.pushChatbotEvent(
                'rgx_chatbot_specialist_submitted'
            );
        },

        requestAdvisorCallback() {
            if (this.isChatting) {
                return;
            }

            this.chatInput =
                'Prefiero dejar mis datos para que un especialista me contacte.';

            this.sendChatMessage();
        },

        bot(
            text,
            product = null,
            quote = null,
            advisorContact = null,
            advisorRequest = null
        ) {
            this.messages.push({
                id: crypto.randomUUID(),
                role: 'bot',
                text,
                product,
                quote,
                advisorContact,
                advisorRequest,
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
            this.step = 'chat';
            this.results = [];
            this.currentOptions = [];
            this.isChatting = false;
            this.chatInput = '';
            this.claudeHistory = [];
            this.conversationId = crypto.randomUUID();
            this.chatStartedTracked = false;
            this.trackedProductKeys = [];
            this.trackedQuoteKeys = [];
            this.advisorSubmissionTracked = false;

            this.state = {
                type: null,
                measure: null,
            };


            this.messages = [];
            this.bot(
                'Hola. Soy el asistente virtual de RUGUEX. Cuéntame qué llanta necesitas y te ayudaré a identificar la información necesaria.'
            );

            if (this.open) {
                this.trackChatStarted();
            }
        },

        resetAndClose() {
            this.open = false;
            this.restart();
        },

        askType() {
            this.step = 'type';
            this.bot('Para empezar, dime qué tipo de llanta necesitas.');

            this.currentOptions = [
                ...this.getAvailableTypes(),
                { value: 'no_se', label: 'No estoy seguro' },
            ];
        },

        askMeasure() {
            this.step = 'measure';

            const measures = this.getAvailableMeasures(this.state.type);

            if (!measures.length) {
                this.continueInChat();
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
            this.continueInChat();
        },

        continueInChat() {
            this.step = 'chat';
            this.currentOptions = [];
            this.results = [];

            this.bot(
                'No pude completar esa selección con esas opciones. Cuéntame en el chat qué tipo de llanta, medida, modelo o equipo tienes y lo revisamos contigo.'
            );
        },

        selectOption(option) {
            this.user(option.label);

            if (this.step === 'type') {
                if (option.value === 'no_se') {
                    this.continueInChat();
                    return;
                }

                this.state.type = option.value;
                this.askMeasure();
                return;
            }

            if (this.step === 'measure') {
                if (option.value === 'no_se') {
                    this.continueInChat();
                    return;
                }

                this.state.measure = option.value;
                this.showResults();
                return;
            }

        },

        async sendChatMessage() {
            if (this.isChatting) return;

            const message = this.chatInput?.trim() || '';

            if (!message) return;

            const history = this.claudeHistory.slice(-8);

            this.user(message);
            this.chatInput = '';
            this.isChatting = true;
            this.step = 'chat';
            this.currentOptions = [];
            this.results = [];

            try {
                const {
                    answer,
                    product,
                    quote,
                    advisorContact,
                    advisorRequest,
                } = await sendRgxChatMessage({
                    message,
                    history,
                    conversationId: this.conversationId,
                    csrfToken: this.csrfToken,
                });

                this.bot(
                    answer,
                    product,
                    quote,
                    advisorContact,
                    advisorRequest
                );

                this.trackProductResolved(product);
                this.trackQuoteGenerated(
                    quote,
                    product
                );

                this.trackAdvisorSubmitted(
                    advisorRequest
                );

                this.claudeHistory.push(
                    {
                        role: 'user',
                        text: message,
                    },
                    {
                        role: 'assistant',
                        text: answer,
                    }
                );

                this.claudeHistory = this.claudeHistory.slice(-8);
            } catch (error) {
                this.bot(
                    error.message
                    || 'No pude responder en este momento. Intenta nuevamente.'
                );
            } finally {
                this.isChatting = false;
            }
        },

    };
}
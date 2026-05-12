import './bootstrap';
// resources/js/app.js
import '@fortawesome/fontawesome-free/css/all.min.css'

import Alpine from 'alpinejs';
import forkliftChatbot from './components/chatbot-montacargas';

window.Alpine = Alpine;
Alpine.data('forkliftChatbot', forkliftChatbot);
Alpine.start();
document.addEventListener('DOMContentLoaded', () => {
    const widget = document.getElementById('ruguex-whatsapp-widget');
    if (!widget) return;

    const chatBox = document.getElementById('ruguex-chat-box');
    const bubble = document.getElementById('ruguex-chat-bubble');
    const closeBtn = document.getElementById('ruguex-chat-close');
    const whatsappLink = document.getElementById('ruguex-whatsapp-link');

    const waMobile = widget.dataset.waMobile;
    const waDesktop = widget.dataset.waDesktop;
    const pushDataLayer = widget.dataset.pushDatalayer === '1';
    const useGtagDirect = widget.dataset.useGtagDirect === '1';
    const gtagSendTo = widget.dataset.gtagSendTo;

    const isMobileDevice = () => {
        return /Android|iPhone|iPad|iPod|Opera Mini|IEMobile|WPDesktop/i.test(navigator.userAgent)
            || window.innerWidth < 768;
    };

    const getWhatsappUrl = () => {
        return isMobileDevice() ? waMobile : waDesktop;
    };

    const toggleChatBox = () => {
        if (!chatBox) return;

        const isHidden = window.getComputedStyle(chatBox).display === 'none';
        chatBox.style.display = isHidden ? 'block' : 'none';
    };

    if (bubble) {
        bubble.addEventListener('click', toggleChatBox);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', toggleChatBox);
    }

    if (whatsappLink) {
        whatsappLink.addEventListener('click', (event) => {
            const url = getWhatsappUrl();
            whatsappLink.setAttribute('href', url);

            if (pushDataLayer) {
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({
                    event: 'Click to Chat',
                    channel: 'WhatsApp',
                    brand: 'RUGUEX',
                    destination: url,
                });
            }

            if (useGtagDirect && typeof window.gtag === 'function' && gtagSendTo) {
                window.gtag('event', 'conversion', {
                    send_to: gtagSendTo,
                });
            }
        });
    }
});
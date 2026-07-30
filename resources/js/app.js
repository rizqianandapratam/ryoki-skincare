import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Global Marketplace Click Tracker Helper
window.trackMarketplaceClick = function (platform, productName = 'General', productId = null, buttonLocation = 'General') {
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        const payload = {
            platform: platform,
            product_id: productId,
            product_name: productName,
            button_location: buttonLocation
        };

        if (navigator.sendBeacon) {
            const formData = new FormData();
            formData.append('_token', csrfToken || '');
            formData.append('platform', platform);
            if (productId) formData.append('product_id', productId);
            if (productName) formData.append('product_name', productName);
            if (buttonLocation) formData.append('button_location', buttonLocation);
            navigator.sendBeacon('/analytics/click', formData);
        } else {
            fetch('/analytics/click', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken || ''
                },
                body: JSON.stringify(payload),
                keepalive: true
            }).catch(() => {});
        }

        if (typeof window.gtag === 'function') {
            window.gtag('event', 'click_' + platform + '_store', {
                product_name: productName,
                product_id: productId,
                button_location: buttonLocation
            });
        }
    } catch (e) {
        console.error('[Tracking Error]', e);
    }
    return true;
};

window.trackShopeeClick = function (productName = 'General', productId = null, buttonLocation = 'General') {
    return window.trackMarketplaceClick('shopee', productName, productId, buttonLocation);
};

window.trackTikTokClick = function (productName = 'General', productId = null, buttonLocation = 'General') {
    return window.trackMarketplaceClick('tiktok', productName, productId, buttonLocation);
};

window.trackWhatsAppClick = function (productName = 'General', productId = null, buttonLocation = 'General') {
    return window.trackMarketplaceClick('whatsapp', productName, productId, buttonLocation);
};

Alpine.start();

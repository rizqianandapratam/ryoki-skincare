import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// GA4 Shopee Click Tracking Helper
window.trackShopeeClick = function (productName = 'General', productId = null, buttonLocation = 'General') {
    if (typeof window.gtag === 'function') {
        window.gtag('event', 'click_shopee_store', {
            product_name: productName,
            product_id: productId,
            button_location: buttonLocation
        });
    } else {
        console.log('[GA4 Event] click_shopee_store', {
            product_name: productName,
            product_id: productId,
            button_location: buttonLocation
        });
    }
};

Alpine.start();

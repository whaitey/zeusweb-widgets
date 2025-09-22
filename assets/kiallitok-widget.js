jQuery(document).ready(function($) {
    // Kiállítók Widget Pagination
    $('.kiallitok-wrapper').each(function() {
        const $wrapper = $(this);
        const $items = $wrapper.find('.kiallitok-item');
        const $dots = $wrapper.find('.kiallitok-pagination-dot');
        const $prevBtn = $wrapper.find('.kiallitok-pagination-arrow-left');
        const $nextBtn = $wrapper.find('.kiallitok-pagination-arrow-right');
        const $mapLinks = $wrapper.find('.kiallitok-map-link');
        const wrapperOffset = parseInt($wrapper.data('scroll-offset')) || 0;
        
        let currentPage = 1;
        const totalPages = $dots.length;
        
        // If no pagination, show all items
        if (totalPages === 0) {
            $items.show();
            return;
        }
        
        // Add pagination-active class to enable pagination CSS
        $wrapper.addClass('pagination-active');
        
        // Function to show page
        function showPage(pageNumber) {
            // Hide all items
            $items.removeClass('active').hide();
            
            // Show items for current page
            $items.filter('[data-page="' + pageNumber + '"]').addClass('active').show();
            
            // Update dots
            $dots.removeClass('active');
            $dots.filter('[data-page="' + pageNumber + '"]').addClass('active');
            
            // Update arrow states
            $prevBtn.prop('disabled', pageNumber === 1);
            $nextBtn.prop('disabled', pageNumber === totalPages);
            
            currentPage = pageNumber;
        }
        
        // Dot click handler
        $dots.on('click', function() {
            const pageNumber = parseInt($(this).data('page'));
            showPage(pageNumber);
        });
        
        // Arrow click handlers
        $prevBtn.on('click', function() {
            if (currentPage > 1) {
                showPage(currentPage - 1);
            }
        });
        
        $nextBtn.on('click', function() {
            if (currentPage < totalPages) {
                showPage(currentPage + 1);
            }
        });
        
        // Initialize first page
        if (totalPages > 0) {
            showPage(1);
        }

        // Map link click: scroll to hotspot and open it
        $mapLinks.on('click', function(e) {
            e.preventDefault();
            const selector = $(this).data('hotspot-selector');
            if (!selector) return;

            // Find target element (supports ID/class/custom selector)
            const $target = $(selector).first();
            if ($target.length === 0) return;

            // Calculate scroll offset considering fixed admin bar/headers
            const adminBarHeight = $('#wpadminbar').length ? $('#wpadminbar').outerHeight() : 0;
            let headerOffset = 0;
            // Use simple, predictable offset: admin bar + configurable offset
            const offsetTop = Math.max(0, $target.offset().top - adminBarHeight - wrapperOffset);

            // Smooth scroll
            $('html, body').animate({ scrollTop: offsetTop }, 500, function() {
                // No additional adjustments; rely on configured offset for stability

                // Try to open Elementor hotspot widgets
                const tryOpenHotspot = () => {
                    try {
                        // Prefer explicit clickable controls inside hotspot
                        let $marker = $target.find('.e-hotspot__button, .elementor-hotspot__button, .e-hotspot__marker, .e-hotspot, .elementor-hotspot, button[role="button"], button').filter(':visible').first();

                        if (!$marker.length && ($target.is('.e-hotspot, .elementor-hotspot, .e-hotspot__button, .elementor-hotspot__button, .e-hotspot__marker, button'))) {
                            $marker = $target;
                        }

                        if ($marker && $marker.length) {
                            // Temporary active styling
                            $marker.addClass('kiallitok-hotspot-active');
                            setTimeout(() => $marker.removeClass('kiallitok-hotspot-active'), 2500);

                            // Trigger events to open
                            $marker.trigger('mouseenter');
                            $marker.trigger('click');
                            // Dispatch native click for good measure
                            if ($marker.get(0)) {
                                $marker.get(0).dispatchEvent(new MouseEvent('click', { bubbles: true, cancelable: true }));
                            }
                        } else {
                            // Fallback: style and click the target itself
                            $target.addClass('kiallitok-hotspot-active');
                            setTimeout(() => $target.removeClass('kiallitok-hotspot-active'), 2500);
                            $target.trigger('click');
                        }
                    } catch (err) {
                        // Fail silently
                    }
                };
                tryOpenHotspot();

                // Brief highlight pulse on container too
                $target.addClass('kiallitok-hotspot-highlight');
                setTimeout(() => $target.removeClass('kiallitok-hotspot-highlight'), 1200);
            });
        });
    });
}); 
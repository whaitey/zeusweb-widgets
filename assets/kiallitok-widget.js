jQuery(document).ready(function($) {
    // Kiállítók Widget Pagination
    $('.kiallitok-wrapper').each(function() {
        const $wrapper = $(this);
        const $items = $wrapper.find('.kiallitok-item');
        const $dots = $wrapper.find('.kiallitok-pagination-dot');
        const $prevBtn = $wrapper.find('.kiallitok-pagination-arrow-left');
        const $nextBtn = $wrapper.find('.kiallitok-pagination-arrow-right');
        const $mapLinks = $wrapper.find('.kiallitok-map-link');
        
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
            const $stickyHeader = $('.elementor-location-header:visible').first();
            if ($stickyHeader.length && $stickyHeader.css('position') === 'fixed') {
                headerOffset = $stickyHeader.outerHeight();
            }
            const offsetTop = Math.max(0, $target.offset().top - adminBarHeight - headerOffset - 20);

            // Smooth scroll
            $('html, body').animate({ scrollTop: offsetTop }, 500, function() {
                // Try to open Elementor hotspot widgets
                try {
                    // Case 1: Native click on hotspot marker or button inside target
                    const $hotspotMarker = $target.find('.e-hotspot, .elementor-hotspot').first();
                    if ($hotspotMarker.length) {
                        $hotspotMarker.trigger('click');
                    } else {
                        // Case 2: If target itself is a hotspot
                        if ($target.is('.e-hotspot, .elementor-hotspot')) {
                            $target.trigger('click');
                        }
                    }
                } catch (err) {
                    // Fail silently
                }

                // Highlight briefly
                $target.addClass('kiallitok-hotspot-highlight');
                setTimeout(() => $target.removeClass('kiallitok-hotspot-highlight'), 1200);
            });
        });
    });
}); 
jQuery(document).ready(function($) {
    // Kiállítók Widget Pagination
    $('.kiallitok-wrapper').each(function() {
        const $wrapper = $(this);
        const $items = $wrapper.find('.kiallitok-item');
        const $dots = $wrapper.find('.kiallitok-pagination-dot');
        const $prevBtn = $wrapper.find('.kiallitok-pagination-arrow-left');
        const $nextBtn = $wrapper.find('.kiallitok-pagination-arrow-right');
        
        let currentPage = 1;
        const totalPages = $dots.length;
        
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
    });
}); 
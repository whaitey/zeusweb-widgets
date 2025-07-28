jQuery(document).ready(function($){
    $('.ces-slider-widget').each(function(){
        var $widget = $(this);
        var $slides = $widget.find('.ces-slide');
        var current = 0;
        var total = $slides.length;

        function showSlide(idx) {
            $slides.removeClass('active');
            $slides.eq(idx).addClass('active');
            $slides.find('.ces-prev').prop('disabled', idx === 0);
            $slides.find('.ces-next').prop('disabled', idx === total - 1);
        }

        $widget.on('click', '.ces-next', function(){
            if(current < total - 1){
                current++;
            } else {
                current = 0; // Loop to first slide
            }
            showSlide(current);
        });

        $widget.on('click', '.ces-prev', function(){
            if(current > 0){
                current--;
            } else {
                current = total - 1; // Loop to last slide
            }
            showSlide(current);
        });

        // Autoplay every 3 seconds
        setInterval(function(){
            current = (current + 1) % total;
            showSlide(current);
        }, 5000);

        // Initialize
        showSlide(current);
    });
});

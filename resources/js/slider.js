function renderSlider(splideItem){
    var splide = new Splide(splideItem, {
        classes: {
            pagination: 'hidden',
            arrows: 'splide__arrows bg-orange-500',
            prev  : 'splide__arrow--prev left-0 h-full',
            next  : 'splide__arrow--next right-0 h-full',
        },
    });
    var bar = splide.root.querySelector('.my-slider-progress-bar');

    // Update the bar width:
    splide.on('mounted move', function () {
        var end = splide.Components.Controller.getEnd() + 1;
        bar.style.width = String(100 * (splide.index + 1) / end) + '%';
    });

    splide.mount();
}

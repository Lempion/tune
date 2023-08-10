$(document).ready(function () {
    $('.card-style').click(function () {
        let styleType = $(this).data('style-type');
        let cardStyle = $(this);

        $('.card-plus').removeClass('opacity-100').addClass('opacity-0');
        $('.load-wrapper').removeClass('opacity-0').addClass('opacity-100');
        $('.card').removeClass('opacity-100').addClass('opacity-0');

        setTimeout(function () {
            if (styleType == 1) {
                cardStyle.data('style-type', 2)

                $('.card').removeClass('rounded-xl').addClass('flex-justify-items-center rounded-l-lg').after('<div class="card-plus app-card-wrapper rounded-r-lg transition-all duration-200 opacity-0 cursor-default"><div class="app-card-container"></div></div>');
                $('.card .app-card-container').addClass('flex-justify-items-center');
                $('.actions').removeClass('rounded-b-xl').addClass('rounded-bl-lg');
                $('.card-plus .app-card-container').append($('.user-information').addClass('pt-5')).after($('.card-style').text('Minimalistic')).after($('.profile-edit'));

            } else {
                cardStyle.data('style-type', 1)

                $('.card').removeClass('flex-justify-items-center rounded-l-lg').addClass('rounded-xl');
                $('.card .app-card-container').removeClass('flex-justify-items-center').after($('.card-style').text('About me')).after($('.profile-edit'));
                $('#indicators-carousel').after($('.user-information').removeClass('pt-5'));
                $('.actions').removeClass('rounded-bl-lg').addClass('rounded-b-xl');
                $('.card-plus').remove();
            }
        }, 500);

        setTimeout(function () {
            $('.card').removeClass('opacity-0').addClass('opacity-100');
            $('.card-plus').removeClass('opacity-0').addClass('opacity-100');
            $('.load-wrapper').removeClass('opacity-100').addClass('opacity-0');
        }, 600)
    });
})

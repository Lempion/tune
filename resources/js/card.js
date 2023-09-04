$(document).ready(function () {
    $('.card-style').click(function () {
        let styleType = $(this).data('style-type');
        let cardStyle = $(this);

        $('.card-plus').removeClass('opacity-100').addClass('opacity-0');
        $('.load-wrapper').removeClass('opacity-0').addClass('opacity-100');
        $('.app-card-wrapper').removeClass('opacity-100').addClass('opacity-0');

        setTimeout(function () {
            if (styleType == 1) {
                cardStyle.data('style-type', 2)

                $('.app-card-wrapper').addClass('app-card-wrapper-plus');
                $('.card-main').removeClass('w-full').addClass('flex-justify-items-center rounded-l-lg w-1/2').after('<div class="card-plus w-1/2 h-full transition-all duration-200 opacity-0 cursor-default"><div class="app-card-container"></div></div>');
                $('.card-main .app-card-container').addClass('flex-justify-items-center');
                $('.actions').removeClass('rounded-b-xl').addClass('rounded-bl-lg');
                $('.card-plus .app-card-container').append($('.user-information').addClass('pt-5')).after($('.card-style').text('Minimalistic')).after($('.profile-edit'));

            } else {
                cardStyle.data('style-type', 1)

                $('.app-card-wrapper').removeClass('app-card-wrapper-plus');
                $('.card-main').removeClass('flex-justify-items-center w-1/2').addClass('rounded-xl w-full');
                $('.card-main .app-card-container').removeClass('flex-justify-items-center').after($('.card-style').text('About me')).after($('.profile-edit'));
                $('.user-avatars-items').after($('.user-information').removeClass('pt-5'));
                $('.actions').removeClass('rounded-bl-lg').addClass('rounded-b-xl');
                $('.card-plus').remove();
            }
        }, 500);

        setTimeout(function () {
            $('.app-card-wrapper').removeClass('opacity-0').addClass('opacity-100');
            $('.card-plus').removeClass('opacity-0').addClass('opacity-100');
            $('.load-wrapper').removeClass('opacity-100').addClass('opacity-0');
        }, 800)
    });
})

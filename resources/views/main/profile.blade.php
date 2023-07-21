@extends('layouts.main', ['title' => 'Profile'])

@section('content')

    <div class="load-wrapper absolute left-1/2 top-1/2 transition-all duration-200 opacity-0">
        <div class="cssload-container">
            <div class="cssload-whirlpool"></div>
        </div>
    </div>

    <div class="app-profile-wrapper">
        <div class="w-1/2 h-full border-r-4 border-[#F9DED5] flex flex-col justify-evenly">
            <div class="h-[12%] profile-photos-info w-[95%] mx-auto flex justify-center items-center">
                <div>
                    <p class=" font-bold">Your photos</p>
                    <p class="">Photos can be swapped. Put the best photo first.</p>
                </div>
            </div>

            <div class="h-[80%] w-[95%] mx-auto profile-photos flex flex-wrap">
                <div class="w-1/3 flex justify-center items-center">
                    <div class="w-[90%] h-[90%] border border-black rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
                <div class="w-1/3 flex justify-center items-center">
                    <div class="w-[90%] h-[90%] border border-black rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
                <div class="w-1/3 flex justify-center items-center">
                    <div class="w-[90%] h-[90%] border border-black rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
                <div class="w-1/3 flex justify-center items-center">
                    <div class="w-[90%] h-[90%] border border-black rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
                <div class="w-1/3 flex justify-center items-center">
                    <div class="w-[90%] h-[90%] border border-black rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
                <div class="w-1/3 flex justify-center items-center">
                    <div class="w-[90%] h-[90%] border border-black rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/2 h-full border-l-4 border-[#F5F1EA]">
            14
        </div>
    </div>
    <script>
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
                        $('.card-plus .app-card-container').append($('.customer-information')).after($('.card-style').text('Minimalistic'));

                    } else {
                        cardStyle.data('style-type', 1)

                        $('.card').removeClass('flex-justify-items-center rounded-l-lg').addClass('rounded-xl');
                        $('.card .app-card-container').removeClass('flex-justify-items-center').after($('.card-style').text('About me'));
                        $('#indicators-carousel').after($('.customer-information'));
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
    </script>
@endsection

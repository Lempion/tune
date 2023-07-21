@extends('layouts.main', ['title' => 'Tune'])

@section('content')

    <div class="load-wrapper absolute left-1/2 top-1/2 transition-all duration-200 opacity-0">
        <div class="cssload-container">
            <div class="cssload-whirlpool"></div>
        </div>
    </div>

    <div class="card app-card-wrapper rounded-xl transition-all duration-200 opacity-100">
        <div class="app-card-container rounded-t-xl cursor-default">
            {{--                     Carousel start--}}
            <div id="indicators-carousel" class="relative w-full overflow-hidden" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-56  rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ asset('storage/images/user_photos/img.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/images/bg-main.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/images/bg-form-auth.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/images/bg-form-register.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/images/bg-r.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/10 dark:bg-gray-800/10 group-hover:bg-white/30 dark:group-hover:bg-gray-800/60 group-focus:ring-1 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/10 dark:bg-gray-800/10 group-hover:bg-white/30 dark:group-hover:bg-gray-800/60 group-focus:ring-1 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                </button>
            </div>
            {{--            Carousel end--}}

            <div class="customer-information w-[95%] mx-auto">
                <div class="mt-3 mb-1.5">
                    <div class="name text-3xl font-bold">Vitaly</div>
                    <div class="age text-lg font-sans">22 age</div>
                </div>
                <div class="customer-hobbies flex flex-wrap justify-center text-sm font-semibold space-x-2">
                    <div class="shadow-md mb-1.5 rounded-full py-0.5 px-2 bg-green-400">Skate</div>
                    <div class="shadow-md mb-1.5 rounded-full py-0.5 px-2 bg-green-400">Snowboard</div>
                    <div class="shadow-md mb-1.5 rounded-full py-0.5 px-2 bg-green-400">Gaming</div>
                    <div class="shadow-md mb-1.5 rounded-full py-0.5 px-2 bg-green-400">Walk at moon</div>
                    <div class="shadow-md mb-1.5 rounded-full py-0.5 px-2 bg-green-400">Lorem</div>
                    <div class="shadow-md mb-1.5 rounded-full py-0.5 px-2 bg-green-400">Lorem2</div>
                </div>
                <div class="customer-message pb-28">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aut distinctio doloribus,
                    eligendi esse illo, iure maiores officiis quasi, quos sed suscipit tempore temporibus unde ut
                    velit veritatis! Itaque, quidem!

                    Amet aperiam at blanditiis dignissimos dolore doloremque dolores doloribus eligendi enim
                    excepturi facere facilis fugiat illum, minima mollitia, nesciunt nobis odio perspiciatis
                    possimus quos rem rerum sed sit tempore temporibus!

                    Laboriosam, soluta ut. Labore, perferendis, velit. Amet architecto aut, corporis ducimus eum
                    expedita illo iste maiores molestiae necessitatibus nemo neque odit officiis quasi quibusdam
                    ullam voluptatem! Fugit, odit quisquam? Laboriosam.

                    Commodi dolorum laborum nesciunt omnis pariatur repellat repudiandae. Asperiores at consectetur
                    consequatur cupiditate eligendi expedita explicabo necessitatibus non praesentium quidem!
                    Aliquam cumque dolorem eius fuga laboriosam odio officia qui voluptate!

                    Atque excepturi in iusto maiores molestias natus nisi odio quasi. Accusamus ad est et facilis
                    libero, neque numquam possimus quos totam? Accusantium amet expedita modi, natus reiciendis
                    repellendus reprehenderit vero?

                    A delectus eaque enim facere molestiae praesentium quidem recusandae velit vero voluptas?
                    Consequatur corporis culpa cum cumque delectus dicta dignissimos eaque eius hic iusto mollitia
                    odio placeat quae, tempora voluptatibus?

                    Accusamus, repellendus, veniam! A beatae dicta distinctio eaque eligendi esse expedita in
                    incidunt magni modi mollitia odit quibusdam similique, ullam ut, vitae voluptatem! Autem
                    consequuntur doloremque facere, nisi sed tempore!
                </div>
            </div>
        </div>

        <div data-style-type="1" class="card-style absolute opacity-40 cursor-pointer bg-gradient-to-t from-[#F9DED5] to-[#F5F1EA] hover:from-[#F5F1EA] hover:to-[#F9DED5] hover:opacity-90 h-24 w-5 text-center text-sm rounded-r-2xl -right-5 top-[40%] shadow-md [writing-mode:vertical-lr] font-semibold">
            About me
        </div>
        <div class="actions rounded-b-xl absolute w-full bottom-0 h-[15%] bg-gradient-to-t from-fuchsia-50/90 to-[#F9DED5]/10 bg-opacity-10">
            <div class="w-2/3 h-full mx-auto flex items-center justify-around">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-16 h-16 fill-[#ff3347]">
                        <path class="cursor-pointer hover:fill-red-600" fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-16 h-16 fill-blue-400">
                        <path class="cursor-pointer hover:fill-blue-500" fill-rule="evenodd" d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-16 h-16 fill-pink-400">
                        <path class="cursor-pointer hover:fill-pink-500" d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                    </svg>
                </div>
            </div>
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

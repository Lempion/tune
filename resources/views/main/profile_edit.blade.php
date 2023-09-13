@extends('layouts.main', ['title' => 'Profile', 'active' => 'profile'])

@section('content')
    <div class="load-wrapper absolute left-1/2 top-1/2 transition-all duration-200 opacity-0">
        <div class="cssload-container">
            <div class="cssload-whirlpool"></div>
        </div>
    </div>

    <div class="app-profile-wrapper relative">
        <div class="w-1/2 h-full border-r-4 border-[#F9DED5] relative">
            <div class="h-[20%] profile-photos-info w-[95%] mx-auto flex justify-center items-center">
                <div class="w-full h-auto">
                    <p class="font-bold">Your photos</p>
                    <p class="">Photos can be swapped. Put the best photo first.</p>
                    <p class="images_error text-xs text-red-500 pl-1 opacity-0">_</p>
                </div>
            </div>

            <div class="h-[80%] w-[95%] mx-auto profile-photos flex flex-wrap relative">

                <div class="img-container absolute w-full h-full top-0 flex flex-wrap">
                    @foreach($user['avatars'] as $avatar)
                        <div class="w-1/3 flex justify-center items-center">
                            <div class="w-[90%] h-[90%] relative rounded-xl overflow-hidden z-10">
                                <img data-img-name="{{ $avatar->image_name }}" class="absolute w-full h-full object-cover" src="{{ asset('storage/avatars/' . $avatar->image_name) }}" alt="">
                                <div onclick="removeAvatar(this)" class="cursor-pointer border-2 border-white bg-gray-400 absolute top-1.5 right-1.5 rounded-full remove-avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 stroke-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @for($i = 0; $i < (6 - count($user['avatars'])); $i++)
                        <div class="w-1/3 flex justify-center items-center">
                            <div container-index="0" class="w-[90%] h-[90%] relative rounded-xl overflow-hidden"></div>
                        </div>
                    @endfor
                </div>

                <div class="w-1/3 flex justify-center items-center">
                    <div data-index="0" class="profile-avatar relative cursor-pointer w-[90%] h-[90%] border-2 border-orange-400/60 rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
                <div class="w-1/3 flex justify-center items-center">
                    <div data-index="0" class="profile-avatar relative cursor-pointer w-[90%] h-[90%] border-2 border-orange-400/60 rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
                <div class="w-1/3 flex justify-center items-center">
                    <div data-index="0" class="profile-avatar relative cursor-pointer w-[90%] h-[90%] border-2 border-orange-400/60 rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
                <div class="w-1/3 flex justify-center items-center">
                    <div data-index="0" class="profile-avatar relative cursor-pointer w-[90%] h-[90%] border-2 border-orange-400/60 rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
                <div class="w-1/3 flex justify-center items-center">
                    <div data-index="0" class="profile-avatar relative cursor-pointer w-[90%] h-[90%] border-2 border-orange-400/60 rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>
                <div class="w-1/3 flex justify-center items-center">
                    <div data-index="0" class="profile-avatar relative cursor-pointer w-[90%] h-[90%] border-2 border-orange-400/60 rounded-xl shadow-xl  bg-gradient-to-tl from-orange-300/50 to-pink-500/50 flex-justify-items-center overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 stroke-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                </div>

                <form class="form-upload-image" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" accept="image/jpeg,png" class="upload-image hidden">
                </form>
            </div>

            <div class="hidden remove-avatars">

            </div>

        </div>

        <div class="w-1/2 h-full border-l-4 border-[#F5F1EA] overflow-y-auto profile-scrollbar pb-10">
            <div class="w-[95%] h-[20%] flex flex-col justify-end mx-auto flex justify-center items-start">
                <p class="font-bold">About me</p>
                <p class="">Short story about yourself.</p>
            </div>
            <div class="w-[95%] mx-auto flex flex-col justify-evenly">
                <div class="flex justify-between mb-1">
                    <div class="w-[45%]">
                        <p class="opacity-70">Name</p>
                        <input value="{{ $user['profile']->name ?? '' }}" placeholder="Your name" type="text" name="user_name" minlength="2" maxlength="25" class="profile-input user-name w-full rounded-md shadow-md bg-[#f9ded5] border-2 border-orange-300/50 focus:ring-1 focus:ring-orange-400 focus:border-orange-400 cursor-pointer">
                        <p class="user_name_error text-xs text-red-500 pl-1 opacity-0">_</p>
                    </div>

                    <div class="w-[45%]">
                        <p class="opacity-70">Date of Birth</p>
                        <input value="{{ $user['profile']->date_birth ?? '' }}" placeholder="Select date" datepicker datepicker-format="yyyy-mm-dd" datepicker-orientation="bottom" type="text" name="user_date_birth" class="profile-input user-date-birth w-full rounded-md shadow-md bg-[#f9ded5] border-2 border-orange-300/50 focus:ring-1 focus:ring-orange-400 focus:border-orange-400 cursor-pointer">
                        <p class="user_date_birth_error text-xs text-red-500 pl-1 opacity-0">_</p>
                    </div>
                </div>

                <div class="mb-1">
                    <div class="opacity-70 flex justify-between">
                        <p class="label">Tell us about yourself</p>
                        <p class="maxlength hidden"></p>
                    </div>

                    <textarea placeholder="Tell us what are you doing?" name="user_about" class="profile-input w-full overflow-hidden cursor-pointer resize-none px-2 py-2 rounded-md shadow-md bg-[#f9ded5] border-2 border-orange-300/50 focus:ring-1 focus:ring-orange-400 focus:border-orange-400 min-h-[70px]" rows="1" maxlength="500">{{ $user['profile']->about ?? '' }}</textarea>
                    <p class="user_about_error text-xs text-red-500 pl-1 opacity-0">_</p>
                </div>

                <div class="mb-1">
                    <div class="opacity-70 flex justify-between">
                        <p class="label">Education</p>
                        <p class="maxlength hidden"></p>
                    </div>

                    <textarea placeholder="Where do you study or have you studied?" name="user_education" class="profile-input w-full overflow-hidden cursor-pointer resize-none px-2 py-2 rounded-md shadow-md bg-[#f9ded5] border-2 border-orange-300/50 focus:ring-1 focus:ring-orange-400 focus:border-orange-400 min-h-[45px]" rows="1" maxlength="30">{{ $user['profile']->education ?? '' }}</textarea>
                    <p class="user_education_error text-xs text-red-500 pl-1 opacity-0">_</p>
                </div>

                <div class="mb-1">
                    <div class="opacity-70 flex justify-between">
                        <p class="label">Job</p>
                        <p class="maxlength hidden"></p>
                    </div>

                    <textarea placeholder="Who do you work?" name="user_job" class="profile-input w-full overflow-hidden cursor-pointer resize-none px-2 py-2 rounded-md shadow-md bg-[#f9ded5] border-2 border-orange-300/50 focus:ring-1 focus:ring-orange-400 focus:border-orange-400 min-h-[45px]" rows="1" maxlength="30">{{ $user['profile']->job ?? '' }}</textarea>
                    <p class="user_job_error text-xs text-red-500 pl-1 opacity-0">_</p>
                </div>

                <div class="mb-3">
                    <div class="opacity-70 flex justify-between">
                        <p class="label">Interests</p>
                    </div>

                    <div class="wrapper-interests relative w-full overflow-hidden resize-none px-2 py-2 rounded-md shadow-md bg-[#f9ded5] border-2 border-orange-300/50 focus:ring-1 focus:ring-orange-400 focus:border-orange-400 min-h-[45px] cursor-pointer">
                        <p class="opacity-60 wrapper-interests_text @if(!$user['interests']->isEmpty()) hidden @endif ">Add interest</p>
                        <div class="wrapper-interests_items w-[90%] flex justify-start flex-wrap font-semibold">
                            @foreach($user['interests'] as $userInterest)
                                <div interest-id="{{ $userInterest->id }}" class="selected-item selected-item-save interest-item flex items-center border-2 border-orange-400/60 rounded-2xl py-0.5 px-2 my-0.5 mx-1 bg-gradient-to-r from-orange-300/60 to-pink-500/40">
                                    <div class="mr-1">
                                        <span class="font-normal text-xl">{{ $userInterest->icon }}</span>
                                    </div>
                                    <p>{{ $userInterest->word }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="add-interests absolute right-1.5 top-1/2 -mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-gray-700">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="opacity-70 flex justify-between">
                        <p class="label">Music</p>
                    </div>

                    <div class="wrapper-music relative w-full overflow-hidden resize-none px-2 py-2 rounded-md shadow-md bg-[#f9ded5] border-2 border-orange-300/50 focus:ring-1 focus:ring-orange-400 focus:border-orange-400 min-h-[45px] cursor-pointer">
                        <p class="opacity-60 wrapper-music_text @if(!$user['music']->isEmpty()) hidden @endif ">Who do you like to listen to?</p>
                        <div class="wrapper-music_items w-[90%] flex justify-start flex-wrap font-semibold">
                            @foreach($user['music'] as $userMusic)
                                <div music-id="{{ $userMusic->id }}" class="selected-item selected-item-save music-item flex items-center border-2 border-orange-400/60 rounded-2xl py-0.5 px-2 my-0.5 mx-1 bg-gradient-to-r from-orange-300/60 to-pink-500/40">
                                    <p>{{ $userMusic->word }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="add-music absolute right-1.5 top-1/2 -mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-gray-700">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="opacity-70 flex justify-between">
                        <p class="label">Movies</p>
                        <p class="maxlength hidden"></p>
                    </div>

                    <textarea placeholder="What do you like to watch?" name="user_movies" class="profile-input w-full overflow-hidden cursor-pointer resize-none px-2 py-2 rounded-md shadow-md bg-[#f9ded5] border-2 border-orange-300/50 focus:ring-1 focus:ring-orange-400 focus:border-orange-400 min-h-[45px]" rows="1" maxlength="30">{{ $user['profile']->movies ?? '' }}</textarea>
                    <p class="user_movies_error text-xs text-red-500 pl-1 opacity-0">_</p>
                </div>

                <div class="mb-3">
                    <div class="opacity-70 flex justify-between">
                        <p class="label">Books</p>
                        <p class="maxlength hidden"></p>
                    </div>

                    <textarea placeholder="Which authors inspire you?" name="user_books" class="profile-input w-full overflow-hidden cursor-pointer resize-none px-2 py-2 rounded-md shadow-md bg-[#f9ded5] border-2 border-orange-300/50 focus:ring-1 focus:ring-orange-400 focus:border-orange-400 min-h-[45px]" rows="1" maxlength="30">{{ $user['profile']->books ?? '' }}</textarea>
                    <p class="user_books_error text-xs text-red-500 pl-1 opacity-0">_</p>
                </div>
            </div>
        </div>
        <button type="button" class="save-profile text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-lg shadow-orange-500/50 absolute bottom-3 right-3 transition-all duration-300 opacity-0">
            Save profile
        </button>

        <div class="profile-back absolute top-2 -right-12 z-50 w-10 h-10 rounded-full bg-gradient-to-br from-pink-500 to-orange-400 flex-justify-items-center shadow-md shadow-pink-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 stroke-1 stroke-white cursor-pointer hover:stroke-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
        </div>
    </div>

    <div class="interests-list overflow-hidden hidden h-4/6 w-3/12 bg-gradient-to-t from-[#F9DED5] to-[#F5F1EA] rounded-2xl shadow-inner border-2 border-orange-300 flex flex-col">
        <div class="h-[10%] flex-justify-items-center flex-col">
            <p class="text-2xl opacity-80">Interests</p>
            <p class="text-sm opacity-80">Selected <counter-selected-items class="counter-selected-interests">0</counter-selected-items> of <max-select-items class="max-select-interests">10</max-select-items></p>
        </div>

        <div class="wrapper-interests-list h-[80%] border-y-2 border-orange-300 pt-5">
            <div class="w-[95%] flex justify-start flex-wrap font-semibold mx-auto">
                @foreach($interests as $interest)
                    <div interest-id="{{ $interest->id }}" class="@if($user['interests']->contains($interest)) selected-item selected-item-save @endif interest-item flex items-center cursor-pointer border-2 border-orange-400/60 rounded-2xl py-0.5 px-2 my-0.5 mx-1 bg-gradient-to-r from-orange-300/60 to-pink-500/40">
                        <div class="mr-1">
                            <span class="font-normal text-xl">{{ $interest->icon }}</span>
                        </div>
                        <p>{{ $interest->word }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="h-[10%] flex-justify-items-center">
            <button class="interests-save w-[90%] h-[70%] bg-gradient-to-l from-orange-300/60 to-pink-500/40 border-2 border-orange-400/60 rounded-xl hover:bg-gradient-to-r hover:border-orange-400 text-lg hover:font-semibold">
                Save
            </button>
        </div>
    </div>

    <div class="music-list overflow-hidden hidden h-4/6 w-3/12 bg-gradient-to-t from-[#F9DED5] to-[#F5F1EA] rounded-2xl shadow-inner border-2 border-orange-300 flex flex-col">
        <div class="h-[10%] flex-justify-items-center flex-col">
            <p class="text-2xl opacity-80">Music</p>
            <p class="text-sm opacity-80">Selected <counter-selected-items class="counter-selected-music">0</counter-selected-items> of <max-select-items class="max-select-music">10</max-select-items></p>
        </div>

        <div class="wrapper-music-list h-[80%] border-y-2 border-orange-300 pt-5">
            <div class="w-[95%] flex justify-start flex-wrap font-semibold mx-auto">
                @foreach($music as $musicItem)
                    <div music-id="{{ $musicItem->id }}" class="@if($user['music']->contains($musicItem)) selected-item selected-item-save @endif music-item flex items-center cursor-pointer border-2 border-orange-400/60 rounded-2xl py-0.5 px-2 my-0.5 mx-1 bg-gradient-to-r from-orange-300/60 to-pink-500/40">
                        <p>{{ $musicItem->word }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="h-[10%] flex-justify-items-center">
            <button class="music-save w-[90%] h-[70%] bg-gradient-to-l from-orange-300/60 to-pink-500/40 border-2 border-orange-400/60 rounded-xl hover:bg-gradient-to-r hover:border-orange-400 text-lg hover:font-semibold">
                Save
            </button>
        </div>
    </div>

    <script>
        $('body').addClass('relative').prepend('<div class="bg-fullscreen absolute w-full h-full bg-gray-900/60 z-20 flex justify-center items-center hidden"><div>');

        let removeAvatarIcon = '<div onclick="removeAvatar(this)" class="cursor-pointer border-2 border-white bg-gray-400 absolute top-1.5 right-1.5 rounded-full remove-avatar"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 stroke-white"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg></div>';
        let imgAvatarContainer = '<div class="w-1/3 flex justify-center items-center"><div container-index="0" class="w-[90%] h-[90%] relative rounded-xl overflow-hidden"></div></div>';

        $(document).on("input", "textarea", function () {
            showPMaxlength(this);
            $(this).outerHeight(40).outerHeight(this.scrollHeight);
        });

        $('.profile-input').on('blur', function (){
            $(this).removeClass('bg-red-300');
            $('.' + $(this).attr('name') + '_error').removeClass('opacity-100').text('_');
        })

        $('.user-date-birth').blur(function () {
            $(this).removeClass('bg-red-300');

            let userDateBirthError = $('.user_date_birth_error');

            userDateBirthError.removeClass('opacity-100').text('_');

            if(!validateDate($(this).val())){
                userDateBirthError.toggleClass('opacity-100').text('Date not valid!');
                $(this).addClass('bg-red-300');
                return;
            }

            let d = new Date();

            let dateBirth = Date.parse($(this).val());
            let currentDay = Date.parse(d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate());
            let adult = '568036800000'; // 18 years in milliseconds
            let old = '1893456000000'; // 60 years in milliseconds

            let userAge = currentDay - dateBirth;

            if (userAge < adult || userAge > old) {
                userDateBirthError.toggleClass('opacity-100').text('Invalid age!');
                $(this).addClass('bg-red-300');
            }
        });

        $('.user-name').blur(function () {
            let userNameError = $('.user_name_error');
            let userNameLength = $(this).val().length;
            let userNameLengthMin = $(this).attr('minlength');
            let userNameLengthMax = $(this).attr('maxlength');

            $(userNameError).removeClass('opacity-100');
            $(userNameError).text('_');
            $(this).removeClass('bg-red-300');

            if (userNameLength < userNameLengthMin || userNameLength > userNameLengthMax) {
                $(userNameError).text('Min 2, max 25 chars!');
                $(userNameError).toggleClass('opacity-100');
                $(this).addClass('bg-red-300');
            }
        })

        $('textarea[name=user_about]').blur(function (){
            if($(this).val().length < 1){
                $('.user_about_error').addClass('opacity-100').text('This field is required');
                $(this).addClass('bg-red-300');
            }
        })

        $('textarea').blur(function () {
            $('.maxlength').addClass('hidden');
        }).focus(function () {
            showPMaxlength(this);
        })

        // Interests
        $('.wrapper-interests').click(function () {
            $('.bg-fullscreen').append($('.interests-list').removeClass('hidden')).removeClass('hidden');
        })

        $('.wrapper-interests-list>div>.interest-item').click(function () {
            if (checkSelectedLimit('interests') && !$(this).hasClass('selected-item')) {
                alert('Oisbka');
                return;
            }
            $(this).removeClass('selected-item-save').toggleClass('selected-item');
            updateCountSelectedItems('interests');
        })

        $('.interests-save').click(function () {
            saveSelectedItems('interests');
            $('.save-profile').addClass('opacity-100')
        })
        //

        //Music
        $('.wrapper-music').click(function () {
            $('.bg-fullscreen').append($('.music-list').removeClass('hidden')).removeClass('hidden');
        })

        $('.wrapper-music-list>div>.music-item').click(function () {
            if (checkSelectedLimit('music') && !$(this).hasClass('selected-item')) {
                alert('Oisbka');
                return;
            }
            $(this).removeClass('selected-music-save').toggleClass('selected-item');
            updateCountSelectedItems('music');
        })

        $('.music-save').click(function () {
            saveSelectedItems('music');
            $('.save-profile').addClass('opacity-100');
        })
        //

        $('.bg-fullscreen').click(function (e) {
            if ($(e.target).hasClass('bg-fullscreen')) {
                hideBgFullscreen(this);
                checkSelectedInterest('interests');
                updateCountSelectedItems('interests');
                checkSelectedInterest('music');
                updateCountSelectedItems('music');
            }
        })

        // Upload photo
        $('.profile-avatar').click(function () {
            if ($(this).attr('data-index') !== undefined) {
                $('.upload-image').trigger('click');
            }
        })

        $('.upload-image').on('change', function () {
            if ($(this).val() !== '') {
                $('.images_error').removeClass('opacity-100');
                ajaxUploadImage($(this));
            }
        })

        $('input, textarea').on('input', function () {
            $('.save-profile').addClass('opacity-100');
        });
        //


        $('.profile-back').click(function (){
            $(location).attr('href', '{{ route('profile.index') }}')
        })

        //update profile
        $('.save-profile').click(function () {
            $(this).attr('disabled', true).addClass('cursor-wait');

            let profileInputs = $('.profile-input');
            let profileInterests = $('.wrapper-interests_items>.selected-item-save');
            let profileMusic = $('.wrapper-music_items>.selected-item-save');
            let profileImages = $('img[data-img-name]');
            let removeAvatars = $('.remove-avatars input');
            let dataProfile = {};
            let dataInterests = {};
            let dataMusic = {};
            let dataImages = {};
            let dataRemoveAvatars = {};

            profileInputs.each(function () {
                dataProfile[$(this).attr('name')] = $(this).val();
            });

            profileInterests.each(function (key) {
                dataInterests[key] = $(this).attr('interest-id');
            })

            profileMusic.each(function (key) {
                dataMusic[key] = $(this).attr('music-id');
            })

            profileImages.each(function (key) {
                dataImages[key] = $(this).attr('data-img-name');
            })

            removeAvatars.each(function (key) {
                dataRemoveAvatars[key] = $(this).val();
            })

            $.ajax({
                url: '{{ route('profile.update') }}',
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: Object.assign(dataProfile, {'interests': dataInterests}, {'music': dataMusic}, {'images': dataImages}, {'remove_avatars': dataRemoveAvatars}),
                success: function (response) {
                    if (response['success']) {
                        alertSuccess(response['success']);
                    }
                },
                error: function (response) {
                    let errors = response.responseJSON.errors;

                    $.each(errors, function (key, message) {
                        let pError = $('.' + key + '_error');
                        $(pError).text(message).addClass('opacity-100');
                    })
                }
            })
            $('.save-profile').addClass('cursor-pointer').removeClass('cursor-wait opacity-100').attr('disabled', false);
        })

        function showAvatar(imgPath, imgName) {
            let containerForAvatar = $('[container-index=0]').first();

            $(containerForAvatar).addClass('z-10').removeAttr('container-index').append('<img data-img-name="' + imgName + '" class="absolute w-full h-full object-cover" src="' + imgPath + '" alt="">').append(removeAvatarIcon)
        }

        function removeAvatar(avatar) {
            let imageName = $('img', $(avatar).parent()).data('img-name');

            $(avatar).parent().parent().remove();
            $('.img-container').append(imgAvatarContainer);

            $('.remove-avatars').append('<input type="hidden" name="remove_avatars[]" value="' + imageName + '">');
            $('.save-profile').addClass('opacity-100');
        }

        function ajaxUploadImage(image) {
            $.ajax({
                url: '{{ route('profile.avatar-upload') }}',
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData($('.form-upload-image').get(0)),
                success: function (response) {
                    let imgPath = '{{ asset('storage/avatars/') }}' + '/' + response.success;
                    showAvatar(imgPath, response.success);
                    $('.upload-image').val('');
                },
                error: function (response) {
                }
            })
        }

        function showPMaxlength(textareaThis) {
            let charsNow = $(textareaThis).val().length;
            let charsMax = $(textareaThis).attr('maxlength');

            $('.maxlength', $(textareaThis).parent()).text(charsNow + '/' + charsMax).removeClass('hidden');
        }

        function hideBgFullscreen(bgFullscreen) {
            $(bgFullscreen).addClass('hidden');
            $('.interests-list').addClass('hidden');
            $('.music-list').addClass('hidden');
        }

        function checkSelectedInterest(prefixClass) {
            $('.wrapper-' + prefixClass + '-list>div>.selected-item').each(function () {
                if (!$(this).hasClass('selected-item-save')) {
                    $(this).removeClass('selected-item');
                }
            })
        }

        function updateCountSelectedItems(prefixClass) {
            $('.counter-selected-' + prefixClass).text($('.wrapper-' + prefixClass + '-list>div>.selected-item').length);
        }

        function checkSelectedLimit(prefixClass) {
            let selectedItems = $('.wrapper-' + prefixClass + '-list>div>.selected-item').length;
            let limitSelectItems = $('.max-select-' + prefixClass).text();

            return (selectedItems >= limitSelectItems)
        }

        function saveSelectedItems(prefixClass) {
            $('.wrapper-' + prefixClass + '_items').html('');

            let selectedItems = $('.wrapper-' + prefixClass + '-list>div>.selected-item');
            let countSelectedItems = $(selectedItems).length;
            let blockText = $('.wrapper-' + prefixClass + '_text');

            $(selectedItems).each(function () {
                $(this).addClass('selected-item-save');
                $('.wrapper-' + prefixClass + '_items').append($(this).clone());
            })

            if (countSelectedItems) {
                $(blockText).addClass('hidden');
            } else {
                $(blockText).removeClass('hidden');
            }

            hideBgFullscreen($('.bg-fullscreen'));
        }

        function validateDate(value)
        {
            var arrD = value.split("-");
            arrD[1] -= 1;
            var d = new Date(arrD[0], arrD[1], arrD[2]);
            if ((d.getFullYear() == arrD[0]) && (d.getMonth() == arrD[1]) && (d.getDate() == arrD[2])) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

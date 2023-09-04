@extends('layouts.main', ['title' => 'Profile', 'active' => 'likes'])

@section('content')

    <div class="app-likes-wrapper overflow-hidden overflow-y-auto">
        <div class="w-full h-full bg-gray-700/50 absolute opacity-0 -z-10 ease-in-out blind"></div>
        <div class="w-full h-full overflow-hidden overflow-y-auto profile-scrollbar">
            @if(!empty($profilesLikedUsers))
                <div class="w-full h-[10%] flex-justify-items-center">
                    <h1 class="text-xl font-semibold text-gray-700 filter drop-shadow-gray-1">These are the people who
                        like you</h1>
                </div>
                <div class="flex flex-wrap w-full h-[90%]">
                    @foreach($profilesLikedUsers as $key => $profileLikedUser)
                        <div class="app-card-likes-wrapper">
                            <div data-mini-liked-profile="{{ $profileLikedUser['user_id'] }}" class="app-card-likes-container relative">
                                <div class="splide h-full">
                                    <div class="splide__track h-[99%]">
                                        <ul class="splide__list">
                                            @foreach($profileLikedUser['avatars'] as $image)
                                                <li class="splide__slide">
                                                    <img src="{{ asset('storage/avatars/' . $image) }}" class="w-full h-full object-cover img-item" alt="">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="my-slider-progress">
                                        <div class="my-slider-progress-bar"></div>
                                    </div>
                                </div>

                                <div class="actions actions-mini absolute transition-all duration-400 ease-in-out w-full bottom-0 h-[15%] bg-gradient-to-t from-fuchsia-50/90 to-[#F9DED5]/10 bg-opacity-10 z-[51] opacity-10">
                                    <div class="w-5/6 pb-2 h-full mx-auto flex items-center justify-around">
                                        <div class="">
                                            <svg onclick="actionQuestionnaire(this, 'dislike')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="action w-12 h-12 fill-[#ff3347] cursor-pointer hover:fill-red-600 filter drop-shadow-red-1 hover:drop-shadow-red-2">
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="">
                                            <svg onclick="actionQuestionnaire(this, 'like')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="action w-12 h-12 fill-pink-400 cursor-pointer hover:fill-pink-500 filter drop-shadow-pink-1 hover:drop-shadow-pink-2">
                                                <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="w-80 h-full mx-auto flex-justify-items-center flex-col">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-36 h-36 stroke-2 stroke-red-500 filter drop-shadow-red-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-center text-2xl text-gray-700 font-bold filter drop-shadow-gray-2">Keep browsing profiles and likes will not keep you waiting</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @foreach($profilesLikedUsers as $questionnaire)
        <div data-liked-profile="{{ $questionnaire['user_id'] }}" class="app-card-wrapper !absolute w-full h-full flex-justify-items-center rounded-xl !hidden">
            <div class="letter-form w-full h-full bg-gray-700/50 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-50 flex-justify-items-center rounded-xl absolute !hidden">
                <div class="form-questionnaire-message bg-gradient-to-r from-[#F9DED5] to-[#F5F1EA] w-[95%] h-72 rounded-md relative">
                    <div class="h-2/6 flex-justify-items-center flex-col py-2">
                        <div class="letter action">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-16 h-16 stroke-orange-400 filter drop-shadow-red-1 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z"/>
                            </svg>
                        </div>
                    </div>

                    <div class="w-full h-4/6 py-2 px-2 relative">
                        <p class="letter-maxlength text-xs font-semibold opacity-0 text-gray-700 absolute right-2 -top-2.5"></p>
                        <textarea placeholder="Write a message to this user" class="letter-message text-gray-700 font-semibold w-full h-full rounded-md cursor-pointer resize-none shadow-md bg-[#f5f0e9] border-2 border-orange-400/50 focus:ring-1 focus:ring-orange-400 focus:border-orange-400 profile-scrollbar" maxlength="150" name="" id=""></textarea>
                    </div>
                </div>
            </div>

            <div class="active-ping absolute w-1/2 h-1/2 inline-flex bg-green-400 opacity-75 z-40 hidden"></div>

            <div class="card-main relative transition-all duration-200 opacity-100 w-full h-full">

                <div class="app-card-container rounded-t-xl cursor-default">
                    <div class="user-avatars-items relative h-56 overflow-hidden rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                        <div class="splide h-full">
                            <div class="splide__track h-[99%]">
                                <ul class="splide__list">
                                    @foreach($questionnaire['avatars'] as $image)
                                        <li class="splide__slide">
                                            <img src="{{ asset('storage/avatars/' . $image) }}" class="w-full h-full object-cover" alt="">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="my-slider-progress">
                                <div class="my-slider-progress-bar"></div>
                            </div>
                        </div>
                    </div>

                    <div class="user-information w-[95%] mx-auto space-y-4 pb-20">
                        <div class="space-y-2">
                            <div class="user-name text-3xl font-bold">{{ $questionnaire['name'] . ', ' . $questionnaire['date_birth'] }}</div>

                            <div class="user-education text-lg flex space-x-2 @if(empty($questionnaire['education'])) hidden @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"/>
                                </svg>

                                <p class="user-education_text text-gray-700">{{ $questionnaire['education'] }}</p>

                            </div>

                            <div class="user-job text-lg flex space-x-2 @if(empty($questionnaire['job'])) hidden @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                                </svg>

                                <p class="user-job_text text-gray-700">{{ $questionnaire['job'] }}</p>
                            </div>

                        </div>

                        <div class="user-about space-y-1">
                            <p class="text-xl font-semibold">About me</p>
                            <p class="user-about_text text-gray-700">{{ $questionnaire['about'] }}</p>
                        </div>

                        <div class="user-interests space-y-1 @if(empty($questionnaire['interests'])) hidden @endif">
                            <p class="user-interests_text text-xl font-semibold">Interests</p>
                            <div class="user-interests_items flex flex-wrap justify-start">
                                @if(!empty($questionnaire['interests']))
                                    @foreach($questionnaire['interests'] as $interestWord => $interestIcon)
                                        <div class="interest-item flex items-center border-2 border-orange-400/60 rounded-2xl py-0.5 px-2 my-0.5 mx-1 bg-gradient-to-r from-orange-300/60 to-pink-500/40">
                                            <div class="mr-1">
                                                <span class="user-interests_item_icon font-normal text-xl">{{ $interestIcon }}</span>
                                            </div>
                                            <p class="user-interests_item_word">{{ $interestWord }}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="user-music space-y-1 @if(empty($questionnaire['music'])) hidden @endif">
                            <p class="user-music_text text-xl font-semibold">Music</p>
                            <div class="user-music_items flex flex-wrap justify-start">
                                @if(!empty($questionnaire['music']))
                                    @foreach($questionnaire['music'] as $musicWord)
                                        <div class="music-item flex items-center border-2 border-orange-400/60 rounded-2xl py-0.5 px-2 my-0.5 mx-1 bg-gradient-to-r from-orange-300/60 to-pink-500/40">
                                            <p class="user-music_item_text">{{ $musicWord }}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="user-movies-and-books space-y-1">
                            @if(!empty($questionnaire['movies']) || !empty($questionnaire['books']))
                                <p class="user-movies-and-books_title text-xl font-semibold">
                                @if(!empty($questionnaire['movies']) && !empty($questionnaire['books']))
                                        Movies and books
                                    @elseif(!empty($questionnaire['movies']))
                                        Movies
                                    @elseif(!empty($questionnaire['books']))
                                        Books
                                    @endif
                                </p>

                                @if(!empty($questionnaire['movies']))
                                    <div class="user-movies space-x-2 flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0118 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0118 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 016 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5"/>
                                        </svg>
                                        <p class="user-movies_text text-gray-700">{{ $questionnaire['movies'] }}</p>
                                    </div>
                                @endif

                                @if(!empty($questionnaire['books']))
                                    <div class="user-books space-x-2 flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                                        </svg>
                                        <p class="user-books_text text-gray-700">{{ $questionnaire['books'] }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                <div class="actions rounded-b-xl absolute w-full bottom-0 h-[15%] bg-gradient-to-t from-fuchsia-50/90 to-[#F9DED5]/10 bg-opacity-10 z-[51]">
                    <div class="w-2/3 h-full mx-auto flex items-center justify-around">
                        <div>
                            <svg onclick="actionQuestionnaire(this, 'dislike')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="action w-16 h-16 fill-[#ff3347] cursor-pointer hover:fill-red-600 filter drop-shadow-red-1 hover:drop-shadow-red-2">
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <svg onclick="actionQuestionnaire(this, 'like')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="action w-16 h-16 fill-pink-400 cursor-pointer hover:fill-pink-500 filter drop-shadow-pink-1 hover:drop-shadow-pink-2">
                                <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endforeach

    <script>
        let titleBooksMovies = $('<p class="user-movies-and-books_title text-xl font-semibold"></p>');
        let divBooks = '<div class="user-books space-x-2 flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg><p class="user-books_text text-gray-700">TEXT_BOOKS</p></div>';
        let divMovies = '<div class="user-movies space-x-2 flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0118 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0118 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 016 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5"/></svg><p class="user-movies_text text-gray-700">TEXT_MOVIES</p></div>';

        let divInterestItem = '<div class="interest-item flex items-center border-2 border-orange-400/60 rounded-2xl py-0.5 px-2 my-0.5 mx-1 bg-gradient-to-r from-orange-300/60 to-pink-500/40"><div class="mr-1"><span class="user-interests_item_icon font-normal text-xl">INTEREST_ICON</span></div> <p class="user-interests_item_word">INTEREST_WORD</p></div>';
        let divMusicItem = '<div class="music-item flex items-center border-2 border-orange-400/60 rounded-2xl py-0.5 px-2 my-0.5 mx-1 bg-gradient-to-r from-orange-300/60 to-pink-500/40"><p class="user-music_item_text">MUSIC_WORD</p></div>';

        let divAvatarItem = '<div id="carousel-item-ITEM_NUM" class="carousel-item hidden duration-700 ease-in-out"> <img src="{{ asset('storage/avatars/') }}AVATAR_NAME" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."> </div>';
        let divIndicatorItem = '<button id="carousel-indicator-ITEM_NUM" type="button" class="carousel-indicator w-3 h-3 rounded-full" aria-current="INDICATOR_CURRENT" aria-label="Slide ITEM_NUM"></button>';

        $(document).ready(function () {

            var splideElems = $('.splide');

            for (var i = 0; i < splideElems.length; i++) {
                renderSlider(splideElems[i]);
            }

            $('.actions-mini').hover(
                function (){
                    $(this).addClass('!opacity-80')
                },
                function (){
                    $(this).removeClass('!opacity-80')
                }
            )

            $('.app-card-likes-container').click(function (e) {

                if (!$(e.target).hasClass('img-item')) {
                    return;
                }

                $('.blind').addClass('opacity-100 !z-20')

                $('div[data-liked-profile]').addClass('!hidden');

                let userId = $(this).data('mini-liked-profile');

                $('div[data-liked-profile|="' + userId + '"]').removeClass('!hidden');
            })

            $('.blind').click(function () {
                $(this).removeClass('opacity-100 !z-20');
                $('div[data-liked-profile]').addClass('!hidden');
            })
        })
    </script>
@endsection

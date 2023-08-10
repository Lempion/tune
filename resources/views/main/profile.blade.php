@extends('layouts.main', ['title' => 'Profile', 'active' => 'profile'])

@section('content')
    <div class="load-wrapper absolute left-1/2 top-1/2 transition-all duration-200 opacity-0">
        <div class="cssload-container">
            <div class="cssload-whirlpool"></div>
        </div>
    </div>

    <div class="card app-card-wrapper rounded-xl transition-all duration-200 opacity-100">
        @if(!$user['profile']->isEmpty)
            <div class="app-card-container rounded-t-xl cursor-default">

                <div id="indicators-carousel" class="relative w-full overflow-hidden" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56  rounded-lg md:h-96">
                        @foreach($user['avatars'] as $avatar)
                            <div class="hidden" data-carousel-item="{{ !$loop->first ?: 'active' }}">
                                <img src="{{ asset('storage/avatars/' . $avatar->image_name) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        @for($i = 0; $i < count($user['avatars']); $i++)
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $i === 0 }}" data-carousel-slide-to="{{ $i }}"></button>
                        @endfor
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

                <div class="user-information w-[95%] mx-auto space-y-4 pb-20">
                    <div class="space-y-2">
                        <div class="name text-3xl font-bold">{{ $user['profile']->name . ', ' . \Carbon\Carbon::parse($user['profile']->date_birth)->age }}</div>
                        <div class="education text-lg flex space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"/>
                            </svg>

                            <p class="text-gray-700">{{ $user['profile']->education }}</p>
                        </div>
                        <div class="job text-lg flex space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                            </svg>

                            <p class="text-gray-700">{{ $user['profile']->job }}</p>
                        </div>
                    </div>

                    <div class="user-about space-y-1">
                        <p class="text-xl font-semibold">About me</p>
                        <p class="text-gray-700">{{ $user['profile']->about }}</p>
                    </div>

                    <div class="user-interests space-y-1">
                        @if(!$user['interests']->isEmpty())
                            <p class="text-xl font-semibold">Interests</p>
                            <div class="flex flex-wrap justify-start">
                                @foreach($user['interests'] as $interest)
                                    <div class="interest-item flex items-center border-2 border-orange-400/60 rounded-2xl py-0.5 px-2 my-0.5 mx-1 bg-gradient-to-r from-orange-300/60 to-pink-500/40">
                                        <div class="mr-1">
                                            <span class="font-normal text-xl">{{ $interest->icon }}</span>
                                        </div>
                                        <p>{{ $interest->word }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="user-music space-y-1">
                        @if(!$user['music']->isEmpty())
                            <p class="text-xl font-semibold">Music</p>
                            <div class="flex flex-wrap justify-start">
                                @foreach($user['music'] as $musicItem)
                                    <div class="music-item flex items-center border-2 border-orange-400/60 rounded-2xl py-0.5 px-2 my-0.5 mx-1 bg-gradient-to-r from-orange-300/60 to-pink-500/40">
                                        <p>{{ $musicItem->word }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="user-music space-y-1">
                        @if(!empty($user['profile']->movies) || !empty($user['profile']->books))
                            <p class="text-xl font-semibold">@if(!empty($user['profile']->movies) && !empty($user['profile']->books))
                                    Movies and books @elseif(!empty($user['profile']->movies))
                                    Movies @elseif(!empty($user['profile']->books)) Books @endif</p>

                            @if(!empty($user['profile']->movies))
                                <div class="space-x-2 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0118 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0118 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 016 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5"/>
                                    </svg>
                                    <p class="text-gray-700">{{ $user['profile']->movies }}</p>
                                </div>
                            @endif

                            @if(!empty($user['profile']->books))
                                <div class="space-x-2 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                                    </svg>
                                    <p class="text-gray-700">{{ $user['profile']->books }}</p>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <div data-style-type="1" class="card-style absolute opacity-40 cursor-pointer bg-gradient-to-t from-[#F9DED5] to-[#F5F1EA] hover:from-[#F5F1EA] hover:to-[#F9DED5] hover:opacity-90 h-24 w-5 text-center text-sm rounded-r-2xl -right-5 top-[40%] shadow-md [writing-mode:vertical-lr] font-semibold">
                About me
            </div>

            <div class="profile-edit absolute top-2 -right-12 z-20 w-10 h-10 rounded-full bg-gradient-to-br from-pink-500 to-orange-400 flex-justify-items-center shadow-md shadow-pink-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 stroke-1 stroke-white cursor-pointer hover:stroke-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                </svg>
            </div>
        @else
            <div class="w-full h-full flex-justify-items-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-36 h-36 stroke-0.5 stroke-pink-600 filter drop-shadow-pink">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <button class="relative inline-flex items-center justify-center p-1 mb-3 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                  <span class="relative px-10 py-3 transition-all ease-in duration-75 bg-[#f7e5dd] dark:bg-gray-900 rounded-md group-hover:bg-opacity-0 text-2xl">
                      Create Profile
                  </span>
                </button>
            </div>
        @endif
    </div>
    @vite('resources/js/card.js')
    <script>
        $('.profile-edit').click(function (){
            $(location).attr('href','{{ route('profile.edit') }}')
        })
    </script>
@endsection

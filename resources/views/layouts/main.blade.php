<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-full h-full bg-no-repeat bg-cover flex justify-center" style="background-image: url('{{ asset('storage/images/bg-main.jpg') }}')">
    <div class="container fixed h-full relative">
        <header class="absolute h-14 w-full rounded-b-3xl bg-gradient-to-r from-[#F9DED5] to-[#FCEDE8] shadow-xl overflow-hidden">
            <div class="h-full flex text-2xl text-gray-700 items-center">
                <div data-link="{{ route('questionnaires') }}" class="questionnaires nav-item {{ $active !== 'questionnaires' ?: 'select-nav-item' }}  flex justify-center items-center cursor-pointer h-full w-1/4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 nav-svg {{ $active !== 'questionnaires' ?: 'select-nav-svg' }} stroke-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                    </svg>

                    <p>Questionnaires</p>
                </div>

                <div data-link="{{ route('questionnaires') }}" class="likes nav-item {{ $active !== 'likes' ?: 'select-nav-item' }} flex justify-center items-center cursor-pointer h-full w-1/4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 nav-svg {{ $active !== 'likes' ?: 'select-nav-svg' }} stroke-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                    </svg>

                    <p>Likes</p>
                </div>

                <div data-link="{{ route('questionnaires') }}" class="chats nav-item {{ $active !== 'chats' ?: 'select-nav-item' }} flex justify-center items-center cursor-pointer h-full w-1/4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 nav-svg {{ $active !== 'chats' ?: 'select-nav-svg' }} stroke-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z"/>
                    </svg>

                    <p>Chats</p>
                </div>

                <div data-link="{{ route('profile.index') }}" class="profile nav-item {{ $active !== 'profile' ?: 'select-nav-item' }} flex justify-center items-center cursor-pointer h-full w-1/4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 nav-svg {{ $active !== 'profile' ?: 'select-nav-svg' }} stroke-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>

                    <p>Profile</p>
                </div>
            </div>
        </header>
        <div class="content h-full w-full flex justify-center items-center">
            @yield('content')
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.nav-item').click(function () {

                $(location).attr('href', $(this).data('link'));

                $('.nav-item').removeClass('select-nav-item');
                $('.nav-svg').removeClass('select-nav-svg');

                $(this).addClass('select-nav-item');
                $('svg', this).addClass('select-nav-svg');
            });
        });
    </script>
</body>
</html>

@extends('layouts.app', ['title' => 'Register'])

@section('content')
    <div class="h-full w-full bg-no-repeat bg-cover fixed flex justify-center items-center" style="background-image: url('{{ asset('storage/images/bg-r.jpg') }}')">
        <div class="h-4/6 w-2/6 bg-green-400 rounded-3xl overflow-hidden relative flex flex-col justify-end shadow-[-15px_15px_1px_1px_rgba(1,197,221,0.3)]">
            <div class="h-3/6 w-full bg-cover absolute top-0" style="background-image: url('{{ asset('storage/images/bg-form-register.jpg') }}')"></div>
            <div class="h-4/6 w-full bg-cover rounded-2xl z-10 shadow-inner shadow-gray-300 overflow-hidden" style="background-image: url('{{ asset('storage/images/bg-down-form-r.jpg') }}')">

                <div class="w-full h-full flex justify-center items-center relative">
                    <div class="load-wrapper absolute left-1/2 top-1/2 transition-all duration-200 opacity-0">
                        <div class="cssload-container">
                            <div class="cssload-whirlpool"></div>
                        </div>
                    </div>

                    <form class="form-register z-10 w-full h-5/6 flex flex-col justify-center items-center transition-all duration-200 opacity-100 relative">
                        <div class="w-4/6 mb-6">
                            <input type="text" id="phone" name="phone" maxlength="11" class="app-button rounded-none bg-gray-100/0 text-[#343d74] font-bold rounded-lg block w-full px-1.5 text-3xl hover:cursor-pointer" placeholder="Phone number" required>
                            <div class="error error-phone"></div>
                        </div>
                        <div class="w-4/6 mb-6">
                            <input type="password" id="password" name="password" class="app-button rounded-none bg-gray-100/0 text-[#343d74] font-bold rounded-lg block w-full px-1.5 text-3xl hover:cursor-pointer" placeholder="Password" required>
                            <div class="error error-password"></div>
                        </div>
                        <div class="w-4/6 mb-6">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="app-button rounded-none bg-gray-100/0 text-[#343d74] font-bold rounded-lg block w-full px-1.5 text-3xl hover:cursor-pointer" placeholder="Confirm password" required>
                            <div class="error error-password_confirmation"></div>
                        </div>
                        <button type="submit" class="mb-6 btn-register text-white bg-orange-400 hover:bg-orange-500 font-medium rounded-lg text-3xl w-full sm:w-auto px-8 py-3 text-center shadow-[3px_3px_1px_1px_rgba(251,146,60,0.5)] hover:shadow-[3px_3px_1px_1px_rgba(251,146,60,0.9)]">
                            Registration
                        </button>
                    </form>
                    <a href="{{ route('login') }}" class="absolute bottom-2 text-gray-600 font-semibold text-lg underline hover:text-gray-800">Log in</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('.btn-register').click(function (e) {
                e.preventDefault();

                $('form').removeClass('opacity-100').addClass('opacity-0');
                $('.load-wrapper').removeClass('opacity-0').addClass('opacity-100');

                $('.error').each(function () {
                    $(this).html('');
                })

                $.ajax({
                    url: '{{ route('registration') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'phone': $('#phone').val(),
                        'password': $('#password').val(),
                        'password_confirmation': $('#password_confirmation').val(),
                    },
                    success: function (response) {
                        if (response['success']) {
                            $(location).attr('href', response['success']['link']);
                        }
                    },
                    error: function (response) {

                        let errors = response.responseJSON.errors;

                        $.each(errors, function (index, value) {
                            $.each(value, function (indexError, message) {
                                $('.error-' + index).append('<p class="text-sm font-bold text-red-600 pt-1 drop-shadow-red-1">' + message + '</p>');
                            });
                        });

                        $('form').removeClass('opacity-0').addClass('opacity-100');
                        $('.load-wrapper').removeClass('opacity-100').addClass('opacity-0');
                    }
                });
            });
        })
    </script>
@endsection

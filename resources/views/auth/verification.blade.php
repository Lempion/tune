@extends('layouts.app', ['title' => 'Verification'])

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

                    <form class="z-10 w-full h-full flex flex-col items-center transition-all duration-200 opacity-100">
                        <div class="w-4/6 h-2/6 text-gray-500 flex items-center">
                            <div class="h-1/3">
                                <p class="text-2xl font-bold">We sent you an SMS code</p>
                                <p class="text-sm">On number: {{ $phone }}</p>
                            </div>
                        </div>

                        <div class="w-4/6 h-2/6">
                            <div class="h-1/2">
                                <input type="text" id="confirm_code" name="confirm_code" class="app-button rounded-none bg-gray-100/0 text-[#343d74] font-bold rounded-lg block w-full px-1.5 text-3xl hover:cursor-pointer" placeholder="Confirmation code" required>
                                <div class="error error-confirm_code"></div>
                            </div>

                            <div class="h-1/2 flex justify-center text-gray-700">
                                <p class="send_new_code underline inline-block hover:font-semibold hover:cursor-pointer">Send new code</p>
                                <div class="timer_send_code text-sm text-gray-500 hidden flex flex-col items-center justify-start">
                                    <p>Resending sms via</p>
                                    <p id="timer">5 : 00</p>
                                </div>

                            </div>


                        </div>

                        <div class="w-4/6 h-2/6 flex justify-center">
                            <div>
                                <button type="submit" class="btn-confirm text-white bg-orange-400 hover:bg-orange-500 font-medium rounded-lg text-3xl w-full sm:w-auto px-8 py-3 text-center shadow-[3px_3px_1px_1px_rgba(251,146,60,0.5)] hover:shadow-[3px_3px_1px_1px_rgba(251,146,60,0.9)]">
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            let timeMinut = 0;

            $('.btn-confirm').click(function (e) {
                e.preventDefault();

                $('form').removeClass('opacity-100').addClass('opacity-0');
                $('.load-wrapper').removeClass('opacity-0').addClass('opacity-100');

                $('.error').each(function (e) {
                    $(this).html('');
                })

                $.ajax({
                    url: '{{ route('verification.verification') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'confirm_code': $('#confirm_code').val(),
                    },
                    success: function (response) {
                        if(response.success){
                            $(location).attr('href', response.success.link)
                        }
                    },
                    error: function (response) {
                        let errors = response.responseJSON.errors;

                        showErrors(errors);

                        $('form').removeClass('opacity-0').addClass('opacity-100');
                        $('.load-wrapper').removeClass('opacity-100').addClass('opacity-0');
                    }
                });
            });

            $('.send_new_code').click(function (e) {
                e.preventDefault();

                $('.send_new_code').addClass('hidden');

                $.ajax({
                    url: '{{ route('send-new-code') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        startTimer(5);
                    },
                    error: function (response) {
                        let errors = response.responseJSON.errors;

                        showErrors(errors);
                    }
                });
            });

            function showErrors(errors) {
                $.each(errors, function (index, value) {
                    $.each(value, function (indexError, message) {
                        $('.error-' + index).append('<p class="text-sm text-red-600 pt-1">' + message + '</p>');
                    });
                });
            }

            function startTimer(minute) {

                let timerShow = document.getElementById("timer");

                timeMinut = parseInt(minute) * 60;

                $('.timer_send_code').removeClass('hidden');

                timer = setInterval(function () {
                    seconds = timeMinut % 60 // Получаем секунды

                    seconds = seconds < 10 ? '0' + seconds : seconds

                    minutes = timeMinut / 60 % 60 // Получаем минуты
                    // Условие если время закончилось то...
                    if (timeMinut <= 0) {
                        // Таймер удаляется
                        clearInterval(timer);

                        $('.timer_send_code').addClass('hidden');
                        $('.send_new_code').removeClass('hidden');
                    } else { // Иначе
                        // Выводим строку в блок для показа таймера
                        timerShow.innerHTML = `${Math.trunc(minutes)} : ${seconds}`;
                    }
                    --timeMinut; // Уменьшаем таймер
                }, 1000)
            }

            @error('verif_phone') alertError('{{ $message }}') @enderror
        })

    </script>
@endsection

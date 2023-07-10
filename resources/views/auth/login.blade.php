@extends('layouts.app', ['title' => 'Login'])

@section('content')
    <div class="h-full w-full bg-no-repeat bg-cover fixed flex justify-center items-center" style="background-image: url('{{ asset('storage/images/bg-l.jpg') }}')">
        <div class="h-4/6 w-2/6 bg-green-400 rounded-3xl overflow-hidden relative flex flex-col justify-end shadow-[-15px_15px_1px_1px_rgba(168,174,232,0.8)]">
            <div class="h-3/6 w-full bg-cover absolute top-0" style="background-image: url('{{ asset('storage/images/bg-form-auth2.jpg') }}')"></div>
            <div class="h-4/6 w-full bg-cover rounded-2xl z-10 shadow-inner shadow-gray-300 overflow-hidden" style="background-image: url('{{ asset('storage/images/bg-down-form-l.jpg') }}')">
                <form class="h-full relative" action="{{ route('authorization') }}" method="post">
                    @csrf
                    <div class="w-full h-full flex flex-col justify-center items-center">
                        <div class="w-4/6 @if($errors->has('phone')) mb-5 @endif mb-10">
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="border-b-4 @if($errors->has('phone')) border-b-red-500 @endif border-[#ffa983] rounded-none bg-gray-100/0 text-[#343d74] font-bold rounded-lg block w-full px-1.5 text-3xl focus:outline-0 focus:border-b-gray-700 hover:cursor-pointer" placeholder="Phone number" required>

                            @error('phone')
                            <div>
                                <p class="text-sm text-red-600 pt-1"> {{ $message }} </p>
                            </div>
                            @enderror
                        </div>
                        <div class="w-4/6 @if($errors->has('password')) mb-5 @endif mb-10">
                            <input type="password" id="password" name="password" class="border-b-4 @if($errors->has('password')) border-b-red-500 @endif border-[#ffa983] rounded-none bg-gray-100/0 text-[#343d74] font-bold rounded-lg block w-full px-1.5 text-3xl focus:outline-0 focus:border-b-gray-700 hover:cursor-pointer" placeholder="Password" required>

                            @error('password')
                            <div>
                                <p class="text-sm text-red-600 pt-1"> {{ $message }} </p>
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-orange-400 hover:bg-orange-500 font-medium rounded-lg text-3xl w-full sm:w-auto px-8 py-3 text-center shadow-[3px_3px_1px_1px_rgba(251,146,60,0.5)] hover:shadow-[3px_3px_1px_1px_rgba(251,146,60,0.9)]">
                            Login
                        </button>
                        <a href="{{ route('register') }}" class="absolute bottom-10 text-gray-600 font-semibold text-lg underline hover:text-gray-800">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#phone').click(function () {
                $(this).removeClass('border-b-red-500')
            })

            $('#password').click(function () {
                $(this).removeClass('border-b-red-500')
            })
        })
    </script>
@endsection

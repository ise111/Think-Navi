@extends('layouts.app')

@section('title')
ログイン
@endsection

@section('content')
<main class="pt-28 sm:container sm:mx-auto sm:max-w-lg">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-800 text-white py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    ログイン
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="w-full select-none font-bold text-center whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-red-600 hover:bg-red-800 sm:py-4">
                            <i class="fab fa-google mr-1"></i>Googleでログイン
                        </a>
                    </div>

                        <div class="flex flex-wrap">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                メールアドレス
                            </label>

                            <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                パスワード
                            </label>

                            <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror" name="password" required>

                            @error('password')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-gray-800 hover:bg-gray-600 sm:py-4">
                                ログイン
                            </button>

                            @if (Route::has('register'))
                            <p class="w-full text-xs text-gray-700 mt-6 sm:text-sm sm:mt-8">
                                アカウントをお持ちでない方は
                                <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('register') }}">
                                    こちら
                                </a>
                            </p>
                            @endif
                            @if (Route::has('password.request'))
                            <p class="w-full text-xs text-gray-700 my-6 sm:text-sm sm:my-8">
                                パスワードをお忘れの方は
                                <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto" href="{{ route('password.request') }}">
                                    こちら
                                </a>
                            </p>
                            @endif
                        </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
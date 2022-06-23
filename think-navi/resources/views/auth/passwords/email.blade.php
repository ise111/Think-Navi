@extends('layouts.app')

@section('title')
    パスワードリセットリクエスト
@endsection

@section('content')
<main class="pt-28 sm:container sm:mx-auto sm:max-w-lg">
    <div class="flex">
        <div class="w-full">

            @if (session('status'))
            <div class="text-sm text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                role="alert">
                {{ session('status') }}
            </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                <header class="font-semibold bg-gray-800 text-white py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    パスワードリセットリクエスト
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            メールアドレス
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap justify-center items-center space-y-6 pb-6 sm:pb-10 sm:space-y-0 sm:justify-between">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-gray-800 hover:bg-gray-600 sm:w-auto sm:px-4 sm:order-1">
                            送信する
                        </button>

                        <p class="mt-4 text-xs text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline sm:text-sm sm:order-0 sm:m-0">
                            <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                                ログイン画面に戻る
                            </a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection

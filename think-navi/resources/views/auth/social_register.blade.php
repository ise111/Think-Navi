@extends('layouts.app')

@section('title')
ユーザー登録
@endsection

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-800 text-white py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    ユーザー登録
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('register.{provider}', ['provider' => $provider]) }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            ニックネーム
                        </label>

                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            メールアドレス
                        </label>

                        <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" name="email" value="{{ $email }}" disabled autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit" class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-gray-800 hover:bg-gray-600 mb-6 sm:mb-8 sm:py-4">
                            ユーザー登録
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
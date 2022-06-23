@extends('layouts.start_app')

@section('title')
プロフィール
@endsection

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white border-1 rounded-md shadow-lg">

                <header class="font-semibold bg-gray-800 text-white py-6 px-8 rounded-t-md flex justify-between items-center">
                    プロフィール
                    <a href="{{ route('start-page') }}" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 focus:outline-none rounded-lg text-sm p-1.5 ml-auto inline-flex items-center z-10">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </header>
                @if (session('status'))
                <div class="text-center mt-4 p-2 bg-gray-600 rounded-2xl text-white" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('profile.update-profile') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="flex justify-center">
                        <input type="file" name="avatar" class="hidden" accept="image/png,image/jpeg,image/gif" id="avatar" />
                        <label for="avatar" class="inline-block items-center">
                            @if(!empty($user->avatar_file_name))
                            <img src="storage/avatars/{{ $user->avatar_file_name }}" class="rounded-full" style="object-fit: cover; width: 200px; height: 200px;">
                            @else
                            <img src="/images/default_avatar.png" class="border border-black rounded-full" style="object-fit: cover; width: 200px; height: 200px;">
                            @endif
                    </div>

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            ニックネーム
                        </label>

                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

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

                        <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit" class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-gray-800 hover:bg-gray-600 sm:py-4">
                            プロフィールを更新
                        </button>
                        <button type="button" data-modal-toggle="modalAlertDeleteUser" class="mt-5 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-sm leading-normal no-underline text-gray-100 bg-red-800 hover:bg-red-600 sm:py-4">
                            登録を削除する
                        </button>

                        <p class="w-full text-xs text-gray-700 my-6 sm:text-sm sm:my-8">
                            パスワード変更は
                            <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto" href="{{ route('password.request') }}">
                                こちら
                            </a>
                        </p>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>

<div id="modalAlertDeleteUser" tabindex="-1" aria-hidden="true" class="hidden modal overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-3 rounded-t bg-gray-800">
                <h3 class="my-auto text-xl font-semibold text-white">
                    登録削除
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="modalAlertDeleteUser">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="w-full space-y-6 px-4" method="POST" action="{{ route('profile.delete-user') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="p-3">
                    <p class="text-base font-semibold leading-relaxed text-gray-600 text-center">
                        Think Naviに登録された内容、作成したファイル全てが削除されます。<br>問題ありませんか？
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-3 space-x-2 rounded-b border-t border-gray-200">
                    <button data-modal-toggle="modalAlertDeleteUser" type="button" onclick="submit();" class="text-white bg-red-800 hover:bg-red-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">登録削除</button>
                    <button data-modal-toggle="modalAlertDeleteUser" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:outline-none rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">キャンセル</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
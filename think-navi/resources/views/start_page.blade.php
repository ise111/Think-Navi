@extends('layouts.start_app')
@section('title')
スタートページ
@endsection

@section('content')
<div id="NewFile" class="modal overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-screen h-screen flex items-center">
    <div class="relative p-4 w-full max-w-2xl mx-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-3 rounded-t bg-gray-800">
                <h3 class="my-auto text-xl font-semibold text-white lg:text-xl">
                    新規作成
                </h3>
            </div>
            <!-- Modal body -->
            <form class="w-full space-y-6 px-4" method="POST" action="{{ route('main.create-new-files') }}">
                @csrf
                <div class="p-3">
                    <p class="text-base leading-relaxed text-gray-600">
                        作成するファイル名
                    </p>
                    <input id="name" type="string" class="form-input w-full" name="name" required>
                </div>
                <div>
                    <div>作成済みのファイルを選択</div>
                    <ul class="max-h-40 overflow-y-scroll">
                        @foreach($think_files as $think_file)
                        <li>
                            <a href="{{ route('main.select', ['id' => $think_file->id]) }}" type="button" class="flex justify-between items-center text-center w-full mx-auto py-2 px-4 text-white bg-gray-800 hover:bg-gray-600">
                                {{ $think_file->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-3 space-x-2 rounded-b border-t border-gray-200">
                    <button type="submit" class="text-white bg-gray-800 hover:bg-gray-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">作成する</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
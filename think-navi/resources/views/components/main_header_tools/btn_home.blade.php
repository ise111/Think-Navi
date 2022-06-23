<!-- ホームボタン -->
<button id="dropdownHome" data-dropdown-toggle="dropdown" type="button" class="flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0L24 8V24H15V16H9V24H0V8L12 0Z" fill="#FFFEFE" />
    </svg>

</button>
<div id="dropdown" class="hidden z-10 w-56 bg-gray-800 divide-y divide-gray-100 shadow">
    <ul class="text-sm text-gray-700 overflow-y-auto" aria-labelledby="dropdownHome" style="max-height: 600px;">
        <li>
            <button type="button" data-modal-toggle="modalNewFile" class="block w-full mx-auto py-2 text-white bg-gray-800 hover:bg-gray-600 focus:outline-none">新規作成</button>
        </li>
        <li>
            <div class="block w-full text-center py-2 border-t border-color-gray-500 text-white bg-gray-800">保存済みファイル</div>
        </li>

        @if ($ThinkFiles->count() > 0)
        @foreach ($ThinkFiles as $ThinkFile)
        <li class="file flex items-center justify-end relative">
            <a href="{{ route('main.select', ['id' => $ThinkFile->id]) }}" type="button" class="show-file absolute top-0 left-0 flex items-center text-center w-full h-full py-2 px-4 text-white bg-gray-800 hover:bg-gray-600">
                {{ $ThinkFile->name }}
            </a>
            <form class="edit-file-name" method="post" action="{{ route('main.edit-file-name') }}">
                @csrf
                <input type="hidden" name="edit_file_id" value="{{ $ThinkFile->id }}">
            </form>
            <form class="edit-file flex z-10" method="post">
                @csrf
                <button type="button" class="btn-edit-file-name flex items-center justify-center bg-gray-400 rounded h-6 w-6 m-2 focus:outline-none hover:bg-gray-600">
                    <svg width="14" height="14" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M30.3896 2.08151L28.3081 0L15.2104 13.0977L17.2919 15.1792L30.3896 2.08151ZM14.7972 13.7898L14.0407 16.3489L16.5998 15.5924L14.7972 13.7898Z" fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3532 6H5C2.23858 6 0 8.23858 0 11V25C0 27.7614 2.23858 30 5 30H19C21.7614 30 24 27.7614 24 25V13.9242L23 14.9838V25C23 27.2091 21.2091 29 19 29H5C2.79086 29 1 27.2091 1 25V11C1 8.79086 2.79086 7 5 7H15.4096L16.3532 6Z" fill="white" />
                    </svg>
                </button>
                <button id="delete-file" type="submit" class="flex items-center justify-center bg-gray-400 rounded h-6 w-6 m-2 focus:outline-none hover:bg-gray-600 @if ($select_think_file) {{ $select_think_file->id === $ThinkFile->id ? 'hidden' : '' }} @endif" formaction="{{ route('main.delete-file', ['id' => $ThinkFile->id]) }}">
                    <svg width="14" height="14" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.656854 0.656867L11.9706 11.9706M0.656854 11.9706L11.9706 0.656867" stroke="#FFFEFE" />
                    </svg>
                </button>
            </form>
        </li>
        @endforeach
        @endif
    </ul>
</div>
<div id="modalNewFile" tabindex="-1" aria-hidden="true" class="hidden modal overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-3 rounded-t bg-gray-800">
                <h3 class="my-auto text-xl font-semibold text-white lg:text-xl">
                    新規作成
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="modalNewFile">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="w-full space-y-6 px-4" method="POST" action="{{ route('main.create-new-files') }}">
                @csrf
                <div class="p-3">
                    <p class="text-base leading-relaxed text-gray-600">
                        作成するファイル名
                    </p>
                    <input id="file_name" type="string" class="form-input w-full" name="name">
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-3 space-x-2 rounded-b border-t border-gray-200">
                    <button data-modal-toggle="modalNewFile" type="button" onclick="submit();" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">保存する</button>
                    <button data-modal-toggle="modalNewFile" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:outline-none rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">キャンセル</button>
                </div>
            </form>
        </div>
    </div>
</div>
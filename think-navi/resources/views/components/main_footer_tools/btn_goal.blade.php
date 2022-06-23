<button type="button" data-dropdown-toggle="dropdownGoal" class="flex items-center px-3 text-white font-bold bg-gray-800 h-10 hover:bg-gray-600 focus:outline-none">
    ゴール決定
</button>

<div id="dropdownGoal" class="hidden z-10 w-56 bg-gray-800 divide-y divide-gray-100 shadow">
    <ul class="text-sm text-gray-700" aria-labelledby="dropdownTarget">
        <li>
            <button type="button" data-modal-toggle="modalNewGoal" class="block w-full mx-auto py-2 text-white bg-gray-800 hover:bg-gray-600 focus:outline-none">新規作成</button>
        </li>
        <li>
            <div class="block w-full text-center py-2 border-t border-color-gray-500 text-white bg-gray-800">保存済みゴール</div>
        </li>
        @if($select_think_file)
        @if (optional($think_goal_files)->count() > 0)
        @foreach ($think_goal_files as $think_goal_file)
        <li class="file flex items-center justify-end relative">
            <a type="button" data-modal-toggle="{{ $think_goal_file }}" class="show-file absolute top-0 left-0 flex items-center text-center w-full h-full py-2 px-4 text-white bg-gray-800 hover:bg-gray-600">
                {{ $think_goal_file->title }}
            </a>
            <form class="edit-file-name" method="post" action="{{ route('main.edit-goal-file-name') }}">
                @csrf
                <input type="hidden" name="edit_file_id" value="{{ $think_goal_file->id }}">
            </form>
            <form class="edit-file flex z-10" method="post">
                @csrf
                <button type="button" class="btn-edit-file-name flex items-center justify-center bg-gray-400 rounded h-6 w-6 m-2 focus:outline-none hover:bg-gray-600">
                    <svg width=" 14" height="14" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M30.3896 2.08151L28.3081 0L15.2104 13.0977L17.2919 15.1792L30.3896 2.08151ZM14.7972 13.7898L14.0407 16.3489L16.5998 15.5924L14.7972 13.7898Z" fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3532 6H5C2.23858 6 0 8.23858 0 11V25C0 27.7614 2.23858 30 5 30H19C21.7614 30 24 27.7614 24 25V13.9242L23 14.9838V25C23 27.2091 21.2091 29 19 29H5C2.79086 29 1 27.2091 1 25V11C1 8.79086 2.79086 7 5 7H15.4096L16.3532 6Z" fill="white" />
                    </svg>
                </button>
                <button type="submit" class="delete-target flex items-center justify-center bg-gray-400 rounded h-6 w-6 m-2 focus:outline-none hover:bg-gray-600" formaction=" {{ route('main.delete-goal-file', ['id' => $think_goal_file->id]) }}">
                    <svg width="14" height="14" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.656854 0.656867L11.9706 11.9706M0.656854 11.9706L11.9706 0.656867" stroke="#FFFEFE" />
                    </svg>
                </button>
            </form>
        </li>
        @endforeach
        @endif
        @endif
    </ul>

</div>
@if ($select_think_file)
<?php
$goalCategoryGroups = [
    '誰が',
    'どこで',
    '何を',
    'なぜ',
    'どのように',
    'いつまで',
];
$goalCategories = [
    [
        '実施者',
    ], [
        '場所',
        '媒体',
    ], [
        '必要物',
    ], [
        '理由',
        '目的',
    ], [
        '方法',
    ], [
        '期限',
    ]

];
?>
<div id="modalNewGoal" tabindex="-1" aria-hidden="true" class="hidden modal overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full h-full">
    <div class="relative p-4 w-full max-w-xl max-h-10/12">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow border-2 border-gray-700">
            <!-- Modal header -->
            <div class="flex relative justify-between items-start p-3 rounded-t bg-gray-800">
                <div class="drag-start w-full h-full absolute top-0 left-0 cursor-move"></div>
                <h3 class="my-auto text-xl font-semibold text-white">
                    新規作成
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 focus:outline-none rounded-lg text-sm p-1.5 ml-auto inline-flex items-center z-10" data-modal-toggle="modalNewGoal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="w-full" method="POST" action="{{ route('main.create-new-goals') }}">
                @csrf
                <div class="p-3 overflow-y-scroll" style="max-height: 600px;">
                    <h4 class="flex text-base leading-relaxed text-gray-600">
                        作成するゴール名<p class="text-red-700">※必須</p>
                    </h4>
                    <input type="hidden" name="select_ThinkFiles_id" value="{{ $select_think_file->id }}">
                    <input type="string" class="form-input w-full h-6 focus:outline-none" name="title" required>
                    <div class="flex flex-col nav-content-area p-3">
                        @foreach($goalCategoryGroups as $index => $categoryGroup)
                        <h4 class="text-center rounded-xl mt-4 text-base font-semibold border-2 p-1 border-gray-700 bg-gray-700 text-white">{{ $categoryGroup }}</h4>
                        <div class="flex flex-col ml-2">
                            @foreach($goalCategories[$index] as $category)
                            <div class="nav-content-area flex mt-4 justify-between items-center">
                                <div class="category-name font-semibold text-sm text-gray-700 border-2 p-1 border-gray-700 rounded-xl">{{ $category }}</div>
                                <input class="category-group" type="hidden" name="category_group[]" value="{{ $categoryGroup }}">
                                <input class="category-value" type="hidden" name="category[]" value="{{ $category }}">
                                <div class="flex w-5/6">
                                    <input type="text" name="content_name[]" class="content-name w-full mx-2 h-6 outline-none rounded-sm border-solid border-2 border-gray-500">
                                    <div class="flex items-center">
                                        <div class="add-category-content w-6 h-6">
                                            <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="18" cy="18" r="17" stroke="black" stroke-width="2" />
                                                <path d="M26 18H10" stroke="black" stroke-width="2" />
                                                <path d="M18 10V26" stroke="black" stroke-width="2" />
                                            </svg>
                                        </div>
                                        <div class="delete-category-content hidden ml-2 w-6 h-6">
                                            <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="18" cy="18" r="17" stroke="black" stroke-width="2" />
                                                <path d="M26 18H10" stroke="black" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="flex">
                                <div class="add-category mt-4 ml-2 w-6 h-6">
                                    <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="18" cy="18" r="17" stroke="black" stroke-width="2" />
                                        <path d="M26 18H10" stroke="black" stroke-width="2" />
                                        <path d="M18 10V26" stroke="black" stroke-width="2" />
                                    </svg>
                                </div>
                                <div class="delete-category hidden mt-4 ml-2 w-6 h-6">
                                    <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="18" cy="18" r="17" stroke="black" stroke-width="2" />
                                        <path d="M26 18H10" stroke="black" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-3 space-x-2 rounded-b border-t border-gray-200 bg-gray-800">
                    <button data-modal-toggle="modalNewGoal" type="button" onclick="submit();" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">保存する</button>
                    <button data-modal-toggle="modalNewGoal" type="button" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none rounded-lg text-sm font-medium px-5 py-2.5">キャンセル</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@if($select_think_file)
@if (optional($think_goal_files)->count() > 0)
@foreach ($think_goal_files as $think_goal_file)
<div id="{{ $think_goal_file }}" tabindex="-1" aria-hidden="true" class="hidden modal overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full h-modal">
    <div class="relative p-4 w-full max-w-xl max-h-10/12">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow border-2 border-gray-700">
            <!-- Modal header -->
            <div class="flex relative justify-between items-start p-3 rounded-t bg-gray-800">
                <div class="drag-start w-full h-full absolute top-0 left-0 cursor-move"></div>
                <h3 class="my-auto text-xl font-semibold text-white">
                    {{ $think_goal_file->title }}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 focus:outline-none rounded-lg text-sm p-1.5 ml-auto inline-flex items-center z-10" data-modal-toggle="{{ $think_goal_file }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="goal-form w-full" method="POST" action="{{ route('main.update-goals') }}">
                @csrf
                <input type="hidden" name="think_goal_file_id" value="{{ $think_goal_file->id }}">
                <div class="flex flex-col nav-content-area p-3 overflow-y-scroll" style="max-height: 600px;">
                    <div class="flex flex-col ml-2">
                        @foreach($goalCategoryGroups as $index => $categoryGroup)
                        <h4 class="text-center rounded-xl mt-4 text-base font-semibold border-2 p-1 border-gray-700 bg-gray-700 text-white">{{ $categoryGroup }}</h4>
                        @foreach($think_goals as $think_goal)
                        @if($think_goal->ThinkFileGoals_id === $think_goal_file->id)
                        @if ($think_goal->category_group === $categoryGroup)
                        <div class="nav-content-area flex mt-4 justify-between items-center">
                            <div class="category-name font-semibold text-sm text-gray-700 border-2 p-1 border-gray-700 rounded-xl">{{ $think_goal->category }}</div>
                            <input class="content_id" type="hidden" name="content_id[]" value="{{ $think_goal->id }}">
                            <input class="category-group" type="hidden" name="category_group[]" value="{{ $think_goal->category_group }}">
                            <input class="category-value" type="hidden" name="category[]" value="{{ $think_goal->category }}">
                            <div class="flex w-5/6">
                                <input type="text" name="content_name[]" value="{{ $think_goal->content }}" class="content-name w-full mx-2 h-6 outline-none rounded-sm border-solid border-2 border-gray-500">
                                <div class="flex items-center">
                                    <div class="delete-category-content-in-table ml-2 w-6 h-6">
                                        <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="18" cy="18" r="17" stroke="black" stroke-width="2" />
                                            <path d="M26 18H10" stroke="black" stroke-width="2" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif
                        @endif
                        @endforeach
                        <div class="flex">
                            <div class="add-category mt-4 ml-2 w-6 h-6">
                                <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="18" cy="18" r="17" stroke="black" stroke-width="2" />
                                    <path d="M26 18H10" stroke="black" stroke-width="2" />
                                    <path d="M18 10V26" stroke="black" stroke-width="2" />
                                </svg>
                            </div>
                            <div class="delete-category hidden mt-4 ml-2 w-6 h-6">
                                <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="18" cy="18" r="17" stroke="black" stroke-width="2" />
                                    <path d="M26 18H10" stroke="black" stroke-width="2" />
                                </svg>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-3 space-x-2 rounded-b border-t border-gray-200 bg-gray-800">
                    <button data-modal-toggle="{{ $think_goal_file }}" type="button" onclick="submit();" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">更新する</button>
                    <button data-modal-toggle="{{ $think_goal_file }}" type="button" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none rounded-lg text-sm font-medium px-5 py-2.5">キャンセル</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endif
@endif
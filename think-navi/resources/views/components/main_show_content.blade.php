<?php
$confirmUsedNav = $select_think_child->children->whereNotNull('category_group')->isEmpty();
$quantityCategoryGroups = $select_think_child->children->whereNotNull('name')->whereNotNull('category_group')->groupBy('category_group')->count('category_group');
$quantityContents = $select_think_child->children->whereNotNull('name')->whereNull('category_group')->count();
$confirmUsedNomal = $select_think_child->children->whereNull('category_group')->count();
$select_think_child_children_normal = $select_think_child->children()->whereNotNull('name')->whereNull('category')->get();
$select_think_child_children = $select_think_child->children;
?>
@if(!($confirmUsedNav))
<?php $categoryGroups = $select_think_child->children()->whereNotNull(['name', 'category_group'])->groupBy('category_group')->get(['category_group']) ?>
@foreach($categoryGroups as $index => $categoryGroup)
<?php $confirmCategroyGroupUsed = $select_think_child_children->where('category_group', $categoryGroup->category_group)->whereNotNull('name')->isEmpty() ?>
@if(!($confirmCategroyGroupUsed))
<div class="nav-group-area flex items-center relative">
    @if($quantityCategoryGroups + $quantityContents === 1)
    <div class="w-10 border-black border-t-4"></div>
    @elseif($index === 0)
    <div class="absolute bottom-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
    <div class="w-10 border-black border-t-4"></div>
    @elseif($index + 1 === $quantityCategoryGroups + $quantityContents)
    <div class="absolute top-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
    <div class="w-10 border-black border-t-4"></div>
    @else
    <div class="absolute top-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
    <div class="absolute bottom-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
    <div class="w-10 border-black border-t-4"></div>
    @endif
    <div class="my-2">
        <div class="show-group-category flex justify-center text-white mb-1 p-1 rounded-xl @if($categoryGroup->category_group === '6つの視点から考える') bg-blue-700 @elseif($categoryGroup->category_group === '8つに派生させる') bg-purple-700 @elseif($categoryGroup->category_group === '希望、欠点から考える') bg-green-700 @elseif($categoryGroup->category_group === '類似から考える') bg-orange-700 @elseif($categoryGroup->category_group === '原因、背景から考える') bg-pink-700 @elseif($categoryGroup->category_group === '5W1Hから考える') bg-yellow-700 @endif">{{ $categoryGroup->category_group }}</div>
        <div class="flex flex-col category-group-area rounded border-solid border-4 @if($categoryGroup->category_group === '6つの視点から考える') border-blue-700 @elseif($categoryGroup->category_group === '8つに派生させる') border-purple-700 @elseif($categoryGroup->category_group === '希望、欠点から考える') border-green-700 @elseif($categoryGroup->category_group === '類似から考える') border-orange-700 @elseif($categoryGroup->category_group === '原因、背景から考える') border-pink-700 @elseif($categoryGroup->category_group === '5W1Hから考える') border-yellow-700 @endif">

            @foreach($select_think_child_children as $select_think_child)
            @if(!($select_think_child->name === null))
            @if($select_think_child->category_group === $categoryGroup->category_group)
            <div class="content-area flex items-center mt-5 ml-3 {{ $select_think_child->children->isEmpty() ? 'mr-3' : '' }}">
                <form method="post" class="flex relative items-center mx-0 mt-3 mb-3" action="{{ route('main.update-content') }}">
                    @csrf
                    <input class="edit-id" type="hidden" name="edit_id" value="{{ optional($select_think_child)->id }}">
                    <input class="current-map-position-x" type="hidden" name="current_map_position_x">
                    <input class="current-map-position-y" type="hidden" name="current_map_position_y">
                    <input class="current-map-scale" type="hidden" name="current_map_scale">
                    @if($select_think_child->category)
                    <div style="transform: translateY(-100%);" class="show_category absolute top-0 left-0 whitespace-no-wrap outline-none z-20 text-xs font-bold p-1 border-2 rounded-xl @if($categoryGroup->category_group === '6つの視点から考える') border-blue-700 text-blue-700 @elseif($categoryGroup->category_group === '8つに派生させる') border-purple-700 text-purple-700 @elseif($categoryGroup->category_group === '希望、欠点から考える') border-green-700 text-green-700 @elseif($categoryGroup->category_group === '類似から考える') border-orange-700 text-orange-700 @elseif($categoryGroup->category_group === '原因、背景から考える') border-pink-700 text-pink-700 @elseif($categoryGroup->category_group === '5W1Hから考える') border-yellow-700 text-yellow-700 @endif">{{ $select_think_child->category }}</div>
                    @endif
                    <div class="relative inline-block">
                        <!-- <input type="text" name="edit_category" class="edit_category absolute text-center outline-none rounded h-10 z-20" value="{{ $select_think_child->category }}"> -->
                        <div class="invisible inline-block px-4 py-3" style="font-size: {{ $select_think_child->content_font_size }}%"></div>
                        <input name="edit_content" type="text" class="hidden edit-content h-auto text-center outline-none rounded border-dashed border-4 border-gray-900 bg-white absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $select_think_child->content_border_color }}; background-color: {{ $select_think_child->content_bg_color }}; color: {{ $select_think_child->content_text_color }}; font-size: {{ $select_think_child->content_font_size }}%" value="{{ optional($select_think_child)->name }}">
                        <div href="{{ route('main.select-content') }}" class="show-content for-nav h-auto text-center outline-none rounded border-solid border-4 border-gray-900 bg-white absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $select_think_child->content_border_color }}; background-color: {{ $select_think_child->content_bg_color }}; color: {{ $select_think_child->content_text_color }}; font-size: {{ $select_think_child->content_font_size }}%">{{ optional($select_think_child)->name }}</div>
                        @if (!($select_think_child->ThinkMemo === null) || $select_think_child->have_navi)
                        <button type="button" data-dropdown-toggle="{{ $select_think_child->id }}thinkDropdown" data-dropdown-placement="right" class="h-4 w-4 border-solid border-4 border-black bg-white rounded-lg absolute top-0 right-0 z-10" style="transform: translate(30%, -30%);"></button>

                        <div id="{{ $select_think_child->id }}thinkDropdown" class="hidden z-50 w-auto bg-gray-800 divide-y divide-gray-100 shadow">
                            <ul class="text-sm text-gray-700 flex">
                                @if (!($select_think_child->ThinkMemo === null))
                                <li class="flex items-center justify-between">
                                    <button data-modal-toggle="{{ $select_think_child->id }}modalMemo" type="button" class="btn-open-modal flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </li>
                                @endif
                                @if ($select_think_child->have_navi)
                                <li class="flex items-center justify-between">
                                    <button data-modal-toggle="{{ $select_think_child->id }}naviModal" type="button" class="btn-open-modal flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
                                        <svg width="28" viewBox="0 0 43 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.45703 4.36523V16H0.927734V1.20703H3.32031L3.45703 4.36523ZM2.85547 8.04297L1.80273 8.00195C1.81185 6.99023 1.96224 6.05599 2.25391 5.19922C2.54557 4.33333 2.95573 3.58138 3.48438 2.94336C4.01302 2.30534 4.64193 1.81315 5.37109 1.4668C6.10938 1.11133 6.92513 0.933594 7.81836 0.933594C8.54753 0.933594 9.20378 1.03385 9.78711 1.23438C10.3704 1.42578 10.8672 1.73568 11.2773 2.16406C11.6966 2.59245 12.0156 3.14844 12.2344 3.83203C12.4531 4.50651 12.5625 5.33138 12.5625 6.30664V16H10.0195V6.2793C10.0195 5.50456 9.9056 4.88477 9.67773 4.41992C9.44987 3.94596 9.11719 3.60417 8.67969 3.39453C8.24219 3.17578 7.70443 3.06641 7.06641 3.06641C6.4375 3.06641 5.86328 3.19857 5.34375 3.46289C4.83333 3.72721 4.39128 4.0918 4.01758 4.55664C3.65299 5.02148 3.36589 5.55469 3.15625 6.15625C2.95573 6.7487 2.85547 7.3776 2.85547 8.04297ZM25.127 13.4707V5.85547C25.127 5.27214 25.0085 4.76628 24.7715 4.33789C24.5436 3.90039 24.1973 3.56315 23.7324 3.32617C23.2676 3.08919 22.6934 2.9707 22.0098 2.9707C21.3717 2.9707 20.8112 3.08008 20.3281 3.29883C19.8542 3.51758 19.4805 3.80469 19.207 4.16016C18.9427 4.51562 18.8105 4.89844 18.8105 5.30859H16.2812C16.2812 4.77995 16.418 4.25586 16.6914 3.73633C16.9648 3.2168 17.3568 2.7474 17.8672 2.32812C18.3867 1.89974 19.0065 1.5625 19.7266 1.31641C20.4557 1.0612 21.2669 0.933594 22.1602 0.933594C23.2357 0.933594 24.1836 1.11589 25.0039 1.48047C25.8333 1.84505 26.4805 2.39648 26.9453 3.13477C27.4193 3.86393 27.6562 4.77995 27.6562 5.88281V12.7734C27.6562 13.2656 27.6973 13.7897 27.7793 14.3457C27.8704 14.9017 28.0026 15.3802 28.1758 15.7812V16H25.5371C25.4095 15.7083 25.3092 15.321 25.2363 14.8379C25.1634 14.3457 25.127 13.89 25.127 13.4707ZM25.5645 7.03125L25.5918 8.80859H23.0352C22.3151 8.80859 21.6725 8.86784 21.1074 8.98633C20.5423 9.0957 20.0684 9.26432 19.6855 9.49219C19.3027 9.72005 19.0111 10.0072 18.8105 10.3535C18.61 10.6908 18.5098 11.0872 18.5098 11.543C18.5098 12.0078 18.6146 12.4316 18.8242 12.8145C19.0339 13.1973 19.3483 13.5026 19.7676 13.7305C20.196 13.9492 20.7201 14.0586 21.3398 14.0586C22.1146 14.0586 22.7982 13.8945 23.3906 13.5664C23.9831 13.2383 24.4525 12.8372 24.7988 12.3633C25.1543 11.8893 25.3457 11.429 25.373 10.9824L26.4531 12.1992C26.3893 12.582 26.2161 13.0059 25.9336 13.4707C25.651 13.9355 25.2728 14.3822 24.7988 14.8105C24.334 15.2298 23.778 15.5807 23.1309 15.8633C22.4928 16.1367 21.7728 16.2734 20.9707 16.2734C19.9681 16.2734 19.0885 16.0775 18.332 15.6855C17.5846 15.2936 17.0013 14.7695 16.582 14.1133C16.1719 13.4479 15.9668 12.7051 15.9668 11.8848C15.9668 11.0918 16.1217 10.3945 16.4316 9.79297C16.7415 9.18229 17.1882 8.67643 17.7715 8.27539C18.3548 7.86523 19.0566 7.55534 19.877 7.3457C20.6973 7.13607 21.6133 7.03125 22.625 7.03125H25.5645ZM35.9141 13.7168L39.9609 1.20703H42.5449L37.2266 16H35.5312L35.9141 13.7168ZM32.5371 1.20703L36.707 13.7852L36.9941 16H35.2988L29.9395 1.20703H32.5371Z" fill="white" />
                                        </svg>
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </div>
                        @endif
                    </div>
                </form>
                @if(!($select_think_child->children->isEmpty()))
                <div class="to-children-border w-10 border-black border-t-4"></div>
                @endif
                <form method="post" class="add-content-area flex items-center m-0 relative" action="{{ route('main.add-children') }}">
                    @csrf
                    <input class="edit-id" type="hidden" name="edit_id" value="{{ optional($select_think_child)->id }}">
                    <input class="current-map-position-x" type="hidden" name="current_map_position_x">
                    <input class="current-map-position-y" type="hidden" name="current_map_position_y">
                    <input class="current-map-scale" type="hidden" name="current_map_scale">
                </form>
                @if($select_think_child->children)
                <div class="flex flex-col next-child-area">
                    @include('components.main_show_content')
                </div>
                @else
                @break
                @endif
            </div>
            <form method="post" class="add-content-area flex items-center m-0 relative" action="{{ route('main.add-children') }}">
                @csrf
                <input class="edit-id" type="hidden" name="edit_id" value="{{ optional($select_think_child)->parent_id }}">
                <input class="current-map-position-x" type="hidden" name="current_map_position_x">
                <input class="current-map-position-y" type="hidden" name="current_map_position_y">
                <input class="current-map-scale" type="hidden" name="current_map_scale">
            </form>
            @endif
            @endif
            @endforeach

        </div>
    </div>
</div>
<form method="post" class="add-content-area flex items-center m-0 relative" action="{{ route('main.add-children') }}">
    @csrf
    <input class="edit-id" type="hidden" name="edit_id" value="{{ optional($select_think_child)->parent_id }}">
    <input class="current-map-position-x" type="hidden" name="current_map_position_x">
    <input class="current-map-position-y" type="hidden" name="current_map_position_y">
    <input class="current-map-scale" type="hidden" name="current_map_scale">
</form>
@endif
@endforeach

@endif

@if($confirmUsedNomal > 0)

@foreach($select_think_child_children_normal as $index => $select_think_child)
@if(!($select_think_child->name === null))
<div class="content-area flex items-center relative  {{ $select_think_child->children->isEmpty() ? 'mr-5' : '' }}">
    @if($quantityContents + $quantityCategoryGroups === 1)
    <div class="w-10 border-black border-t-4"></div>
    @elseif($index + $quantityCategoryGroups === 0)
    <div class="absolute bottom-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
    <div class="w-10 border-black border-t-4"></div>
    @elseif($index + 1 + $quantityCategoryGroups === $quantityContents + $quantityCategoryGroups)
    <div class="absolute top-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
    <div class="w-10 border-black border-t-4"></div>
    @else
    <div class="absolute top-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
    <div class="absolute bottom-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
    <div class="w-10 border-black border-t-4"></div>
    @endif

    <form method="post" class="flex relative items-center mx-0" action="{{ route('main.update-content') }}">
        @csrf
        <input class="edit-id" type="hidden" name="edit_id" value="{{ optional($select_think_child)->id }}">
        <input class="current-map-position-x" type="hidden" name="current_map_position_x">
        <input class="current-map-position-y" type="hidden" name="current_map_position_y">
        <input class="current-map-scale" type="hidden" name="current_map_scale">
        @if($select_think_child->category)
        <div class="show_category absolute top-0 left-0 bg-white text-center outline-none rounded z-20">{{ $select_think_child->category }}</div>
        @endif
        <div class="relative inline-block my-2">
            <!-- <input type="text" name="edit_category" class="edit_category absolute text-center outline-none rounded h-10 z-20" value="{{ $select_think_child->category }}"> -->
            <div class="invisible inline-block px-4 py-3" style="font-size: {{ $select_think_child->content_font_size }}%"></div>
            <input name="edit_content" type="text" class="hidden edit-content h-auto text-center outline-none rounded border-dashed border-4 border-gray-900 bg-white absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $select_think_child->content_border_color }}; background-color: {{ $select_think_child->content_bg_color }}; color: {{ $select_think_child->content_text_color }}; font-size: {{ $select_think_child->content_font_size }}%" value="{{ optional($select_think_child)->name }}">
            <div href="{{ route('main.select-content') }}" class="show-content h-auto text-center outline-none rounded border-solid border-4 border-gray-900 bg-white absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $select_think_child->content_border_color }}; background-color: {{ $select_think_child->content_bg_color }}; color: {{ $select_think_child->content_text_color }}; font-size: {{ $select_think_child->content_font_size }}%">{{ optional($select_think_child)->name }}</div>
            @if (!($select_think_child->ThinkMemo === null) || $select_think_child->have_navi)
            <button type="button" data-dropdown-toggle="{{ $select_think_child->id }}thinkDropdown" data-dropdown-placement="right" class="h-4 w-4 border-solid border-4 border-black bg-white rounded-lg absolute top-0 right-0 z-10" style="transform: translate(30%, -30%);"></button>

            <div id="{{ $select_think_child->id }}thinkDropdown" class="hidden z-50 w-auto bg-gray-800 divide-y divide-gray-100 shadow">
                <ul class="text-sm text-gray-700 flex">
                    @if (!($select_think_child->ThinkMemo === null))
                    <li class="flex items-center justify-between">
                        <button data-modal-toggle="{{ $select_think_child->id }}modalMemo" type="button" class="btn-open-modal flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                    @endif
                    @if ($select_think_child->have_navi)
                    <li class="flex items-center justify-between">
                        <button data-modal-toggle="{{ $select_think_child->id }}naviModal" type="button" class="btn-open-modal flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
                            <svg width="28" viewBox="0 0 43 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.45703 4.36523V16H0.927734V1.20703H3.32031L3.45703 4.36523ZM2.85547 8.04297L1.80273 8.00195C1.81185 6.99023 1.96224 6.05599 2.25391 5.19922C2.54557 4.33333 2.95573 3.58138 3.48438 2.94336C4.01302 2.30534 4.64193 1.81315 5.37109 1.4668C6.10938 1.11133 6.92513 0.933594 7.81836 0.933594C8.54753 0.933594 9.20378 1.03385 9.78711 1.23438C10.3704 1.42578 10.8672 1.73568 11.2773 2.16406C11.6966 2.59245 12.0156 3.14844 12.2344 3.83203C12.4531 4.50651 12.5625 5.33138 12.5625 6.30664V16H10.0195V6.2793C10.0195 5.50456 9.9056 4.88477 9.67773 4.41992C9.44987 3.94596 9.11719 3.60417 8.67969 3.39453C8.24219 3.17578 7.70443 3.06641 7.06641 3.06641C6.4375 3.06641 5.86328 3.19857 5.34375 3.46289C4.83333 3.72721 4.39128 4.0918 4.01758 4.55664C3.65299 5.02148 3.36589 5.55469 3.15625 6.15625C2.95573 6.7487 2.85547 7.3776 2.85547 8.04297ZM25.127 13.4707V5.85547C25.127 5.27214 25.0085 4.76628 24.7715 4.33789C24.5436 3.90039 24.1973 3.56315 23.7324 3.32617C23.2676 3.08919 22.6934 2.9707 22.0098 2.9707C21.3717 2.9707 20.8112 3.08008 20.3281 3.29883C19.8542 3.51758 19.4805 3.80469 19.207 4.16016C18.9427 4.51562 18.8105 4.89844 18.8105 5.30859H16.2812C16.2812 4.77995 16.418 4.25586 16.6914 3.73633C16.9648 3.2168 17.3568 2.7474 17.8672 2.32812C18.3867 1.89974 19.0065 1.5625 19.7266 1.31641C20.4557 1.0612 21.2669 0.933594 22.1602 0.933594C23.2357 0.933594 24.1836 1.11589 25.0039 1.48047C25.8333 1.84505 26.4805 2.39648 26.9453 3.13477C27.4193 3.86393 27.6562 4.77995 27.6562 5.88281V12.7734C27.6562 13.2656 27.6973 13.7897 27.7793 14.3457C27.8704 14.9017 28.0026 15.3802 28.1758 15.7812V16H25.5371C25.4095 15.7083 25.3092 15.321 25.2363 14.8379C25.1634 14.3457 25.127 13.89 25.127 13.4707ZM25.5645 7.03125L25.5918 8.80859H23.0352C22.3151 8.80859 21.6725 8.86784 21.1074 8.98633C20.5423 9.0957 20.0684 9.26432 19.6855 9.49219C19.3027 9.72005 19.0111 10.0072 18.8105 10.3535C18.61 10.6908 18.5098 11.0872 18.5098 11.543C18.5098 12.0078 18.6146 12.4316 18.8242 12.8145C19.0339 13.1973 19.3483 13.5026 19.7676 13.7305C20.196 13.9492 20.7201 14.0586 21.3398 14.0586C22.1146 14.0586 22.7982 13.8945 23.3906 13.5664C23.9831 13.2383 24.4525 12.8372 24.7988 12.3633C25.1543 11.8893 25.3457 11.429 25.373 10.9824L26.4531 12.1992C26.3893 12.582 26.2161 13.0059 25.9336 13.4707C25.651 13.9355 25.2728 14.3822 24.7988 14.8105C24.334 15.2298 23.778 15.5807 23.1309 15.8633C22.4928 16.1367 21.7728 16.2734 20.9707 16.2734C19.9681 16.2734 19.0885 16.0775 18.332 15.6855C17.5846 15.2936 17.0013 14.7695 16.582 14.1133C16.1719 13.4479 15.9668 12.7051 15.9668 11.8848C15.9668 11.0918 16.1217 10.3945 16.4316 9.79297C16.7415 9.18229 17.1882 8.67643 17.7715 8.27539C18.3548 7.86523 19.0566 7.55534 19.877 7.3457C20.6973 7.13607 21.6133 7.03125 22.625 7.03125H25.5645ZM35.9141 13.7168L39.9609 1.20703H42.5449L37.2266 16H35.5312L35.9141 13.7168ZM32.5371 1.20703L36.707 13.7852L36.9941 16H35.2988L29.9395 1.20703H32.5371Z" fill="white" />
                            </svg>
                        </button>
                    </li>
                    @endif
                </ul>
            </div>
            @endif
        </div>
    </form>
    @if(!($select_think_child->children->isEmpty()))
    <div class="to-chilren-border w-10 border-black border-t-4"></div>
    @endif
    <form method="post" class="add-content-area flex items-center m-0 relative" action="{{ route('main.add-children') }}">
        @csrf
        <input class="edit-id" type="hidden" name="edit_id" value="{{ optional($select_think_child)->id }}">
        <input class="current-map-position-x" type="hidden" name="current_map_position_x">
        <input class="current-map-position-y" type="hidden" name="current_map_position_y">
        <input class="current-map-scale" type="hidden" name="current_map_scale">
    </form>
    @if($select_think_child->children)
    <div class="flex flex-col next-child-area">
        @include('components.main_show_content')
    </div>
    @else
    @break
    @endif
</div>
<form method="post" class="add-content-area flex items-center m-0 relative" action="{{ route('main.add-children') }}">
    @csrf
    <input class="edit-id" type="hidden" name="edit_id" value="{{ optional($select_think_child)->parent_id }}">
    <input class="current-map-position-x" type="hidden" name="current_map_position_x">
    <input class="current-map-position-y" type="hidden" name="current_map_position_y">
    <input class="current-map-scale" type="hidden" name="current_map_scale">
</form>
@endif
@endforeach
@endif
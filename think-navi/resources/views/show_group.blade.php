<?php

use App\Models\Models\ThinksInGroup;
?>
@extends('layouts.main_group_app')
@section('title')
メインページ
@endsection

@section('content')
<div class="flex justify-center">
    @if ($errors->any())
    <div class="error-message bg-gray-500 text-white p-2 z-50 rounded absolute top-1/2 left-1/2" style="transform: translate(-50%, -50%);">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="map container flex h-screen w-screen overflow-hidden">
        <div class="relative w-full">
            @include('components.header.group_header')
        </div>
        @if ($select_think_file)
        <div id="map-area" class="content-area flex items-center absolute top-0 left-0" style="@if($select_think_file->map_position_x) transform: translateX({{ $select_think_file->map_position_x }}) translateY({{ $select_think_file->map_position_y }}) scale({{ $select_think_file->map_scale }}); @endif }}">
            @foreach ($select_thinks as $select_think)
            <form id="parent" method="post" class="flex group items-center m-0" action="{{ route('main.update-content') }}">
                @csrf
                <input class="edit-id" type="hidden" name="edit_id" value="{{ optional($select_think)->id }}">
                <input class="current-map-position-x" type="hidden" name="current_map_position_x">
                <input class="current-map-position-y" type="hidden" name="current_map_position_y">
                <input class="current-map-scale" type="hidden" name="current_map_scale">
                <div class="relative inline-block my-2">
                    <div class="invisible inline-block px-4 py-3" style="font-size: {{ $select_think->content_font_size }}%"></div>
                    <input name="edit_content" type="text" class="hidden edit-content h-auto parent text-center outline-none rounded border-dashed border-4 absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $select_think->content_border_color }}; background-color: {{ $select_think->content_bg_color }}; color: {{ $select_think->content_text_color }}; font-size: {{ $select_think->content_font_size }}%" value="{{ optional($select_think)->name }}">
                    <div href="{{ route('main.select-content') }}" class="show-content parent selected-content h-auto text-center outline-none rounded border-dashed border-4 bg-white absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $select_think->content_border_color }}; background-color: {{ $select_think->content_bg_color }}; color: {{ $select_think->content_text_color }}; font-size: {{ $select_think->content_font_size }}%">{{ optional($select_think)->name }}</div>
                    @if (!($select_think->ThinkMemo === null) || $select_think->have_navi)
                    <button type="button" data-dropdown-toggle="{{ $select_think->id }}thinkDropdown" data-dropdown-placement="right" class="h-4 w-4 border-solid border-4 border-black bg-white rounded-lg absolute top-0 right-0 z-10" style="transform: translate(30%, -30%);"></button>

                    <div id="{{ $select_think->id }}thinkDropdown" class="hidden z-50 w-auto bg-gray-800 divide-y divide-gray-100 shadow">
                        <ul class="text-sm text-gray-700 flex">
                            @if (!($select_think->ThinkMemo === null))
                            <li class="flex items-center justify-between">
                                <button data-modal-toggle="{{ $select_think->id }}modalMemo" type="button" class="btn-open-modal flex items-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
                                    <img class="mx-auto" src="/images/main_header_icons/memo.png" style="width: 16px;" alt="memo">
                                </button>
                            </li>
                            @endif
                            @if ($select_think->have_navi)
                            <li class="flex items-center justify-between">
                                <button data-modal-toggle="{{ $select_think->id }}naviModal" type="button" class="btn-open-modal flex items-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
                                    <img class="mx-auto" src="/images/main_header_icons/nav.png" style="width: 24px;" alt="nav">
                                </button>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @endif
                </div>
            </form>


            @if(!($select_think->children->isEmpty()))
            <div class="to-children-border w-10">
                <div class="border-t-4 border-black"></div>
            </div>
            @endif
            <form method="post" class="add-content-area  flex items-center my-5" action="{{ route('main.add-children') }}">
                @csrf
                <input class="edit-id" type="hidden" name="edit_id" value="{{ optional($select_think)->id }}">
                <input class="current-map-position-x" type="hidden" name="current_map_position_x">
                <input class="current-map-position-y" type="hidden" name="current_map_position_y">
                <input class="current-map-scale" type="hidden" name="current_map_scale">
            </form>
            <div class="next-child-area flex items-start flex-col">
                @if($select_think->children)
                <?php
                $confirmUsedNav = $select_think->children->whereNotNull('category_group')->isEmpty();
                $quantityContents = $select_think->children->whereNotNull('name')->whereNull('category_group')->count();
                $quantityCategoryGroups = $select_think->children->whereNotNull('name')->whereNotNull('category_group')->groupBy('category_group')->count('category_group')
                ?>
                @if(!($confirmUsedNav))
                <?php $categoryGroups = $select_think->children()->whereNotNull(['name', 'category_group'])->groupBy('category_group')->get(['category_group']) ?>
                @foreach($categoryGroups as $index => $categoryGroup)
                <?php $confirmCategroyGroupUsed = $select_think->children->where('category_group', $categoryGroup->category_group)->whereNotNull('name')->isEmpty() ?>
                @if(!($confirmCategroyGroupUsed))
                <div class="nav-group-area flex items-center relative">
                    @if($quantityCategoryGroups + $quantityContents === 1)
                    <div class="w-10 border-t-4 border-black"></div>
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
                        <div class="show-group-category flex justify-center text-white mb-1 p-1 rounded-xl @if($categoryGroup->category_group === '6つの視点から考える') bg-blue-700 @elseif($categoryGroup->category_group === '8つに派生させる') bg-purple-700 @elseif($categoryGroup->category_group === '良い点、悪い点から考える') bg-green-700 @elseif($categoryGroup->category_group === '類似から考える') bg-orange-700 @elseif($categoryGroup->category_group === '原因、背景から考える') bg-pink-700 @elseif($categoryGroup->category_group === '5W1Hから考える') bg-yellow-700 @endif">{{ $categoryGroup->category_group }}</div>
                        <div class="flex flex-col group-area rounded border-solid border-4 @if($categoryGroup->category_group === '6つの視点から考える') border-blue-700 @elseif($categoryGroup->category_group === '8つに派生させる') border-purple-700 @elseif($categoryGroup->category_group === '良い点、悪い点から考える') border-green-700 @elseif($categoryGroup->category_group === '類似から考える') border-orange-700 @elseif($categoryGroup->category_group === '原因、背景から考える') border-pink-700 @elseif($categoryGroup->category_group === '5W1Hから考える') border-yellow-700 @endif">
                            @foreach($select_think->children as $select_think_child)
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
                                    <div style="transform: translateY(-100%);" class="show_category absolute top-0 left-0 whitespace-no-wrap outline-none z-20 text-xs font-bold p-1 border-2 rounded-xl @if($categoryGroup->category_group === '6つの視点から考える') border-blue-700 text-blue-700 @elseif($categoryGroup->category_group === '8つに派生させる') border-purple-700 text-purple-700 @elseif($categoryGroup->category_group === '良い点、悪い点から考える') border-green-700 text-green-700 @elseif($categoryGroup->category_group === '類似から考える') border-orange-700 text-orange-700 @elseif($categoryGroup->category_group === '原因、背景から考える') border-pink-700 text-pink-700 @elseif($categoryGroup->category_group === '5W1Hから考える') border-yellow-700 text-yellow-700 @endif">{{ $select_think_child->category }}</div>
                                    @endif
                                    <div class="relative inline-block">
                                        <!-- <input type="text" name="edit_category" class="edit_category absolute text-center outline-none rounded h-10 z-20" value="{{ $select_think_child->category }}"> -->
                                        <div class="invisible inline-block px-4 py-3" style="font-size: {{ $select_think_child->content_font_size }}%"></div>
                                        <input name="edit_content" type="text" class="hidden edit-content h-auto text-center outline-none rounded border-dashed border-4 absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $select_think_child->content_border_color }}; background-color: {{ $select_think_child->content_bg_color }}; color: {{ $select_think_child->content_text_color }}; font-size: {{ $select_think_child->content_font_size }}%" value="{{ optional($select_think_child)->name }}">
                                        <div href="{{ route('main.select-content') }}" class="show-content for-nav h-auto text-center outline-none rounded border-solid border-4 absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $select_think_child->content_border_color }}; background-color: {{ $select_think_child->content_bg_color }}; color: {{ $select_think_child->content_text_color }}; font-size: {{ $select_think_child->content_font_size }}%">{{ optional($select_think_child)->name }}</div>
                                        @if (!($select_think_child->ThinkMemo === null) || $select_think_child->have_navi)
                                        <button type="button" data-dropdown-toggle="{{ $select_think_child->id }}thinkDropdown" data-dropdown-placement="right" class="h-4 w-4 border-solid border-4 border-black bg-white rounded-lg absolute top-0 right-0 z-10" style="transform: translate(30%, -30%);"></button>

                                        <div id="{{ $select_think_child->id }}thinkDropdown" class="hidden z-50 w-auto bg-gray-800 divide-y divide-gray-100 shadow">
                                            <ul class="text-sm text-gray-700 flex">
                                                @if (!($select_think_child->ThinkMemo === null))
                                                <li class="flex items-center justify-between">
                                                    <button data-modal-toggle="{{ $select_think_child->id }}modalMemo" type="button" class="btn-open-modal flex items-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
                                                        <img class="mx-auto" src="/images/main_header_icons/memo.png" style="width: 16px;" alt="memo">
                                                    </button>
                                                </li>
                                                @endif
                                                @if ($select_think_child->have_navi)
                                                <li class="flex items-center justify-between">
                                                    <button data-modal-toggle="{{ $select_think_child->id }}naviModal" type="button" class="btn-open-modal flex items-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
                                                        <img class="mx-auto" src="/images/main_header_icons/nav.png" style="width: 24px;" alt="nav">
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
                <?php
                $confirmUsedNomal = $select_think->children->whereNull('category_group')->count();
                $select_think_children_normal = $select_think->children()->whereNotNull('name')->whereNull('category')->get();
                ?>
                @if($confirmUsedNomal > 0)
                @foreach($select_think_children_normal as $index => $select_think_child)
                <div class="content-area flex items-center relative {{ $select_think_child->children->isEmpty() ? 'mr-5' : '' }}">
                    @if($quantityContents + $quantityCategoryGroups === 1)
                    <div class="w-10 border-t-4 border-black"></div>
                    @elseif($index + $quantityCategoryGroups === 0)
                    <div class="absolute bottom-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
                    <div class="w-10 border-t-4 border-black"></div>
                    @elseif($index + 1 + $quantityCategoryGroups === $quantityContents + $quantityCategoryGroups)
                    <div class="absolute top-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
                    <div class="w-10 border-t-4 border-black"></div>
                    @else
                    <div class="absolute top-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
                    <div class="absolute bottom-0 left-0 w-10 h-1/2 border-black border-l-4"></div>
                    <div class="w-10 border-t-4 border-black"></div>
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
                            <input name="edit_content" type="text" class="hidden edit-content h-auto text-center outline-none rounded border-dashed border-4 absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $select_think_child->content_border_color }}; background-color: {{ $select_think_child->content_bg_color }}; color: {{ $select_think_child->content_text_color }}; font-size: {{ $select_think_child->content_font_size }}%" value="{{ optional($select_think_child)->name }}">
                            <div href="{{ route('main.select-content') }}" class="show-content h-auto text-center outline-none rounded border-solid border-4 absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $select_think_child->content_border_color }}; background-color: {{ $select_think_child->content_bg_color }}; color: {{ $select_think_child->content_text_color }}; font-size: {{ $select_think_child->content_font_size }}%">{{ optional($select_think_child)->name }}</div>
                        </div>
                    </form>
                    @if(!($select_think_child->children->isEmpty()))
                    <div class="to-children-border w-10 border-black border-t-4"></div>
                    @endif
                    <form method="post" class="add-content-area flex items-center m-0" action="{{ route('main.add-children') }}">
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
                @endforeach
                @endif
                @endif
            </div>

            @endforeach
        </div>
        @endif
    </div>

    <div class="group-container h-screen w-screen flex justify-center items-center relative border-gray-800 border-solid border-l-2 bg-white">
        <header class="bg-gray-800 w-full absolute top-0 left-0 z-50">
            <div class="container flex items-center relative">
                <!-- add groupボタン -->
                <button id="btn-add-group" type="button" class="flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;" href="">
                    <svg width="20" height="20" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="17" height="17" rx="4.5" stroke="#FFFEFE" />
                        <path d="M9 3L9 15" stroke="#FFFEFE" />
                        <path d="M15 9L3 9" stroke="#FFFEFE" />
                    </svg>
                </button>
                <!-- deleteボタン -->
                <form method="post" action="{{ route('main.group.delete-content-in-group', ['thinkFile_id' => $select_think_file->id]) }}">
                    @csrf
                    <input class="delete-content-input-in-group" type="hidden" name="content_id[]">
                    <input class="delete-group-input-in-group" type="hidden" name="group_id[]">
                    <button type="submit" class="flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
                        <svg width="16" viewBox="0 0 28 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="5.5" y="0.5" width="16" height="8" rx="1.5" stroke="#FFFEFE" />
                            <mask id="path-2-inside-1_127_1087" fill="white">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.17969 9H1L4.58594 33H6.17969H21.3203H22.9141L26.5 9H21.3203H6.17969Z" />
                            </mask>
                            <path d="M1 9V8H-0.160515L0.0109788 9.14777L1 9ZM4.58594 33L3.59692 33.1478L3.72425 34H4.58594V33ZM22.9141 33V34H23.7757L23.9031 33.1478L22.9141 33ZM26.5 9L27.489 9.14777L27.6605 8H26.5V9ZM1 10H6.17969V8H1V10ZM5.57496 32.8522L1.98902 8.85223L0.0109788 9.14777L3.59692 33.1478L5.57496 32.8522ZM6.17969 32H4.58594V34H6.17969V32ZM6.17969 34H21.3203V32H6.17969V34ZM21.3203 34H22.9141V32H21.3203V34ZM23.9031 33.1478L27.489 9.14777L25.511 8.85223L21.925 32.8522L23.9031 33.1478ZM26.5 8H21.3203V10H26.5V8ZM21.3203 8H6.17969V10H21.3203V8Z" fill="#FFFEFE" mask="url(#path-2-inside-1_127_1087)" />
                            <rect y="5" width="28" height="4" rx="2" fill="#FFFEFE" />
                            <line x1="13.5" y1="13" x2="13.5" y2="26" stroke="#FFFEFE" />
                            <line x1="5.4872" y1="12.8876" x2="8.4872" y2="25.8876" stroke="#FFFEFE" />
                            <line y1="-0.5" x2="13.3417" y2="-0.5" transform="matrix(-0.22486 0.974391 0.974391 0.22486 22 13)" stroke="#FFFEFE" />
                        </svg>
                    </button>
                </form>

                <!-- text sizeボタン -->
                <button id="dropdownTextSizeAdjustButtonInGroup" data-dropdown-toggle="dropdownTextSizeAdjustInGroup" type="button" class="flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;" href="">
                    <svg width="20" viewBox="0 0 31 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.4453 9.67383L10.9727 33H7.50977L17.2656 7.40625H19.498L19.4453 9.67383ZM26.5469 33L18.0566 9.67383L18.0039 7.40625H20.2363L30.0273 33H26.5469ZM26.1074 23.5254V26.3027H11.7285V23.5254H26.1074Z" fill="white" />
                        <path d="M6.5 26L0.870834 16.25H12.1292L6.5 26Z" fill="#FFFEFE" />
                        <path d="M6.5 0L12.1292 9.75H0.870835L6.5 0Z" fill="#FFFEFE" />
                    </svg>
                </button>
                <div id="dropdownTextSizeAdjustInGroup" class="hidden z-10 w-auto bg-gray-800 divide-y divide-gray-100 shadow">
                    <form action="{{ route('main.group.change-text-size-in-group', ['thinkFile_id' => $select_think_file->id]) }}" method="post">
                        @csrf
                        <ul class="text-sm text-gray-700" aria-labelledby="dropdownHome">
                            <input class="text-size-input-in-group" type="hidden" name="content_id[]">
                            <input class="text-size-group-input-in-group" type="hidden" name="group_id[]">
                            <input id="text-size-in-group" type="hidden" name="text_size" class="w-1/2 mr-2 bg-gray-800">
                            <li class="flex items-center justify-between">
                                <button id="text-size-up-in-group" type="button" class="flex items-center justify-center w-10 h-10 mx-auto text-white bg-gray-800 hover:bg-gray-600 focus:outline-none">
                                    <svg width="20" height="42" viewBox="0 0 31 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.4453 9.67383L10.9727 33H7.50977L17.2656 7.40625H19.498L19.4453 9.67383ZM26.5469 33L18.0566 9.67383L18.0039 7.40625H20.2363L30.0273 33H26.5469ZM26.1074 23.5254V26.3027H11.7285V23.5254H26.1074Z" fill="white" />
                                        <path d="M6.5 0L12.1292 9.75H0.870835L6.5 0Z" fill="#FFFEFE" />
                                    </svg>
                                </button>
                                <button id="text-size-down-in-group" type="button" class="flex items-center justify-center w-10 h-10 mx-auto text-white bg-gray-800 hover:bg-gray-600 focus:outline-none">
                                    <svg width="20" viewBox="0 0 31 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.4453 11.6738L10.9727 35H7.50977L17.2656 9.40625H19.498L19.4453 11.6738ZM26.5469 35L18.0566 11.6738L18.0039 9.40625H20.2363L30.0273 35H26.5469ZM26.1074 25.5254V28.3027H11.7285V25.5254H26.1074Z" fill="white" />
                                        <path d="M6.5 13L0.870834 3.25H12.1292L6.5 13Z" fill="#FFFEFE" />
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button type="submit" class="block w-full mx-auto py-2 text-white bg-gray-800 hover:bg-gray-600">適用</button>
                            </li>
                        </ul>
                    </form>
                </div>

                <!-- change colorボタン -->
                <button id="dropdownColorButtonInGroup" data-dropdown-toggle="dropdownColorInGroup" type="button" class="flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
                    <svg width="24" viewBox="0 0 33 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="path-1-inside-1_127_714" fill="white">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.6892 9.23709L29.8073 15.3552L13.196 27.6478L12.2363 26.6881L12.2362 26.6882L2.15935 16.6113L14.452 6.53391e-05L17.571 3.11912L17.5711 3.11901L23.6892 9.23709Z" />
                        </mask>
                        <path d="M29.8073 15.3552L30.4021 16.159L31.335 15.4687L30.5144 14.6481L29.8073 15.3552ZM13.196 27.6478L12.4889 28.3549L13.0982 28.9642L13.7909 28.4516L13.196 27.6478ZM12.2363 26.6881L12.9434 25.9809L12.2363 25.2738L11.5292 25.9809L12.2363 26.6881ZM12.2362 26.6882L11.5291 27.3953L12.2362 28.1024L12.9433 27.3953L12.2362 26.6882ZM2.15935 16.6113L1.35551 16.0165L0.842934 16.7091L1.45224 17.3184L2.15935 16.6113ZM14.452 6.53391e-05L15.1591 -0.707041L14.3385 -1.52765L13.6481 -0.594786L14.452 6.53391e-05ZM17.571 3.11912L16.8639 3.82623L17.571 4.53334L18.2781 3.82623L17.571 3.11912ZM17.5711 3.11901L18.2782 2.4119L17.5711 1.7048L16.864 2.4119L17.5711 3.11901ZM30.5144 14.6481L24.3963 8.52998L22.9821 9.9442L29.1002 16.0623L30.5144 14.6481ZM13.7909 28.4516L30.4021 16.159L29.2124 14.5513L12.6012 26.844L13.7909 28.4516ZM11.5292 27.3952L12.4889 28.3549L13.9031 26.9407L12.9434 25.9809L11.5292 27.3952ZM11.5292 25.9809L11.5291 25.9811L12.9433 27.3953L12.9434 27.3952L11.5292 25.9809ZM12.9433 25.9811L2.86645 15.9042L1.45224 17.3184L11.5291 27.3953L12.9433 25.9811ZM2.96318 17.2062L15.2558 0.594917L13.6481 -0.594786L1.35551 16.0165L2.96318 17.2062ZM13.7449 0.707172L16.8639 3.82623L18.2781 2.41202L15.1591 -0.707041L13.7449 0.707172ZM16.864 2.4119L16.8639 2.41202L18.2781 3.82623L18.2782 3.82612L16.864 2.4119ZM24.3963 8.52998L18.2782 2.4119L16.864 3.82612L22.9821 9.9442L24.3963 8.52998Z" fill="#FFFEFE" mask="url(#path-1-inside-1_127_714)" />
                        <path d="M13.4135 26.8258L3.19441 16.6067L28.7421 15.3293L13.4135 26.8258Z" fill="#FFFEFE" />
                        <path d="M33.0001 23.4198C33.0001 24.8309 31.8562 25.9747 30.4452 25.9747C29.0341 25.9747 27.8903 24.8309 27.8903 23.4198C27.8903 22.0088 29.5935 17.8842 30.4452 16.181C31.2968 17.4584 33.0001 22.0088 33.0001 23.4198Z" fill="#FFFEFE" />
                    </svg>
                </button>
                <div id="dropdownColorInGroup" class="hidden z-10 w-48 bg-gray-800 divide-y divide-gray-100 shadow">
                    <form action="{{ route('main.group.change-color-in-group', ['thinkFile_id' => $select_think_file->id]) }}" method="post">
                        @csrf
                        <ul class="text-sm text-gray-700" aria-labelledby="dropdownHome">
                            <input class="change-color-input-in-group" type="hidden" name="content_id[]">
                            <input class="change-color-group-input-in-group" type="hidden" name="group_id[]">
                            <li class="flex items-center justify-between">
                                <div class="block mx-2 py-2 text-white bg-gray-800">枠線の色</div>
                                <input id="border-color-in-group" type="color" name="border_color" class="w-1/2 mr-2 bg-gray-800">
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="block mx-2 py-2 text-white bg-gray-800">背景の色</div>
                                <input id="bg-color-in-group" type="color" name="bg_color" class="w-1/2 mr-2 bg-gray-800">
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="block mx-2 py-2 text-white bg-gray-800">文字の色</div>
                                <input id="text-color-in-group" type="color" name="text_color" class="w-1/2 mr-2 bg-gray-800">
                            </li>
                            <li>
                                <button type="submit" class="block w-full mx-auto py-2 text-white bg-gray-800 hover:bg-gray-600 focus:outline-none">適用</button>
                            </li>
                        </ul>
                    </form>
                </div>


                <a href="{{ route('main', ['ThinkFile_id' => $select_think_file->id]) }}" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>


        </header>
        <div class="group-page h-screen w-full overflow-y-auto">
            <div class="groups-area mt-10 flex flex-wrap w-full">
                @if(!($think_groups === null))
                @foreach($think_groups as $think_group)
                <div class="group-area ml-4 mt-4">
                    <div class="flex items-center mb-2">
                        <form method="post" action="{{ route('main.group.update-group-category-in-group', ['thinkFile_id' => $select_think_file->id]) }}">
                            @csrf
                            <input class="think-group-id" type="hidden" name="thinkGroup_id" value="{{ $think_group->id }}">
                            <input type="text" name="edit_group_title" class="hidden edit_group_name h-auto outline-none rounded-xl border-2 p-1" style="border-color: {{ $think_group->content_border_color }}; background-color: {{ $think_group->content_bg_color }}; color: {{ $think_group->content_text_color }}; font-size: {{ $think_group->content_font_size }}%;" value="{{ $think_group->category }}">
                            <div class="show_group rounded-xl border-2 p-1" style="border-color: {{ $think_group->content_border_color }}; background-color: {{ $think_group->content_bg_color }}; color: {{ $think_group->content_text_color }}; font-size: {{ $think_group->content_font_size }}%;">{{$think_group->category}}</div>
                        </form>
                        <form method="post" action="{{ route('main.group.add-content-in-group-from-thinks', ['thinkFile_id' => $select_think_file->id]) }}">
                            @csrf
                            <input class="group-input" type="hidden" name="content_ids[]">
                            <input type="hidden" name="thinkGroup_id" value="{{ $think_group->id }}">
                            <button type="button" onclick="submit();" class="ml-2 text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                マップから選択した要素を反映
                            </button>
                        </form>
                    </div>
                    <div class="group-border border-4 border-solid rounded" style="border-color: {{ $think_group->content_border_color }}; background-color: {{ $think_group->content_bg_color }}">
                        <div class="m-4 flex flex-wrap w-72">
                            <?php $ThinksInGroup = ThinksInGroup::Where('ThinkGroups_id', $think_group->id)->get() ?>
                            @foreach($ThinksInGroup as $ThinkInGroup)
                            <form class="content-area-in-group" method="post" action="{{ route('main.group.update-content-in-group', ['thinkFile_id' => $select_think_file->id]) }}">
                                @csrf
                                <input class="content-id" type="hidden" name="content_id" value="{{ $ThinkInGroup->id }}">
                                <div class="relative inline-block my-5 ml-4">
                                    <div class="invisible inline-block px-4 py-3" style="font-size: {{ $ThinkInGroup->content_font_size }}%"></div>
                                    <input name="edit_content" type="text" class="hidden edit-content h-auto text-center outline-none rounded border-dashed border-4 absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $ThinkInGroup->content_border_color }}; background-color: {{ $ThinkInGroup->content_bg_color }}; color: {{ $ThinkInGroup->content_text_color }}; font-size: {{ $ThinkInGroup->content_font_size }}%" value="{{ optional($ThinkInGroup)->name }}">
                                    <div class="show_content_in_group h-auto text-center outline-none rounded border-solid border-4 absolute top-0 left-0 w-full px-3 py-2 z-10" style="border-color: {{ $ThinkInGroup->content_border_color }}; background-color: {{ $ThinkInGroup->content_bg_color }}; color: {{ $ThinkInGroup->content_text_color }}; font-size: {{ $ThinkInGroup->content_font_size }}%">{{ optional($ThinkInGroup)->name }}</div>
                                </div>
                            </form>
                            @endforeach
                            <form class="new-group-content" method="post" class="flex items-start m-0" action="{{ route('main.group.add-content-in-group', ['thinkFile_id' => $select_think_file->id]) }}">
                                @csrf
                                <input type="hidden" name="ThinkFiles_id" value="{{ $select_think_file->id }}">
                                <input type="hidden" name="thinkGroup_id" value="{{ $think_group->id }}">
                            </form>
                            <button type="button" class="add-group-content-in-group focus:outline-none">
                                <svg class="ml-2" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="18" cy="18" r="17" stroke="black" stroke-width="2" />
                                    <path d="M26 18H10" stroke="black" stroke-width="2" />
                                    <path d="M18 10V26" stroke="black" stroke-width="2" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <form class="new-group" method="post" class="flex items-start m-0" action="{{ route('main.group.create-new-group', ['thinkFile_id' => $select_think_file->id]) }}">
                    @csrf
                    <input type="hidden" name="ThinkFiles_id" value="{{ $select_think_file->id }}">
                </form>
            </div>
        </div>
    </div>
    @include('./components/modals/main_modal')
</div>
@include('components.footer.group_footer')
@endsection
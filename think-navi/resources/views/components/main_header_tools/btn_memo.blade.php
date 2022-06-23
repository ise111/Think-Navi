<button data-modal-toggle="modalMemo" type="button" class="btn-open-modal flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
    <svg width="16" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="0.5" y="0.5" width="23" height="27" stroke="#FFFEFE" />
        <line x1="3" y1="7.5" x2="21" y2="7.5" stroke="#FFFEFE" />
        <line x1="3" y1="13.5" x2="21" y2="13.5" stroke="#FFFEFE" />
        <line x1="3" y1="19.5" x2="12" y2="19.5" stroke="#FFFEFE" />
    </svg>
</button>
<div id="modalMemo" tabindex="-1" aria-hidden="true" class="hidden modal overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex relative justify-between items-start p-3 rounded-t bg-gray-800">
                <div class="drag-start w-full h-full absolute top-0 left-0 cursor-move"></div>
                <h3 class="my-auto text-xl font-semibold text-white lg:text-xl">
                    メモ
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center z-10" data-modal-toggle="modalMemo">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="memo-form w-full space-y-6 px-4" method="POST" action="{{ route('main.add-memo') }}">
                @csrf
                <input class="memo-input" type="hidden" name="Thinks_id">
                <input class="current-map-position-x" type="hidden" name="current_map_position_x">
                <input class="current-map-position-y" type="hidden" name="current_map_position_y">
                <input class="current-map-scale" type="hidden" name="current_map_scale">
                <div class="p-3">
                    <textarea id="memo" type="string" class="form-input w-full" name="memo" required></textarea>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-3 space-x-2 rounded-b border-t border-gray-200">
                    <button data-modal-toggle="modalMemo" type="button" onclick="submit();" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">保存する</button>
                    <button data-modal-toggle="modalMemo" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:outline-none rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">キャンセル</button>
                </div>
            </form>
        </div>
    </div>
</div>
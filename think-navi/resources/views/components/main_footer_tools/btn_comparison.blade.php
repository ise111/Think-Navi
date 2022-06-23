<button id="btn-comparison" data-modal-toggle="comparisonModal" type="button" class="flex items-center px-3 text-white font-bold bg-gray-800 h-10 hover:bg-gray-600 focus:outline-none">
    類似のnavを比較して生み出す
</button>
<!-- comparison modal -->
<div id="comparisonModal" tabindex="-1" aria-hidden="true" class="hidden modal overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full h-modal">
    <div class="relative p-4 max-w-full max-h-10/12">
        <form method="POST" action="{{ route('main.update-and-create-nav-by-comparison') }}">
            @csrf
            <div class="modal-contents-area flex">
                <input class="comparison-input" type="hidden" name="new_think_parent_id">

            </div>
            <!-- Modal footer -->
            <div class="flex justify-end p-3 space-x-2 rounded-b border-2 border-gray-700 border-t-0 bg-gray-800">
                <button data-modal-toggle="comparisonModal" type="submit" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">更新する</button>
                <button id="btn-comparison-modal-close" data-modal-toggle="comparisonModal" type="button" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none rounded-lg text-sm font-medium px-5 py-2.5">キャンセル</button>
            </div>

        </form>
    </div>
</div>
<footer class="bg-gray-800 w-full absolute left-0 bottom-0 z-50">
    <div class="container flex items-center">

        @include('components.main_footer_tools.btn_target')
        @include('components.main_footer_tools.btn_goal')

        <a href="{{ route('main.show-group', ['thinkFile_id' => $select_think_file->id]) }}" type="button" class="flex items-center px-3 text-white font-bold bg-gray-800 h-10 hover:bg-gray-600 focus:outline-none">
            グループ分け
        </a>

        @include('components.main_footer_tools.btn_comparison')

    </div>
</footer>
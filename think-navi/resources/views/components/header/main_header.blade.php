<header class="bg-gray-800 w-full absolute top-0 left-0 z-50 flex justify-between">
    <div class="container flex items-center relative">

        @include('components.main_header_tools.btn_home')
        @include('components.main_header_tools.btn_add_child')
        @include('components.main_header_tools.btn_add_bro')
        @include('components.main_header_tools.btn_delete_content')
        @include('components.main_header_tools.btn_text_size')
        @include('components.main_header_tools.btn_color')
        @include('components.main_header_tools.btn_zoom')
        @include('components.main_header_tools.btn_memo')
        @include('components.main_header_tools.btn_expand_store')
        @include('components.main_header_tools.btn_nav')
    </div>

    <a href="{{ route('logout') }}" class="flex items-center px-2 no-underline text-white h-10 bg-gray-800 hover:bg-gray-600" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        {{ csrf_field() }}
    </form>
    <a class="flex items-center justify-center mr-2" href="{{ route('profile.show-profile') }}">
        @if(!empty($user->avatar_file_name))
        <img src="storage/avatars/{{ $user->avatar_file_name }}" class="rounded-full" style="object-fit: cover; width: 35px; height: 35px;">
        @else
        <img src="/images/default_avatar.png" class="border border-black rounded-full" style="object-fit: cover; width: 35px; height: 35px;">
        @endif
    </a>
</header>
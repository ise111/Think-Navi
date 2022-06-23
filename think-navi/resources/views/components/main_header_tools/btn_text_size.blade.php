<button id="dropdownTextSizeAdjustButton" data-dropdown-toggle="dropdownTextSizeAdjust" type="button" class="btn-open-dropdown flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;" href="">
    <svg width="20" viewBox="0 0 31 42" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M19.4453 9.67383L10.9727 33H7.50977L17.2656 7.40625H19.498L19.4453 9.67383ZM26.5469 33L18.0566 9.67383L18.0039 7.40625H20.2363L30.0273 33H26.5469ZM26.1074 23.5254V26.3027H11.7285V23.5254H26.1074Z" fill="white" />
        <path d="M6.5 26L0.870834 16.25H12.1292L6.5 26Z" fill="#FFFEFE" />
        <path d="M6.5 0L12.1292 9.75H0.870835L6.5 0Z" fill="#FFFEFE" />
    </svg>
</button>
<div id="dropdownTextSizeAdjust" class="hidden z-10 w-auto bg-gray-800 divide-y divide-gray-100 shadow">
    <form action="{{ route('main.change-text-size') }}" method="post">
        @csrf
        <ul class="text-sm text-gray-700" aria-labelledby="dropdownHome">
            <input class="text-size-input" type="hidden" name="content_id[]">
            <input class="current-map-position-x" type="hidden" name="current_map_position_x">
            <input class="current-map-position-y" type="hidden" name="current_map_position_y">
            <input class="current-map-scale" type="hidden" name="current_map_scale">
            <input id="text-size" type="hidden" name="text_size" class="w-1/2 mr-2 bg-gray-800">
            <li class="flex items-center justify-between">
                <button id="text-size-up" type="button" class="flex items-center justify-center w-10 h-10 mx-auto text-white bg-gray-800 hover:bg-gray-600 focus:outline-none">
                    <svg width="20" height="42" viewBox="0 0 31 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.4453 9.67383L10.9727 33H7.50977L17.2656 7.40625H19.498L19.4453 9.67383ZM26.5469 33L18.0566 9.67383L18.0039 7.40625H20.2363L30.0273 33H26.5469ZM26.1074 23.5254V26.3027H11.7285V23.5254H26.1074Z" fill="white" />
                        <path d="M6.5 0L12.1292 9.75H0.870835L6.5 0Z" fill="#FFFEFE" />
                    </svg>
                </button>
                <button id="text-size-down" type="button" class="flex items-center justify-center w-10 h-10 mx-auto text-white bg-gray-800 hover:bg-gray-600 focus:outline-none">
                    <svg width="20" viewBox="0 0 31 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.4453 11.6738L10.9727 35H7.50977L17.2656 9.40625H19.498L19.4453 11.6738ZM26.5469 35L18.0566 11.6738L18.0039 9.40625H20.2363L30.0273 35H26.5469ZM26.1074 25.5254V28.3027H11.7285V25.5254H26.1074Z" fill="white" />
                        <path d="M6.5 13L0.870834 3.25H12.1292L6.5 13Z" fill="#FFFEFE" />
                    </svg>

                </button>
            </li>
            <li>
                <button type="submit" class="block w-full mx-auto py-2 text-white bg-gray-800 hover:bg-gray-600 focus:outline-none  ">適用</button>
            </li>
        </ul>
    </form>
</div>
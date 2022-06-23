<button id="dropdownColorButton" data-dropdown-toggle="dropdownColor" type="button" class="btn-open-dropdown flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
    <svg width="24" viewBox="0 0 33 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <mask id="path-1-inside-1_127_714" fill="white">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.6892 9.23709L29.8073 15.3552L13.196 27.6478L12.2363 26.6881L12.2362 26.6882L2.15935 16.6113L14.452 6.53391e-05L17.571 3.11912L17.5711 3.11901L23.6892 9.23709Z" />
        </mask>
        <path d="M29.8073 15.3552L30.4021 16.159L31.335 15.4687L30.5144 14.6481L29.8073 15.3552ZM13.196 27.6478L12.4889 28.3549L13.0982 28.9642L13.7909 28.4516L13.196 27.6478ZM12.2363 26.6881L12.9434 25.9809L12.2363 25.2738L11.5292 25.9809L12.2363 26.6881ZM12.2362 26.6882L11.5291 27.3953L12.2362 28.1024L12.9433 27.3953L12.2362 26.6882ZM2.15935 16.6113L1.35551 16.0165L0.842934 16.7091L1.45224 17.3184L2.15935 16.6113ZM14.452 6.53391e-05L15.1591 -0.707041L14.3385 -1.52765L13.6481 -0.594786L14.452 6.53391e-05ZM17.571 3.11912L16.8639 3.82623L17.571 4.53334L18.2781 3.82623L17.571 3.11912ZM17.5711 3.11901L18.2782 2.4119L17.5711 1.7048L16.864 2.4119L17.5711 3.11901ZM30.5144 14.6481L24.3963 8.52998L22.9821 9.9442L29.1002 16.0623L30.5144 14.6481ZM13.7909 28.4516L30.4021 16.159L29.2124 14.5513L12.6012 26.844L13.7909 28.4516ZM11.5292 27.3952L12.4889 28.3549L13.9031 26.9407L12.9434 25.9809L11.5292 27.3952ZM11.5292 25.9809L11.5291 25.9811L12.9433 27.3953L12.9434 27.3952L11.5292 25.9809ZM12.9433 25.9811L2.86645 15.9042L1.45224 17.3184L11.5291 27.3953L12.9433 25.9811ZM2.96318 17.2062L15.2558 0.594917L13.6481 -0.594786L1.35551 16.0165L2.96318 17.2062ZM13.7449 0.707172L16.8639 3.82623L18.2781 2.41202L15.1591 -0.707041L13.7449 0.707172ZM16.864 2.4119L16.8639 2.41202L18.2781 3.82623L18.2782 3.82612L16.864 2.4119ZM24.3963 8.52998L18.2782 2.4119L16.864 3.82612L22.9821 9.9442L24.3963 8.52998Z" fill="#FFFEFE" mask="url(#path-1-inside-1_127_714)" />
        <path d="M13.4135 26.8258L3.19441 16.6067L28.7421 15.3293L13.4135 26.8258Z" fill="#FFFEFE" />
        <path d="M33.0001 23.4198C33.0001 24.8309 31.8562 25.9747 30.4452 25.9747C29.0341 25.9747 27.8903 24.8309 27.8903 23.4198C27.8903 22.0088 29.5935 17.8842 30.4452 16.181C31.2968 17.4584 33.0001 22.0088 33.0001 23.4198Z" fill="#FFFEFE" />
    </svg>

</button>
<div id="dropdownColor" class="hidden z-10 w-48 bg-gray-800 divide-y divide-gray-100 shadow">
    <form action="{{ route('main.change-color') }}" method="post">
        @csrf
        <ul class="text-sm text-gray-700" aria-labelledby="dropdownHome">
            <input class="change-color-input" type="hidden" name="content_id[]">
            <input class="current-map-position-x" type="hidden" name="current_map_position_x">
            <input class="current-map-position-y" type="hidden" name="current_map_position_y">
            <input class="current-map-scale" type="hidden" name="current_map_scale">
            <li class="flex items-center justify-between">
                <div class="block mx-2 py-2 text-white bg-gray-800">枠線の色</div>
                <input id="border-color" type="color" name="border_color" class="w-1/2 mr-2 bg-gray-800">
            </li>
            <li class="flex items-center justify-between">
                <div class="block mx-2 py-2 text-white bg-gray-800">背景の色</div>
                <input id="bg-color" type="color" name="bg_color" class="w-1/2 mr-2 bg-gray-800">
            </li>
            <li class="flex items-center justify-between">
                <div class="block mx-2 py-2 text-white bg-gray-800">文字の色</div>
                <input id="text-color" type="color" name="text_color" class="w-1/2 mr-2 bg-gray-800">
            </li>
            <li>
                <button type="submit" class="block w-full mx-auto py-2 text-white bg-gray-800 hover:bg-gray-600 focus:outline-none">適用</button>
            </li>
        </ul>
    </form>
</div>
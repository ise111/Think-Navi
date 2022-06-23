<form method="post" action="{{ route('main.delete-content') }}">
    @csrf
    <input class="delete-content-input" type="hidden" name="delete_content_id[]" value="">
    <button id="btn-delete" type="submit" class="flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
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
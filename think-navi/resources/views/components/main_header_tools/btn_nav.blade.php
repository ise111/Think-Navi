<button data-modal-toggle="modalNav" type="button" class="btn-open-modal flex items-center justify-center bg-gray-800 hover:bg-gray-600 focus:outline-none" style="height: 40px; width: 40px;">
    <svg width="28" viewBox="0 0 43 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3.45703 4.36523V16H0.927734V1.20703H3.32031L3.45703 4.36523ZM2.85547 8.04297L1.80273 8.00195C1.81185 6.99023 1.96224 6.05599 2.25391 5.19922C2.54557 4.33333 2.95573 3.58138 3.48438 2.94336C4.01302 2.30534 4.64193 1.81315 5.37109 1.4668C6.10938 1.11133 6.92513 0.933594 7.81836 0.933594C8.54753 0.933594 9.20378 1.03385 9.78711 1.23438C10.3704 1.42578 10.8672 1.73568 11.2773 2.16406C11.6966 2.59245 12.0156 3.14844 12.2344 3.83203C12.4531 4.50651 12.5625 5.33138 12.5625 6.30664V16H10.0195V6.2793C10.0195 5.50456 9.9056 4.88477 9.67773 4.41992C9.44987 3.94596 9.11719 3.60417 8.67969 3.39453C8.24219 3.17578 7.70443 3.06641 7.06641 3.06641C6.4375 3.06641 5.86328 3.19857 5.34375 3.46289C4.83333 3.72721 4.39128 4.0918 4.01758 4.55664C3.65299 5.02148 3.36589 5.55469 3.15625 6.15625C2.95573 6.7487 2.85547 7.3776 2.85547 8.04297ZM25.127 13.4707V5.85547C25.127 5.27214 25.0085 4.76628 24.7715 4.33789C24.5436 3.90039 24.1973 3.56315 23.7324 3.32617C23.2676 3.08919 22.6934 2.9707 22.0098 2.9707C21.3717 2.9707 20.8112 3.08008 20.3281 3.29883C19.8542 3.51758 19.4805 3.80469 19.207 4.16016C18.9427 4.51562 18.8105 4.89844 18.8105 5.30859H16.2812C16.2812 4.77995 16.418 4.25586 16.6914 3.73633C16.9648 3.2168 17.3568 2.7474 17.8672 2.32812C18.3867 1.89974 19.0065 1.5625 19.7266 1.31641C20.4557 1.0612 21.2669 0.933594 22.1602 0.933594C23.2357 0.933594 24.1836 1.11589 25.0039 1.48047C25.8333 1.84505 26.4805 2.39648 26.9453 3.13477C27.4193 3.86393 27.6562 4.77995 27.6562 5.88281V12.7734C27.6562 13.2656 27.6973 13.7897 27.7793 14.3457C27.8704 14.9017 28.0026 15.3802 28.1758 15.7812V16H25.5371C25.4095 15.7083 25.3092 15.321 25.2363 14.8379C25.1634 14.3457 25.127 13.89 25.127 13.4707ZM25.5645 7.03125L25.5918 8.80859H23.0352C22.3151 8.80859 21.6725 8.86784 21.1074 8.98633C20.5423 9.0957 20.0684 9.26432 19.6855 9.49219C19.3027 9.72005 19.0111 10.0072 18.8105 10.3535C18.61 10.6908 18.5098 11.0872 18.5098 11.543C18.5098 12.0078 18.6146 12.4316 18.8242 12.8145C19.0339 13.1973 19.3483 13.5026 19.7676 13.7305C20.196 13.9492 20.7201 14.0586 21.3398 14.0586C22.1146 14.0586 22.7982 13.8945 23.3906 13.5664C23.9831 13.2383 24.4525 12.8372 24.7988 12.3633C25.1543 11.8893 25.3457 11.429 25.373 10.9824L26.4531 12.1992C26.3893 12.582 26.2161 13.0059 25.9336 13.4707C25.651 13.9355 25.2728 14.3822 24.7988 14.8105C24.334 15.2298 23.778 15.5807 23.1309 15.8633C22.4928 16.1367 21.7728 16.2734 20.9707 16.2734C19.9681 16.2734 19.0885 16.0775 18.332 15.6855C17.5846 15.2936 17.0013 14.7695 16.582 14.1133C16.1719 13.4479 15.9668 12.7051 15.9668 11.8848C15.9668 11.0918 16.1217 10.3945 16.4316 9.79297C16.7415 9.18229 17.1882 8.67643 17.7715 8.27539C18.3548 7.86523 19.0566 7.55534 19.877 7.3457C20.6973 7.13607 21.6133 7.03125 22.625 7.03125H25.5645ZM35.9141 13.7168L39.9609 1.20703H42.5449L37.2266 16H35.5312L35.9141 13.7168ZM32.5371 1.20703L36.707 13.7852L36.9941 16H35.2988L29.9395 1.20703H32.5371Z" fill="white" />
    </svg>
</button>

<?php
$categoryGroups = [
    '6つの視点から考える',
    '8つに派生させる',
    '希望、欠点から考える',
    '類似から考える',
    '原因、背景から考える',
    '5W1Hから考える',
];
$categoryGroupHelps = [
    '「シックスハット法」参照。下記の6つの視点から発想していく方法です。各視点の考え方をする人になりきって案を出すのがポイント。',
    '「オズボーンのチェックリスト」参照。9つの切り口からアイデアを絞り出すのに使います。',
    '「希望点/欠点列挙法」参照。こうあってほしいという希望と欠点を列挙していきそこからアイデアなどを生み出す方法です。現状や従来に囚われず理想の在り方を自由に考えるのがポイント。',
    '類似のものと比較していくことで何が違うのか、それぞれの長所や短所は何か、そのまま参考に出来ることがあるかなど色々見えてくるはずです。類似物に限らず、類似業界、同じ場所、類似の使い方など色々な類似を挙げてみるのも良いです。',
    '問題点を解決したい場合などに使ってください。なんでそうなったのかを明確にし、そこから対策方法を考えていきます。',
    'アイデア出しや出したアイデアのまとめとしても使えます。アイデア出しでは対象の現状はどうなのかを5W1Hで明確にし、そこから新しいアイデアを考えます。まとめとしては5W1Hを使用し、次に何をしていくのかを明確にしていきましょう。',
];
$categoryHelps = [
    [
        '直感的に感じたことや本能的な思考で考える。「かっこいい」などの感情的な内容。',
        '具体的な数字などのデータや根拠に基づいた情報。仮説や意見ではなく事実。',
        '論理的な矛盾、リスク、懸念点などの問題点を考える。否定的、ネガティブな意見。',
        '利点などの良いことを考える。肯定的、ポジティブな意見。',
        '新しいアイデアや代替案を考える。消極的から出た問題点の解決策を考える。実現性などに囚われず自由にクリエイティブに考えるのがポイント。',
        '他の視点から考えた内容を基に考える。次に何をすべきかや結論を出す。',
    ], [
        'そのままの形で他の使い道がないか考える。例）シャーペンの場合、スマホ、タブレットでも字を書ける',
        '他のジャンル、業界からのアイデア、利点などを当てはめて考える。例）シャーペンの場合、筆のように筆圧で字の太さが変わる',
        '色、形、音、仕組み、意味など何かを変更するとどうなるか考える。例）シャーペンの場合、棒状から球体にする',
        '大きさ、長さ、太さ、厚み、数、時間などをプラスさせたらどうなるかを考える。例）シャーペンの場合、ペン内にストック出来るシャー芯の量を大容量にする',
        '大きさ、長さ、太さ、厚み、数、時間などをマイナスさせたらどうなるかを考える。例）シャーペンの場合、シャーペンを短くする',
        '他の素材、場所など形成しているものを何かに変えたらどうなるかを考える。例）シャーペンの場合、ボディを金属にし高級感を出す',
        '順番、手順を入れ替えたらどうなるかを考える。同じ形成内容でも組み立て方を変えることで違うものが生まれる可能性を考える。例）シャーペンの場合、字を書いた後に使う。字をなぞる専用',
        '上下、裏表、左右、手順などを逆転させたらどうなるかを考える。例）シャーペンの場合、字を消すシャーペン',
        '別のものと結合させたらどうなるかを考える。例）シャーペンの場合、付箋付きシャーペン',
    ], [
        'こうだったら良い、こういうのが欲しいなど希望や欲求をとにかくあげてください。',
        'デメリットや悪い点をとにかくあげてください。',
    ], [
        '似ている商品、業界、形状などを出す。',
    ], [
        'なぜその問題が起きているかまたは当事者の考えを出す。',
        '原因として挙げられているものの根拠、裏付けを出す。出てこない場合は原因が違うかも？',
        '解決するために何をどうするべきかを考える',
        '解決するための具体的な方法、案を考える',
        '考えた対策から予測される結果',
        '考えた対策をするためのリスク。またはそもそも問題を解決するリスク',
    ], [
        '誰が使用するのか。誰のためなのかを考える。年齢、性別、職業など細かい方が良い。',
        '何を与えているかを考える。価値や意味を変えて考える',
        'どこで使われるかなどを考え、場所を変えてどうなるか考える。',
        'いつ、どの時期に使われるかなどを考え、タイミングを変えてどうなるかを考える。',
        'なぜ使われるのかそうなのか理由について考える。',
        'どう使われているかや手順がどうなのかなど方法について変えて考える。',
    ]
];

$categories = [
    [
        '主観的',
        '客観的',
        '消極的',
        '積極的',
        '革新的',
        '分析的',
    ], [
        '転用',
        '応用',
        '変更',
        '拡大',
        '縮小',
        '代用',
        '置換',
        '逆転',
        '結合',
    ], [
        '希望点',
        '欠点',
    ], [
        '類似物',
    ], [
        '原因、主張',
        '根拠',
        '課題',
        '対策',
        '結果',
        'リスク',
    ], [
        '誰が',
        '何を',
        'どこで',
        'いつ',
        'なぜ',
        'どのように',
    ]

];
?>


<div id="modalNav" tabindex="-1" aria-hidden="true" class="hidden modal overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full h-full">
    <div class="relative p-4 w-full max-w-xl max-h-10/12">
        <!-- Modal content -->
        <div class="modal-content relative bg-white rounded-lg shadow border-2 border-gray-700">
            <!-- Modal header -->
            <div class="nav-header-area flex relative justify-between items-start p-3 rounded-t bg-gray-800">
                <div class="drag-start w-full h-full absolute top-0 left-0 cursor-move"></div>
                <h3 class="nav-title my-auto text-xl font-semibold text-white">
                    Navi
                </h3>
                <button type="button" class="btn-close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center z-10" data-modal-toggle="modalNav">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="nav-form w-full" method="POST" action="{{ route('main.add-nav-content') }}">
                @csrf
                <div class="modal-body">
                    <input class="nav-input" type="hidden" name="edit_id">
                    <input class="current-map-position-x" type="hidden" name="current_map_position_x">
                    <input class="current-map-position-y" type="hidden" name="current_map_position_y">
                    <input class="current-map-scale" type="hidden" name="current_map_scale">
                    <div class="nav-content overflow-y-scroll" style="max-height: 600px;">
                        @foreach($categoryGroups as $index => $categoryGroup)
                        <button type="button" class="content-bar flex items-center w-full p-3 focus:outline-none bg-gray-700 hover:bg-gray-500">
                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 6L0.5 11.1962L0.5 0.803847L8 6Z" fill="#C4C4C4" />
                            </svg>
                            <h4 class="nav-content-title my-auto ml-2 text-base font-semibold text-white">
                                {{ $categoryGroup }}
                            </h4>
                        </button>
                        <div class="flex flex-col nav-contents-area p-3 hidden">
                            <div class="nav-work-area flex flex-col ml-2">
                                <div class="btn-help flex justify-end">
                                    <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="18" cy="18" r="17" fill="#121212" stroke="#C8C8C8" stroke-width="2" />
                                        <path d="M18.4238 22.3945H15.8809C15.89 21.5195 15.9674 20.804 16.1133 20.248C16.2682 19.6829 16.5189 19.168 16.8652 18.7031C17.2116 18.2383 17.6719 17.7096 18.2461 17.1172C18.6654 16.6888 19.0482 16.2878 19.3945 15.9141C19.75 15.5312 20.0371 15.1211 20.2559 14.6836C20.4746 14.237 20.584 13.7038 20.584 13.084C20.584 12.4551 20.4701 11.9128 20.2422 11.457C20.0234 11.0013 19.6953 10.6504 19.2578 10.4043C18.8294 10.1582 18.2962 10.0352 17.6582 10.0352C17.1296 10.0352 16.6283 10.1309 16.1543 10.3223C15.6803 10.5137 15.2975 10.8099 15.0059 11.2109C14.7142 11.6029 14.5638 12.1178 14.5547 12.7559H12.0254C12.0436 11.7259 12.2988 10.8418 12.791 10.1035C13.2923 9.36523 13.9668 8.80013 14.8145 8.4082C15.6621 8.01628 16.61 7.82031 17.6582 7.82031C18.8158 7.82031 19.8001 8.02995 20.6113 8.44922C21.4316 8.86849 22.056 9.47005 22.4844 10.2539C22.9128 11.0286 23.127 11.9492 23.127 13.0156C23.127 13.8359 22.9583 14.5924 22.6211 15.2852C22.293 15.9688 21.8691 16.6113 21.3496 17.2129C20.8301 17.8145 20.2786 18.3887 19.6953 18.9355C19.194 19.4004 18.8568 19.9245 18.6836 20.5078C18.5104 21.0911 18.4238 21.7201 18.4238 22.3945ZM15.7715 26.7285C15.7715 26.3184 15.8991 25.972 16.1543 25.6895C16.4095 25.4069 16.7786 25.2656 17.2617 25.2656C17.7539 25.2656 18.1276 25.4069 18.3828 25.6895C18.638 25.972 18.7656 26.3184 18.7656 26.7285C18.7656 27.1204 18.638 27.4577 18.3828 27.7402C18.1276 28.0228 17.7539 28.1641 17.2617 28.1641C16.7786 28.1641 16.4095 28.0228 16.1543 27.7402C15.8991 27.4577 15.7715 27.1204 15.7715 26.7285Z" fill="#C8C8C8" />
                                    </svg>
                                </div>
                                @foreach($categories[$index] as $category)
                                <div class="nav-content-area flex mt-4 justify-between items-center">
                                    <div class="category-name text-sm font-bold border-2 p-1 rounded-xl whitespace-no-wrap @if($categoryGroup === '6つの視点から考える') border-blue-700 text-blue-700 @elseif($categoryGroup === '8つに派生させる') border-purple-700 text-purple-700 @elseif($categoryGroup === '希望、欠点から考える') border-green-700 text-green-700 @elseif($categoryGroup === '類似から考える') border-orange-700 text-orange-700 @elseif($categoryGroup === '原因、背景から考える') border-pink-700 text-pink-700 @elseif($categoryGroup === '5W1Hから考える') border-yellow-700 text-yellow-700 @endif">{{ $category }}</div>
                                    <input class="category-group" type="hidden" name="nav_category_group[]" value="{{ $categoryGroup }}">
                                    <input class="category-value" type="hidden" name="nav_category[]" value="{{ $category }}">
                                    <div class="flex items-center w-5/6">
                                        <input type="text" name="nav_content_name[]" class="nav-content w-full mx-2 h-6 outline-none rounded-sm border-solid border-2 border-gray-500">
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
                            <div class="flex flex-col nav-help-area p-3 bg-gray-600 shadow-md hidden">
                                <div class="btn-help-back flex justify-end">
                                    <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="18" cy="18" r="17" fill="#121212" stroke="#C8C8C8" stroke-width="2" />
                                        <path d="M26.3892 8.99999L9.39453 26.7837" stroke="#C8C8C8" stroke-width="2" />
                                        <path d="M8.99995 9.39451L26.7837 26.3892" stroke="#C8C8C8" stroke-width="2" />
                                    </svg>

                                </div>
                                <div class="flex items-center p-2 text-white">
                                    <p class="whitespace-no-wrap">{{ $categoryGroup }}</p>
                                    <p class="mx-2">→</p>
                                    <p>{{ $categoryGroupHelps[$index] }}</p>
                                </div>
                                @for($i = 0; $i < count($categories[$index]); $i++) <div class="flex items-center m-2 text-white">
                                    <p class="whitespace-no-wrap">{{ $categories[$index][$i] }}</p>
                                    <p class="mx-2">→</p>
                                    <p>{{ $categoryHelps[$index][$i] }}</p>
                            </div>
                            @endfor
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- Modal footer -->
                <div class="modal-footer flex justify-end p-3 space-x-2 rounded-b border-t border-gray-800 bg-gray-800">
                    <button data-modal-toggle="modalNav" type="button" onclick="submit();" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">適用する</button>
                    <button data-modal-toggle="modalNav" type="button" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none rounded-lg text-sm font-medium px-5 py-2.5">キャンセル</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
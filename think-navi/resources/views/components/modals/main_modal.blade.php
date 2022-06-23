<?php

use App\Models\Models\ThinkMemos;
use App\Models\Models\Thinks;

$have_memo_thinks = Thinks::where('ThinkFiles_id', $select_think_file->id)->has('ThinkMemo')->get();
$have_navi_thinks = Thinks::where('ThinkFiles_id', $select_think_file->id)->where('have_navi', 1)->get();
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
@foreach($have_navi_thinks as $have_navi_think)
<div id="{{ $have_navi_think->id }}naviModal" tabindex="-1" aria-hidden="true" class="hidden modal overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full h-modal">
    <div class="relative p-4 w-full max-w-xl max-h-10/12">
        <!-- Modal content -->
        <div class="modal-content relative bg-white rounded-lg shadow border-2 border-gray-700">
            <!-- Modal header -->
            <div class="nav-header-area flex relative justify-between items-start p-3 rounded-t bg-gray-800">
                <div class="drag-start w-full h-full absolute top-0 left-0 cursor-move"></div>
                <h3 class="my-auto text-xl font-semibold text-white">
                    {{ $have_navi_think->name }} Navi
                </h3>
                <button type="button" class="btn-close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 focus:outline-none rounded-lg text-sm p-1.5 ml-auto inline-flex items-center z-10" data-modal-toggle="{{ $have_navi_think->id }}naviModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="nav-form w-full" method="POST" action="{{ route('main.update-nav-contents') }}">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="edit_id" value="{{ $have_navi_think->id }}">
                    <input class="current-map-position-x" type="hidden" name="current_map_position_x">
                    <input class="current-map-position-y" type="hidden" name="current_map_position_y">
                    <input class="current-map-scale" type="hidden" name="current_map_scale">
                    <div class="flex flex-col nav-content overflow-y-scroll" style="max-height: 600px;">
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
                            <div class="nav-work-area">
                                <div class="btn-help flex justify-end">
                                    <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="18" cy="18" r="17" fill="#121212" stroke="#C8C8C8" stroke-width="2" />
                                        <path d="M18.4238 22.3945H15.8809C15.89 21.5195 15.9674 20.804 16.1133 20.248C16.2682 19.6829 16.5189 19.168 16.8652 18.7031C17.2116 18.2383 17.6719 17.7096 18.2461 17.1172C18.6654 16.6888 19.0482 16.2878 19.3945 15.9141C19.75 15.5312 20.0371 15.1211 20.2559 14.6836C20.4746 14.237 20.584 13.7038 20.584 13.084C20.584 12.4551 20.4701 11.9128 20.2422 11.457C20.0234 11.0013 19.6953 10.6504 19.2578 10.4043C18.8294 10.1582 18.2962 10.0352 17.6582 10.0352C17.1296 10.0352 16.6283 10.1309 16.1543 10.3223C15.6803 10.5137 15.2975 10.8099 15.0059 11.2109C14.7142 11.6029 14.5638 12.1178 14.5547 12.7559H12.0254C12.0436 11.7259 12.2988 10.8418 12.791 10.1035C13.2923 9.36523 13.9668 8.80013 14.8145 8.4082C15.6621 8.01628 16.61 7.82031 17.6582 7.82031C18.8158 7.82031 19.8001 8.02995 20.6113 8.44922C21.4316 8.86849 22.056 9.47005 22.4844 10.2539C22.9128 11.0286 23.127 11.9492 23.127 13.0156C23.127 13.8359 22.9583 14.5924 22.6211 15.2852C22.293 15.9688 21.8691 16.6113 21.3496 17.2129C20.8301 17.8145 20.2786 18.3887 19.6953 18.9355C19.194 19.4004 18.8568 19.9245 18.6836 20.5078C18.5104 21.0911 18.4238 21.7201 18.4238 22.3945ZM15.7715 26.7285C15.7715 26.3184 15.8991 25.972 16.1543 25.6895C16.4095 25.4069 16.7786 25.2656 17.2617 25.2656C17.7539 25.2656 18.1276 25.4069 18.3828 25.6895C18.638 25.972 18.7656 26.3184 18.7656 26.7285C18.7656 27.1204 18.638 27.4577 18.3828 27.7402C18.1276 28.0228 17.7539 28.1641 17.2617 28.1641C16.7786 28.1641 16.4095 28.0228 16.1543 27.7402C15.8991 27.4577 15.7715 27.1204 15.7715 26.7285Z" fill="#C8C8C8" />
                                    </svg>
                                </div>
                                @foreach($have_navi_think->children as $select_think_navi_child)
                                @if ($select_think_navi_child->category_group === $categoryGroup)
                                <div class="nav-content-area flex mt-4 justify-between items-center">
                                    <div class="category-name text-sm font-bold border-2 p-1 rounded-xl whitespace-no-wrap @if($categoryGroup === '6つの視点から考える') border-blue-700 text-blue-700 @elseif($categoryGroup === '8つに派生させる') border-purple-700 text-purple-700 @elseif($categoryGroup === '希望、欠点から考える') border-green-700 text-green-700 @elseif($categoryGroup === '類似から考える') border-orange-700 text-orange-700 @elseif($categoryGroup === '原因、背景から考える') border-pink-700 text-pink-700 @elseif($categoryGroup === '5W1Hから考える') border-yellow-700 text-yellow-700 @endif">{{ $select_think_navi_child->category }}</div>
                                    <input type="hidden" name="parent_id[]" value="{{ $have_navi_think->id }}">
                                    <input class="content_id" type="hidden" name="content_id[]" value="{{ $select_think_navi_child->id }}">
                                    <input class="category-group" type="hidden" name="category_group[]" value="{{ $select_think_navi_child->category_group }}">
                                    <input class="category-value" type="hidden" name="category[]" value="{{ $select_think_navi_child->category }}">
                                    <div class="flex w-5/6">
                                        <input type="text" name="content_name[]" value="{{ $select_think_navi_child->name }}" class="nav-content w-full mx-2 h-6 outline-none rounded-sm border-solid border-2 border-gray-500 @if($select_think_navi_child->category_group === '類似から考える') similar-content @endif">
                                        <div class="flex items-center">
                                            <div class="delete-category-content-in-table ml-2 w-6 h-6">
                                                <svg class="cursor-pointer" width="24" height="24" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="18" cy="18" r="17" stroke="black" stroke-width="2" />
                                                    <path d="M26 18H10" stroke="black" stroke-width="2" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endif
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
                <div class="modal-footer flex justify-end p-3 space-x-2 rounded-b bg-gray-800">
                    <input data-modal-toggle="{{ $have_navi_think->id }}naviModal" type="submit" name="update" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="適用する">
                    <input data-modal-toggle="{{ $have_navi_think->id }}naviModal" type="submit" name="delete" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="削除する">
                    <button data-modal-toggle="{{ $have_navi_think->id }}naviModal" type="button" class="text-white bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none rounded-lg text-sm font-medium px-5 py-2.5">キャンセル</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
@endforeach

@if($have_memo_thinks->count() > 0)
@foreach($have_memo_thinks as $have_memo_think)
<!-- memomodal -->
<div id="{{ $have_memo_think->id }}modalMemo" tabindex="-1" aria-hidden="true" class="hidden modal overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex relative justify-between items-start p-3 rounded-t bg-gray-800">
                <div class="drag-start w-full h-full absolute top-0 left-0 cursor-move"></div>
                <h3 class="my-auto text-xl font-semibold text-white lg:text-xl">
                    メモ
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center z-10" data-modal-toggle="{{ $have_memo_think->id }}modalMemo">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="memo-form w-full space-y-6 px-4" method="POST" action="{{ route('main.update-memo') }}">
                @csrf
                <input class="memo-input" type="hidden" name="edit_memo_id" value="{{ $have_memo_think->ThinkMemo->id }}">
                <input class="current-map-position-x" type="hidden" name="current_map_position_x">
                <input class="current-map-position-y" type="hidden" name="current_map_position_y">
                <input class="current-map-scale" type="hidden" name="current_map_scale">
                <div class="p-3">
                    <textarea type="string" class="form-input w-full" name="memo" required>{{ $have_memo_think->ThinkMemo->memo }}</textarea>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-3 space-x-2 rounded-b border-t border-gray-200">
                    <input data-modal-toggle="{{ $have_memo_think->id }}modalMemo" type="submit" name="update" class="text-white bg-gray-800 hover:bg-gray-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="更新する">
                    <input data-modal-toggle="{{ $have_memo_think->id }}modalMemo" type="submit" name="delete" class="text-white bg-gray-800 hover:bg-gray-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="削除する">
                    <button data-modal-toggle="{{ $have_memo_think->id }}modalMemo" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:outline-none rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">キャンセル</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endif
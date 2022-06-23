@extends('layouts.app')

@section('title')
Think Navi
@endsection

@section('content')
<div class="flex-col w-full justify-center mx-auto">
    <div class="flex flex-col justify-center pt-56">
        <div class="sub-title font-extrabold text-5xl text-center mb-5">”考える”をナビゲーションする</div>
        <div class="text-center text-xl mb-20">数ある発想法や考え方を使って新しい発見を手助けします</div>
        <a type="button" class="no-underline mx-auto rounded-3xl shadow py-3 px-5 font-bold text-2xl text-white bg-gray-800 hover:bg-gray-300 hover:text-gray-800 focus:outline-none" href="{{ route('register') }}">登録して始める</a>
    </div>
    <div class="flex flex-col justify-center mt-40 bg-gray-800">
        <div class="text-white text-center font-bold font-sans p-5 text-4xl bg-gray-800">Think Naviで使える機能</div>
        <div class="flex flex-col justify-between w-4/5 mx-auto">
            <div class="flex text-white mt-20">
                <div class="w-1/2 text-4xl text-center">『マッピング』</div>
                <div class="w-1/2 text-xl flex items-center">設定したテーマを中心に自由に発想、思考を展開していく。頭の中が可視化され考えもスッキリしていく。</div>
            </div>
            <img class="border-2 border-white w-full mt-10" src="images/map_figure.png" alt="map_figure">
        </div>
        <div class="flex flex-col justify-between w-4/5 mx-auto">
            <div class="flex text-white mt-20">
                <div class="w-1/2 text-4xl text-center flex flex-col">『シックスハット法』<p>6つの視点から考える</p>
                </div>
                <div class="w-1/2 text-xl flex items-center">「主観的」「客観的」「消極的」「積極的」「革新的」「分析的」の6つの視点からテーマを考えていき、現状の把握や問題点の洗い出しや対策などを考えるときに役立つアイデア発想法。</div>
            </div>
            <img class="border-2 border-white w-full mt-10" src="images/six_hut_figure.png" alt="six_hut_figure">
        </div>
        <div class="flex flex-col justify-between w-4/5 mx-auto">
            <div class="flex text-white mt-20">
                <div class="w-1/2 text-4xl text-center flex flex-col">『オズボーンのチェックリスト』<p>8つの切り口から考える</p>
                </div>
                <div class="w-1/2 text-xl flex items-center">「転用」「応用」「変更」「拡大」「縮小」「代用」の8つの切り口からアイデアを絞り出す発想法。新しいアイデアを考えるときに使える。</div>
            </div>
            <img class="border-2 border-white w-full mt-10" src="images/oz_figure.png" alt="oz_figure">
        </div>
        <div class="flex flex-col justify-between w-4/5 mx-auto">
            <div class="flex text-white mt-20">
                <div class="w-1/2 text-4xl text-center flex flex-col">『原因究明』<p>原因、背景から考える</p>
                </div>
                <div class="w-1/2 text-xl flex items-center">発生している問題などに対して原因を明確にして、そこから対策方法を考えるときに使える。</div>
            </div>
            <img class="border-2 border-white w-full mt-10" src="images/cause_figure.png" alt="cause_figure">
        </div>
        <div class="flex flex-col justify-between w-4/5 mx-auto">
            <div class="flex text-white mt-20">
                <div class="w-1/2 text-4xl text-center flex flex-col">他にも3つの発想法</div>
                <div class="w-1/2 text-xl flex items-center">欲求や希望、欠点をひたすら列挙して、それを基に考えるものや類似のものを列挙して、比較や応用出来る内容を考えたり、5W1Hを基に考えられる。</div>
            </div>
            <img class="border-2 border-white w-full mt-10" src="images/other_figure.png" alt="other_figure">
        </div>
        <div class="flex flex-col justify-between w-4/5 mx-auto">
            <div class="flex text-white mt-20">
                <div class="w-1/2 text-4xl text-center flex flex-col">『ターゲット決定』<p>目的を明確にして考える</p>
                </div>
                <div class="w-1/2 text-xl flex items-center">考えていく前に目的や誰に向けてなのかなどを明確にしているかいないかは大きな差が生まれる。方針を決めるために使える。</div>
            </div>
            <img class="border-2 border-white w-full mt-10" src="images/target_figure.png" alt="target_figure">
        </div>
        <div class="flex flex-col justify-between w-4/5 mx-auto">
            <div class="flex text-white mt-20">
                <div class="w-1/2 text-4xl text-center flex flex-col">『ゴール決定』<p>考え終わったら</p><p>次に何をするか考える</p>
                </div>
                <div class="w-1/2 text-xl flex items-center">アイデアや解決策などを出して終わりにせず、実現するために次に何をするべきかをまとめたいときに使える。</div>
            </div>
            <img class="border-2 border-white w-full mt-10" src="images/goal_figure.png" alt="goal_figure">
        </div>
        <div class="flex flex-col justify-between w-4/5 mx-auto">
            <div class="flex text-white mt-20">
                <div class="w-1/2 text-4xl text-center flex flex-col">『グループ分け』<p>出した後は整理する</p>
                </div>
                <div class="w-1/2 text-xl flex items-center">アイデア、案、問題、対策などを出し切ったら一度整理する時間も必要。マップに書いた内容をグループ毎に分けて整理することで新しいことが見えてくる。</div>
            </div>
            <img class="border-2 border-white w-full mt-10" src="images/group_figure.png" alt="group_figure">
        </div>
        <div class="flex flex-col justify-between w-4/5 mx-auto pb-5">
            <div class="flex text-white mt-20">
                <div class="w-1/2 text-4xl text-center flex flex-col">『類似を比較』<p>比べて他にない事</p><p>それにしかないことを考える</p>
                </div>
                <div class="w-1/2 text-xl flex items-center">何かを考える時に類似品や事例を基にする事でわかることや思いつくことを基に新しいものを生み出す。</div>
            </div>
            <img class="border-2 border-white w-full mt-10" src="images/comparison_figure.png" alt="comparison_figure">
        </div>
    </div>
    <div class="flex flex-col justify-center py-20">
        <div class="sub-title font-extrabold text-5xl text-center mb-5">”考える”をナビゲーションする</div>
        <div class="text-center text-xl mb-20">ぜひ一度利用してみてください！！</div>
        <a type="button" class="no-underline mx-auto rounded-3xl shadow py-3 px-5 font-bold text-2xl text-white bg-gray-800 hover:bg-gray-300 hover:text-gray-800 focus:outline-none" href="{{ route('register') }}">登録して始める</a>
    </div>
</div>
@endsection
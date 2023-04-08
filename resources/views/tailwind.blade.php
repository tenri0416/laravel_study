<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- ブロック要素は 縦に並ぶ
    <p>aaa</p>
    <p>iii</p>
    <p>uuu</p>
    インライン要素
    <span>あああ</span>
    <span>いいい</span>
    <span>ううう</span>
    <div>sa</div>
    <div>sa</div> --}}
    基礎教育ゾーン

    m-4 1rem 1文字分
    {{-- mx-16 左右に４文字ずつ空いている --}}

    {{-- インライン要素 --}}
    {{-- 上下に空白は作成されません --}}
    <span class="border border-red-500 m-8">spanタグです</span>
    <span class="border border-red-500 p-12">インライン要素</span>

    {{-- ブロック要素 --}}
    <p class="border border-blue-500 mt-16">pはパラグラフの略で文章のひとまとまりです</p>
    <p class="border border-blue-500 m-8 p-8">pはパラグラフの略で文章のひとまとまりです</p>
    <p class="border border-blue-500 mx-16">pはパラグラフの略で文章のひとまとまりです</p>

    {{-- ブロック要素の中にインライン要素 --}}
    <p class="border border-green-500 mt-16">pはバラグラブの略です
        <span class="border border-green-500 mt-8">spanタグです</span>
        <span class="border border-green-500  p-12">spanタグです</span>

    </p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    Colorゾーン
    {{-- <ブロック他所の中にブロック要素 --}}
    {{-- ブロック要素を横に並べる FlexBox Grid --}}
    <div class="border border-pink-500 flex justify-around mt-20">
        親ブロック
        <div class="border border-pink-500 ">子ブロック1</div>
        <div class="border border-pink-500 m-12">子ブロック2</div>
    </div>



    <p class="text-blue-400">文字の色</p>
    <div class="border border-pink-500 mt-16">文字の色</div>
    <div class="mt-16 bg-green-400">背景の色</div>

    <button class="bg-indigo-600 text-white font-bold w-24 py-4 hover:bg-indigo-500">ボタン</button>

    <input type="text" class="border-2 p-2 focus:outline-none focus:border-red-300">{{-- フォーカスの色をカスタマイズする --}}

    {{-- 薄くする opacity --}}
    <p class="mt-16 text-blue-400 text-opacity-50 boprder-opacity-50">文字の色</p>
    <div class="mt-16 border border-pink-500 border-opacity-50">線の色</div>
    <div class="mt-16 border border-green-400 bg-opacity-50">背景の色</div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    Font テキスト ゾーン
    <p class="px16">フォントサイズが16px</p>
    <p class="text-base">テキストサイズ base</p>
    <p class="text-2xl">テキストサイズ 2xl</p>
    {{-- 文字間の幅（横) --}}
    <p class="mt-16 tracking-wider">
        文字の間の幅が開きます(横方法)<br>
        文字の間の幅が開きます(横方法)<br>
        文字の間の幅が開きます(横方法)<br>
    </p>

    <p class="mt-16 leading-10">
        文字の間の幅が開きます(縦方向)<br>
        文字の間の幅が開きます(縦方向)<br>
        文字の間の幅が開きます(縦方向)<br>
    </p>

    {{-- ブロック要素のみ効果あり --}}
    <div class="text-center">ブロック要素ないのテキストを中央に</div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    Width height ゾーン
    {{-- インライン要素には適用されません --}}
    <span class="border border-red-500 w-96">インライン要素</span>
    <div class="border border-red-500 w-16">ブロック要素</div>
    {{-- 幅固定 --}}
    <div class="border border-red-500 w-96">ブロック要素</div>
    {{-- 幅　可変 --}}
    <div class="border border-red-500 w-full">ブロック要素</div>
    <div class=" mt-16 border border-blue-500 w-1/2">
        ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素
    </div>

    {{-- 幅 max指定 --}}
    <div class="border border-blue-500 max-w-2x1 ">
        ブロック要ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素ブロック要素素
    </div>

    <div class="flex justify-around">
        <div class="w-1/4 border border-blue-500">左側</div>
        <div class="w-1/4 border border-blue-500">右側</div>
        <div class="w-1/4 border border-blue-500">左側</div>
        <div class="w-1/4 border border-blue-500">右側</div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    Borders 線ゾーン

    <div class="border-4 border-red-400">線の太さ</div>
    <div class="mt-16 flex justify-around divide-x divide-green-400">
        <div class="flex-grow text-center">区切り線X方向</div>
        <div class="flex-grow text-center">区切り線X方向</div>
        <div class="flex-grow text-center">区切り線X方向</div>
    </div>
    <div class="mt-16 w-24 rounded-full bg-indigo-500 text-white text-center py-2">rounded</div>
    <div class="mt-16 w-24 rounded-full bg-indigo-500 text-white text-center py-9">rounded</div>綺麗なまるpaddingを調整するとできる

    <div class="mt-16 w-24 rounded-full bg-indigo-500 text-white text-center py-9 ring-4 ring-indigo-600">外に丸をつける</div>

    <div class="mt-16 w-24 rounded-full bg-indigo-500 text-white text-center py-9 ring-4 ring-indigo-600 ring-offset-4">
        間をあける ring-offset-4</div>

    <div
        class="mt-16 w-24 rounded-full bg-indigo-500 text-white text-center py-9 ring-4 ring-indigo-600 ring-offset-blue-4">
        間の色を変える ring-offset-4</div>





</body>

</html>

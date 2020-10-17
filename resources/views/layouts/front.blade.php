<!DOCTYPE html>

{{-- {{}} で囲まれたコードは、PHPで書かれた内容を表示するという意味になる --}}
{{-- ({{}}の中身を文字列に置換し、HTMLの中に記載する) --}}

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{-- ↑(windowsの基本ブラウザであるedgeに対応するという記載) --}}
        <meta name="viewport" content="width=device-width,initial-scale=1">
        {{-- ↑(画面幅を小さくしたとき、例えばスマートフォンで見たときなどに文字や画像の大きさを調整してくれるタグ) --}}
        
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- csrf（悪意のあるエクスプロイト一種であり、信頼できるユーザーになりかわり、認められていないコマンドを実行する）--}}
        {{-- metaタグにトークンを保存する  csrfから守るためにトークンを生成　--}}
        
        {{-- 各ページごとにtitileタグを入れるため@yieldで空けておく(後から作成するbladeファイルで各@yieldの中にテキストやコンテンツを埋め込む) --}}
        {{-- @yieldは指定したセッションの内容を表示するために使用。今回であれば、titleというセッションの内容を表示。--}}
        {{-- 各ページ毎にタイトルを変更できるようにするため。--}}
        <title>@yield('titile')</title>
        {{-- @yield　bladeファイルで各yieldの中にテキストやコンテンツを埋め込む　--}}
        
        {{-- @○○という記載のところはメソッドを読み込んでいる --}}
        
        {{-- Scripts --}}
        {{-- Laravel標準で用意されているJavascriptを読み込む --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        {{-- asset(‘ファイルパス’)は、publicディレクトリのパスを返す関数のこと。＝「/js/app.js」というパスを生成　--}}
        
        {{-- Fonts --}}
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        {{-- Styles --}}
        {{-- Larabel標準で用意されているCSSを読み込む --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <link href="{{ asset('css/front.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバー --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url( '/' ) }}">
                        {{-- url(“パス”)は、そのままURLを返すメソッド --}}
                        
                        {{ config('app.name', 'laravel') }}
                        {{-- assetと似たような関数で、configフォルダのapp.phpの中にあるnameにアクセスする。基本的にはアプリケーションの名前「Laravel」が格納されている。 --}}
                        
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {{-- Left Side Of Navber --}}
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        {{-- Right Side Of Navbar --}}
                        <ul class="navbar-nav ml-auto">
                            
                            {{-- Authentication Links --}}
                            {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                            {{--@guestはユーザーが認証されていないことを判定するために使う--}}
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                {{--/loginというURLを生成。__はviewで使うための関数--}}
                        
                                
                            {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                            {{-- @elseはユーザーが認証されていることを判定するために使う --}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{-- href=#はトップページに飛ぶ　role="button" だけでどんな要素 (例えば <p>、<span> や <div>) でもボタンコントロールとしてスクリーンリーダーへ認識させることができる--}}
                                        {{-- aria-haspopup="true" は要素がポップアップ部品を持つことを示す --}}
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                        {{--　ログイン中のユーザー名を取得--}}
                                    </a>
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            {{-- ログアウト画面に飛ぶ --}}
                                        </a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{-- ログアウトフォーム　ログアウト画面につながる　送信方法はPOST  何を非表示にしているの？--}}
                                            @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endguest    
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}
            
            <main class="py-4">
                {{--ここにコンテンツを入れるため、@yieldで空けておく --}}
                @yield('content')
            </main>
        </div>
    </body>
    
</html>
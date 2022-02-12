<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        
        <!-- Scripts -->
        {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script   src="https://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
            
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
        
         <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
        
    </head>
    <header>
        <h1 class="logo"><a class="main-link" href="#">推しとお金と。</a></h1>
    </header>
    <body>
        <div id="app">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ action('Admin\OshiController@index') }}">推し</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ action('Admin\MemoryController@index') }}">メモリー</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ action('Admin\ExpenseController@add') }}">お金</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">わたし</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ action('Admin\ProfileController@add') }}">なまえ</a></li>
                        @guest
                        <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                        <li><a class="dropdown-item" href="">{{ Auth::user()->name }}<span class="caret"></span></a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </li>
                        @endguest
                    </ul>
                </li>
            </ul>
            <hr>
            <ul class="nav_menu" style="justify-content:flex-start;">
            @yield('header_sub')
            </ul>
    
        <main>
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
        </main>
        </div>
       
    </body>
</html>
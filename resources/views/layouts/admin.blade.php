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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>
        
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
    <body>
        <div id="app">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light navbar-oshikane">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ url('/admin/main/index') }}">
                            推しとお金と。
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item" align="center">
                                    <a class="nav-link active" aria-current="page" href="{{ action('Admin\OshiController@index') }}">
                                        <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/heart.png" width="40" height="40">
                                        <br>
                                        推し
                                    </a>
                                </li>
                                <li class="nav-item" align="center">
                                    <a class="nav-link" href="{{ action('Admin\MemoryController@index') }}">
                                        <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/memo.png" width="40" height="40">
                                        <br>
                                        メモリー
                                    </a>
                                </li>
                                <li class="nav-item" align="center">
                                    <a class="nav-link" href="{{ action('Admin\BalancepaymentController@chartindex') }}">
                                        <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/result.png" width="40" height="40">
                                        <br>
                                        支出
                                    </a>
                                </li>
                                <li class="nav-item" align="center">
                                    <a class="nav-link" href="{{ action('Admin\SavingController@index') }}">
                                        <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/pig.png" width="40" height="40">
                                        <br>
                                        貯金
                                    </a>
                                </li>
                                <li class="nav-item" align="center">
                                    <a class="nav-link" href="{{ action('Admin\BudgetController@index') }}">
                                        <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/gama.png" width="40" height="40">
                                        <br>
                                        予算
                                    </a>
                                </li>
                                <li class="nav-item" align="center">
                                    <a class="nav-link" href="{{ action('Admin\UserController@index') }}">
                                        <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/friend.png" width="40" height="40">
                                        <br>
                                        推しとも
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav">
                                @guest
                                    <li>
                                        <a class="nav-link" href="{{ route('login') }}">
                                            {{ __('Login') }}
                                        </a>
                                    </li>
                                    {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                                @else
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/star.png" width="40" height="40">
                                            <br>
                                            わたし
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ action('Admin\UserController@search') }}">
                                                推しともを探す
                                            </a>
                                            <a class="dropdown-item" href="{{ action('Admin\UserController@add') }}">
                                                {{ Auth::user()->name }}の設定
                                                <span class="caret"></span>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('messages.Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <button type="button" class="btn btn-primary" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="flase">
                                        投稿する
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" id="second" aria-labelledby="dropdownMenuButton">
                                        <ul class="list-group list-group-horizontal">
                                            <li class="list-group-item" align="center">
                                                <a class="dropdown-item" href="{{ action('Admin\OshiController@add') }}">
                                                    <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/heart.png" width="50" height="50">
                                                    <br>
                                                    推し
                                                </a>
                                            </li>
                                            <li class="list-group-item" align="center">
                                                <a class="dropdown-item" href="{{ action('Admin\MemoryController@add') }}">
                                                    <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/memo.png" width="50" height="50">
                                                    <br>
                                                    メモリー
                                                </a>
                                            </li>
                                            <li class="list-group-item" align="center">
                                                <a class="dropdown-item" href="{{ action('Admin\ExpenseController@add') }}">
                                                    <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/result.png" width="50" height="50">
                                                    <br>
                                                    支出
                                                </a>
                                            </li>
                                            <li class="list-group-item" align="center">
                                                <a class="dropdown-item" href="{{ action('Admin\SavingController@add') }}">
                                                    <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/pig.png" width="50" height="50">
                                                    <br>
                                                    貯金
                                                </a>
                                            </li>
                                            <li class="list-group-item" align="center">
                                                <a class="dropdown-item" href="{{ action('Admin\BudgetController@add') }}">
                                                    <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/gama.png" width="50" height="50">
                                                    <br>
                                                    予算
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <hr>
            <main>
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
    <footer>
        @yield('footer')
    </footer>
</html>
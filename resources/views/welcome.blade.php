<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Архив ВКР | ИИТиАД Ирниту - Главная страница</title>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" type="text/css" href="css/app.css">
    </head>

    <body class="app">

        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">

                    <a class="navbar-brand mr-3" href="{{ url('/') }}"><img src="logo.png" class="mr-1" width="30" height="30"></img>
                        {{ __('Архив ВКР | ИИТиАД Ирниту') }}
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                                @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        @auth
                                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">{{ Auth::user()->name }}</a>
                                        @else
                                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Войти</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Зарегистрироваться</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif

                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container" id="app">
                <div class="row mt-5">
                    <div class="col-md-12">
                      
                        <vkrs-index></vkrs-index>
                    </div>
                </div>
            </div>
        
            @include('comp.footer')
        </div>

        <script src="./js/app.js">

</script>

    </body>
</html>

@section('javascript')

<script type="text/javascript">
 

</script>
@endsection

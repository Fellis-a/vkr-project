<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>{{ config('app.name', 'Архив ВКР | ИИТиАД Ирниту') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
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
            <main class="py-4">
                <div class="container mt-5">

                      <div class="card-header">
                      <h5>Добро пожаловать!</h5>
                      </div>
                    <div class="card-body border ">
                                <div class="mx-auto pull-right">
                                    <div class="">

                                            <a href="{{ route('search-vkr') }}" class="btn btn-sm btn-success mt-1">Поиск по теме</a>
                                    </div>
                                </div>
                        </div>

                  <div class="card-body">
                      <div class="table-responsive">
                            <table class="table table-striped table-sm mt-4">
                              <thead>
                                <tr>
                                  <th>№</th>
                                  <th>Название</th>
                                  <th class="dropdown-toggle">Специальность</th>
                                  <th class="dropdown-toggle">Год</th>
                                  <th>Преподаватель</th>
                                  <th>Теги</th>
                                </tr>
                              </thead>
                              <tbody>
                                @section('homesearch')



                                <?php $i = 0 ?>
                                @foreach($vkrs as $vkr)
                                <?php $i++ ?>
                                <tr>
                                  <td>{{$i}}</td>
                                  <td><a href="{{ route('vkr-single', $vkr->id) }}">{{$vkr->title}}</a></td>
                                  <td>{{$vkr->specialty->code}}</td>
                                  <td>{{$vkr->year}}</td>
                                  <td>{{$vkr->user['name']}}</td>
                                  <td>{{$vkr->tech}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <div class="d-flex justify-content-sm-center">
                              {{ $vkrs->links("comp.customPages") }}
                          </div>
                  </div>

                </div>
            </main>
            @include('comp.footer')
        </div>

    </body>
</html>

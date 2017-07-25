<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('Titulo')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @php
    if(Auth::check()){
        $navbar = Navbar::withBrand(config('app.name'), url('/home'))->inverse();
        $menus = Navigation::links([
            ['link' => route('pacientes.index'), 'title' => 'Pacientes'],
            ['link' => route('turmas.index'), 'title' => 'Turmas']
        ]);
        $linksDireita = Navigation::links([
            [
                Auth::user()->name,
                [
                    [
                        'link' => '/logout',
                        'title' => 'Logout'
                    ]
                ]
            ]
        ])->right();
        $navbar->withContent($menus)->withContent($linksDireita);
    } else {
        $navbar = Navbar::withBrand(config('app.name'), url('/login'))->inverse();
        $menus = Navigation::links([
            ['link' => url('/login'), 'title' => 'Login'],
            ['link' => url('/register'), 'title' => 'Registrar']
        ]);
        $navbar->withContent($menus);
    }
    @endphp

    {!! $navbar !!}

    @if(Session::has('message'))
        <div class="container">
            <p class="text-center">
                {!! Alert::success(Session::get('message'))->close() !!}
            </p>
        </div>
@endif

@yield('content')

<!-- RODAPÉ -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <p>Desenvolvido por Matheus Picioli</p>
                        <a href="https://www.facebook.com/matheus.picioli" target="_blank"
                           style="text-decoration: none;">
                            <img src="{{asset('img/facebook256x256.png')}}" alt="Facebook" width="32px" height="32px">
                        </a>
                        <a href="https://www.linkedin.com/in/matheuspicioli/" target="_blank"
                           style="text-decoration: none;">
                            <img src="{{asset('img/linkedin256x256.png')}}" alt="Linkedin" width="32px" height="32px">
                        </a>
                        <a href="https://www.github.com/matheuspicioli" target="_blank" style="text-decoration: none;">
                            <img src="{{asset('img/github256x256.png')}}" alt="GitHub" width="32px" height="32px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Angular -->
<script src="{{ asset('js/angular.min.js') }}"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('app/app.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @php
        $navbar = Navbar::withBrand(config('app.name'), url('/home'))->inverse();
        $menus = Navigation::links([
            ['link' => route('pacientes.index'), 'title' => 'Pacientes'],
            ['link' => route('lista-chamada.index'), 'title' => 'Lista de chamadas']
        ]);
        $linksDireita = Navigation::links([
            [
                'Dropdown',
                [
                    [
                        'link' => '#',
                        'title' => 'Link1'
                    ],
                    [
                        'link' => '#',
                        'title'=> 'Link2'
                    ]
                ]
            ]
        ])->right();
        $navbar->withContent($menus)->withContent($linksDireita);
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
</div>
<!-- Angular -->
<script src="{{ asset('js/angular.min.js') }}"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('app/app.js') }}"></script>
</body>
</html>

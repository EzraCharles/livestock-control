@extends('layouts.app')

@section('general')
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <div class="se-pre-con"></div>

    <div id="app">
        @include('partials.navbar')

        @include('partials.sidebar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
@endsection

<!doctype html>
<html @lang('en')>
<head>
    @include('layouts.head')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer="" src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker-bs5.min.css">
</head>

<body>
<div id="app">
    {{--@include('layouts.header')--}}
    <header-component user="{{ Auth::user()->name }}" search-url="{{route("searchStep1","find")}}"></header-component>
    <div class="d-flex justify-content-between">
        @include('layouts.menu')
        <div class="d-flex flex-fill p-2 bg-main">
            @yield('content')
        </div>
    </div>
    @yield('script')
></div>
</body>
</html>

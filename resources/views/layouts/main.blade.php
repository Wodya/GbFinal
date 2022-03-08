<!doctype html>
<html @lang('en')>
<head>
    @include('layouts.head')
</head>

<body id="page-top" >
@include('layouts.header')

<div class="d-flex justify-content-between">
    @include('layouts.menu')
    <div class="d-flex flex-fill p-2 bg-main">
        @yield('content')
    </div>
</div>

@yield('script')
</body>
</html>

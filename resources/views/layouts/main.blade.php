<!doctype html>
<html @lang('en')>
<head>
    @include('partials._head')
    @include('partials._css')
</head>

<body id="page-top" >
@include('partials._nav')

<div >
    <button type="button" class="btn btn-primary">Primary</button>
    @yield('content')
</div>

@include('partials._footer')
@include('partials._script')

@yield('script')
</body>
</html>

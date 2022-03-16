<!doctype html>
<html @lang('en')>
<head>
    @include('layouts.head')
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
<div id="app">
    {{--@include('layouts.header')--}}
    <header-component user="{{ Auth::user()->name }}"></header-component>
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
<script>
    import HeaderComponent from "../../js/components/HeaderComponent";
    export default {
        components: {HeaderComponent}
    }
</script>

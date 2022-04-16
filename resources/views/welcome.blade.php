@extends('layouts.main')

@section('Мои заказы','')

@section('content')

<div class="container-lg ms-30 me-30 mt-30 bg-main" >
    <input type="text" class="form-control date datepicker_input">
{{--            <div class="datepicker datepicker-dropdown datepicker-orient-left datepicker-orient-bottom" style="left: 24px; top: 182px;"><div class="datepicker-picker">--}}
{{--                    <div class="datepicker-header"><div class="datepicker-title" style="display: none;">--}}
{{--                        </div><div class="datepicker-controls"><button type="button" class="btn prev-btn">«</button>--}}
{{--                            <button type="button" class="btn view-switch">April 2022</button><button type="button" class="btn next-btn">»</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="datepicker-main"><div class="datepicker-view"><div class="days"><div class="days-of-week"><span class="dow">Su</span><span class="dow">Mo</span><span class="dow">Tu</span><span class="dow">We</span><span class="dow">Th</span><span class="dow">Fr</span><span class="dow">Sa</span></div><div class="datepicker-grid"><span class="datepicker-cell day prev" data-date="1648328400000">27</span><span class="datepicker-cell day prev" data-date="1648414800000">28</span><span class="datepicker-cell day prev" data-date="1648501200000">29</span><span class="datepicker-cell day prev" data-date="1648587600000">30</span><span class="datepicker-cell day prev" data-date="1648674000000">31</span><span class="datepicker-cell day" data-date="1648760400000">1</span><span class="datepicker-cell day" data-date="1648846800000">2</span><span class="datepicker-cell day" data-date="1648933200000">3</span><span class="datepicker-cell day" data-date="1649019600000">4</span><span class="datepicker-cell day" data-date="1649106000000">5</span><span class="datepicker-cell day" data-date="1649192400000">6</span><span class="datepicker-cell day" data-date="1649278800000">7</span><span class="datepicker-cell day" data-date="1649365200000">8</span><span class="datepicker-cell day" data-date="1649451600000">9</span><span class="datepicker-cell day" data-date="1649538000000">10</span><span class="datepicker-cell day" data-date="1649624400000">11</span><span class="datepicker-cell day focused" data-date="1649710800000">12</span><span class="datepicker-cell day" data-date="1649797200000">13</span><span class="datepicker-cell day" data-date="1649883600000">14</span><span class="datepicker-cell day" data-date="1649970000000">15</span><span class="datepicker-cell day" data-date="1650056400000">16</span><span class="datepicker-cell day" data-date="1650142800000">17</span><span class="datepicker-cell day" data-date="1650229200000">18</span><span class="datepicker-cell day" data-date="1650315600000">19</span><span class="datepicker-cell day" data-date="1650402000000">20</span><span class="datepicker-cell day" data-date="1650488400000">21</span><span class="datepicker-cell day" data-date="1650574800000">22</span><span class="datepicker-cell day" data-date="1650661200000">23</span><span class="datepicker-cell day" data-date="1650747600000">24</span><span class="datepicker-cell day" data-date="1650834000000">25</span><span class="datepicker-cell day" data-date="1650920400000">26</span><span class="datepicker-cell day" data-date="1651006800000">27</span><span class="datepicker-cell day" data-date="1651093200000">28</span><span class="datepicker-cell day" data-date="1651179600000">29</span><span class="datepicker-cell day" data-date="1651266000000">30</span><span class="datepicker-cell day next" data-date="1651352400000">1</span><span class="datepicker-cell day next" data-date="1651438800000">2</span><span class="datepicker-cell day next" data-date="1651525200000">3</span><span class="datepicker-cell day next" data-date="1651611600000">4</span><span class="datepicker-cell day next" data-date="1651698000000">5</span><span class="datepicker-cell day next" data-date="1651784400000">6</span><span class="datepicker-cell day next" data-date="1651870800000">7</span></div></div></div></div><div class="datepicker-footer"><div class="datepicker-controls"><button type="button" class="btn today-btn" style="display: none;">Today</button><button type="button" class="btn clear-btn" style="display: none;">Clear</button></div></div></div></div></div></div>--}}
</div>
@endsection
<script type="application/javascript">
</script>


{{--@extends('layouts.main')--}}

{{--@section('Мои заказы','')--}}

{{--@section('content')--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">--}}

{{--    <body>--}}
{{--    <div class="form-group">--}}
{{--        <div class='input-group date' id='CalendarDateTime'>--}}
{{--            <input type='text' class="form-control" />--}}
{{--            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </body>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>--}}

{{--    <script type="text/javascript">--}}
{{--        $(function() {--}}
{{--            $('#CalendarDateTime').datetimepicker();--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}



{{--<!DOCTYPE html>--}}
{{--<html>--}}

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>Laravel Bootstrap Date Time Picker Example</title>--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="form-group">--}}
{{--    <div class='input-group date' id='CalendarDateTime'>--}}
{{--        <input type='text' class="form-control" />--}}
{{--        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>--}}

{{--<script type="text/javascript">--}}
{{--    $(function() {--}}
{{--        $('#CalendarDateTime').datetimepicker();--}}
{{--    });--}}
{{--</script>--}}
{{--</html>--}}

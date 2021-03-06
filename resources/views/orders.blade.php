@extends('layouts.main')

@section('title','Заказы')

@section('content')
    <div class="container-lg ms-30 me-30 mt-30 bg-main" >
        <div class="mb-2">
            <a  type="button" class="btn {{$modeId === 1 ? 'active-as' :'background-color-as'}}" href="{{route('myOrders')}}">Мои активные</a>
            <a  type="button" class="btn {{$modeId === 2 ? 'active-as' :'background-color-as'}}" href="{{route('myAllOrders')}}">Мои все</a>
            @if($user->is_admin)
                <a  type="button" class="btn {{$modeId === 3 ? 'active-as' :'background-color-as'}}" href="{{route('orders')}}">Активные заказы</a>
                <a  type="button" class="btn {{$modeId === 4 ? 'active-as' :'background-color-as'}}" href="{{route('allOrders')}}">Все заказы</a>
            @endif
        </div>
        <orders-component :order-list = '@json($orderList)' :user = '@json($user)' :mode-id="{{$modeId}}" :order-states = '@json($orderStates)'
                          change-state-url="{{route("changeOrderState",["orderSpcId"=>"orderSpcId", "oldStateId" => "oldStateId", "newStateId" => "newStateId", "quantity"=>"quantity"])}}"
                          date-from="{{$dateFrom}}" date-to="{{$dateTo}}"
                          refresh-url-my-orders="{{route("myAllOrders",["dateFrom"=>"dateFrom", "dateTo"=>"dateTo"])}}"
                          refresh-url-orders="{{route("myAllOrders",["dateFrom"=>"dateFrom", "dateTo"=>"dateTo"])}}"
        >
        </orders-component>
        <div class="d-flex justify-content-center mt-3">
            {{ $ordersDb->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

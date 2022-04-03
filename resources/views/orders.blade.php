@extends('layouts.main')

@section('Мои заказы','')

@section('content')
    <div class="container-lg ms-30 me-30 mt-30 bg-main" >
        <orders-component :order-list = '@json($orderList)' :user = '@json($user)' :mode-id="{{$modeId}}"
                          change-quantity-url="{{route("basketChangeQuantity",["offerId"=>"offerId", "quantity"=>"quantity"])}}">
        </orders-component>
    </div>
@endsection

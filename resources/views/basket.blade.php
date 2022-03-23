@extends('layouts.main')

@section('Корзина','')

@section('content')
    <div class="container-lg ms-30 me-30 mt-30 bg-main" >
        <basket-component :offers = '@json($offers)' :user = '@json($user)'
                          change-quantity-url="{{route("basketChangeQuantity",["offerId"=>"offerId", "quantity"=>"quantity"])}}"
                          delete-position-url="{{route("basketDeletePosition",["offerId"=>"offerId"])}}"
                          make-order-url="{{route("makeOrder",["orderNumber"=>"orderNumber"])}}">
        </basket-component>
    </div>
@endsection

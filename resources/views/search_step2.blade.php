@extends('layouts.main')

@section('Поиск','| Шаг 2  ')

@section('content')
    <div class="container-lg ms-30 me-30 mt-30 bg-main" >
        <search-step2-component :offers = '@json($offers)' :user = '@json($user)' :product = '@json($product)' back="{{ url()->previous() }}"
                                change-quantity-url="{{route("step2ChangeQuantity",["offerId"=>"offerId", "quantity"=>"quantity"])}}" >
        </search-step2-component>
    </div>
@endsection

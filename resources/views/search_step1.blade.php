@extends('layouts.main')

@section('Поиск','| Шаг 1  ')

@section('content')
    <div class="container-lg ms-30 me-30 bg-main" >
        <p class="fs-1 mb-30 mt-30">Выберите бренд</p>
        <div class="row back-color-neutral h-48 fs-18 fw-bold rounded-3 border border-1">
            <div class="col d-flex justify-content-center align-items-center">
                Бренд
            </div>
            <div class="col d-flex justify-content-center align-items-center">
                Артикул
            </div>
            <div class="col-6 d-flex justify-content-start align-items-center">
                Наименование
            </div>
        </div>
        @forelse($products as $product)
            <a class="row bg-white h-48 fs-16 fw-normal rounded-3 border border-1" href="#">
                <div class="col d-flex justify-content-center align-items-center">
                    {{$product->brand->name}}
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    {{$product->code}}
                </div>
                <div class="col-6 d-flex justify-content-lg-start align-items-center">
                    {{$product->name}}
                </div>
            </a>
        @empty
            <p class="fs-2 mb-30 mt-30">Поиск не дал результатов</p>
        @endforelse
    </div>
@endsection

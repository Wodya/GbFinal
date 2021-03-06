<nav class="nav m-0 border-bottom align-items-center">
    <img src="{{ asset('img/menu-symbol.png') }}" width="24px" height="24px" class="ms-4">
    <img src="{{ asset('img/logo.png') }}" class="ms-4">
    <button type="button" class="btn btn-light button-as border border-color-dark-green-as font button-font-as fw-bold ms-4">Каталог</button>
    <input type="text" class=" border border-color-gray-as input-head-as input-head-1-as ms-4" placeholder="Номер детали или VIN номер">
    <button class="btn input-head-as border-color-gray-as input-head-2-as dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-expanded="false">Бренд</button>
    <button class="btn input-head-as border-color-gray-as input-head-2-as dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-expanded="false">Машина</button>
    <button type="button" class=" button-as input-head-as input-head-3-as border border-color-green-as"><img src="{{ asset('img/search.png') }}" alt="Поиск"></button>
    <button type="button" class="btn btn-light button-as border border-color-as font button-font-as fw-bold ms-4 ">Помощь в подборе</button>
    <img src="{{ asset('img/header1.png') }}" class="me-4">
    <div class="input-head-4-as border-start border-end nav-element"><img src="{{ asset('img/basket.png') }}" class="me-2 "><p class="p-0 m-0">23 434 (3)</p></div>
    <div class="input-head-5-as border-start border-end nav-element"><img src="{{ asset('img/mail.png') }}" class="me-4 ms-4"><img src="{{ asset('img/bell.png') }}" class="me-4"> </div>
    <div class="d-flex justify-content-start input-head-6-as border-start nav-element ps-2">
        <img src="{{ asset('img/status.png') }}" class="ms-4 me-2">
        <p class="ps-0 m-0">{{ Auth::user()->name }} </p>
        <span class="foreground-color-as ms-3">134 500 ₽</span>
    </div>
    <div class="d-flex flex-row-reverse flex-fill me-5">
        <img src="{{ asset('img/drop_arrow.png') }}">
    </div>
</nav>

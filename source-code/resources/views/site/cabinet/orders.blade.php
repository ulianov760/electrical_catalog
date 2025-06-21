@extends('site/layout/layout_cabinet')
@section('title') {{"Мои заказы"}} @endsection
@section('main_content')
    <div class="app-body flex-grow-1 px-2">
        <main class="main">
            <div class="breadcrumbs">
                <div class="container-fluid">
                    <h1 class="breadcrumbs__title"> Мои заказы</h1>
                </div>
            </div>
            <div class="catalog">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-9">

                            <div class="catalog__content">

                                <!-- Products :: Start-->
                                <div id="mainContainer">
                                    <div class="products">
                                        <ul class="products__list products__list--grid-4">
                                            @if(!is_null($orders))
                                                @foreach($orders as $order)

                                                    <li>
                                                        <div class="products-categories__item-image">
                                                                <img src="{{asset('/storage/'.$order['equipment_orders'][0]['image'])}}" width="220" height="220" alt="{{$order['id']}}">
                                                            </div>
                                                            <span class="h4">Заказ № {{$order['id']}}</span>
                                                            <p class="products__item-price">
                                                                <ins class="h4">Сумма заказа: {{$order['equipment_order_sum_cost']}}₽</ins>
                                                            </p>
                                                        <p class="h4">
                                                            Статус заказа: {{$order['status']['name']}}
                                                        </p>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                            @if(is_null($orders))
                                                <h3>По вашему запросу ничего не найдено</h3>
                                            @endif
                                        </ul>
                                    </div>
                                </div><!-- Products :: End-->

{{--                                <div class="container-pagination">--}}
{{--                                    @if(!is_null($equipments) && $currentCategory != "Поиск")--}}
{{--                                        <ul class="pagination">--}}
{{--                                            @if($equipments->previousPageUrl())--}}
{{--                                                <li> <a href="{{$equipments->previousPageUrl().'&id='.$currentCategory->id}}">&laquo;</a></li>--}}
{{--                                            @endif--}}
{{--                                            @for($i=1;$i<=$equipments->lastPage();$i++)--}}
{{--                                                @if($equipments->currentPage() == $i)--}}
{{--                                                    <li class="active"><span>{{$i}}</span></li>--}}
{{--                                                @else--}}
{{--                                                    <li><a href="{{'/category?id='.$currentCategory->id.'&page='.$i}}">{{$i}}</a></li>--}}
{{--                                                @endif--}}
{{--                                            @endfor--}}
{{--                                            @if($equipments->nextPageUrl())--}}
{{--                                                <li> <a href="{{$equipments->nextPageUrl().'&id='.$currentCategory->id}}">&raquo;</a></li>--}}
{{--                                            @endif--}}
{{--                                        </ul>--}}
{{--                                    @endif--}}
{{--                                    @if(!is_null($equipments) && $currentCategory == "Поиск")--}}
{{--                                        <ul class="pagination">--}}
{{--                                            @if($equipments->previousPageUrl())--}}
{{--                                                <li> <a href="{{$equipments->previousPageUrl().'&name='.$searchName}}">&laquo;</a></li>--}}
{{--                                            @endif--}}
{{--                                            @for($i=1;$i<=$equipments->lastPage();$i++)--}}
{{--                                                @if($equipments->currentPage() == $i)--}}
{{--                                                    <li class="active"><span>{{$i}}</span></li>--}}
{{--                                                @else--}}
{{--                                                    <li><a href="{{'/search?name='.$searchName.'&page='.$i}}">{{$i}}</a></li>--}}
{{--                                                @endif--}}
{{--                                            @endfor--}}
{{--                                            @if($equipments->nextPageUrl())--}}
{{--                                                <li> <a href="{{$equipments->nextPageUrl().'&name='.$searchName}}">&raquo;</a></li>--}}
{{--                                            @endif--}}
{{--                                        </ul>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </main>

    </div>
@endsection

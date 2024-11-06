@extends('site/layout/layout')
@section('title') {{$equipment->name}} @endsection
@section('main_content')
    <main class="main">
    <div class="breadcrumbs">
        <div class="container-fluid">
            <h1 class="breadcrumbs__title">{{$equipment->name}}</h1>
            <small class="breadcrumbs__counter"></small>
            <ul class="breadcrumbs__menu">
                <li><a class="breadcrumbs__link" href="/"><span>Главная</span></a>
                    <div class="breadcrumbs__dropdown">
                        <ul class="breadcrumbs__dropdown-menu">
                            @if(!is_null($categories))
                                @foreach($categories as $item)
                            <li><a class="breadcrumbs__dropdown-link" href="{{'/category?id='.$item->id}}">{{$item->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </li>
                <li><a class="breadcrumbs__link" href="{{'/category?id='.$category->id}}"><span>{{$category->name}}</span></a>
                </li>
                <li><a class="breadcrumbs__link" href="{{'/equipment/'.$equipment->id}}"><span>{{$equipment->name}}</span></a>
                </li>
            </ul>
        </div>
    </div>


    <div class="col-xl-12">
        <div class="sku">
            <div class="sku__view js-sku-view" style="position: relative;">
                <div class="sku__view-head">
                    <button class="sku__view-back" data-fancybox-close="">
                        <svg class="icon-arrow-back"><use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-arrow-back"></use>
                        </svg>
                    </button>
                    <span class="sku__view-title">{{$equipment->name}}</span>
                </div>
                <div class="sku__view-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="sku__sticky" style="">
                                <div class="">
                                    <div class="sku__vertical-one">
                                        <div class="swiper-container swiper-vertical-slides js-swiper-vertical-slides">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <a class="sku__slide" href="{{asset('/storage/'.$equipment->image)}}" data-fancybox="sku">
                                                        <img src="{{asset('/storage/'.$equipment->image)}}" width="500" height="500" alt="{{$equipment->name}}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sku__badges">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="sku__desc" id="product">
                                <div class="sku__group order-1 order-xl-2">
                                    <div class="sku__brand">
                                        <a class="sku__brand-link" href="/">Все категории</a>
                                    </div>


                                <div class="sku__group order-3 order-xl-1">
                                    <div class="details__txt">
                                        <div class="details__txt-readmore js-readmore" data-readmore-toggle="Читать дальше" data-readless-toggle="Скрыть" style="max-height: none;">
                                            <div class="editor"><h2 class="h2-description">Описание</h2><p class="p-prod-block-description-1">{{$equipment->description}}</p></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sku__group order-5 order-xl-5">
                                    <div class="sku__details">
                                        <strong class="sku__details-title">Характеристики</strong>
                                        <p class="p-prod-block-description-1">{{$equipment->characters}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- Sku :: End-->
        </div>
    </div>
    </main>
@endsection

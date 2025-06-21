@php
$all = 0;
@endphp
@extends('site/layout/layout')
@section('title') {{"Корзина"}} @endsection
@section('main_content')
    <main class="main">
        <!-- Breadcrumbs :: Start-->
        <div class="breadcrumbs">
            <div class="container-fluid">
                <h1 class="breadcrumbs__title">Оформление заказа.</h1>
                <ul class="breadcrumbs__menu">
                    <li><a class="breadcrumbs__link" href="/"><span>Главная</span></a></li>
                    <li>Корзина покупок</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs :: End-->
        <!-- Page :: Start-->
        <div class="page">

            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-12">
                        <!-- Cart :: Start-->
                        <div class="cart">
                            <span class="h2 cart__title">Ваши покупки</span>
                            <div class="cart__wrapper">
                                <div class="cart__content">
                                    <ul class="cart__list">
                                        @if(count(session()->get('carts')) > 0)
                                        @foreach(session()->get('carts') as $cart)
                                            @php $all += $cart['cost']; @endphp
                                        <li>
                                            <div class="cart__item">
                                                <a href="{{'/equipment/'.$cart['id']}}" class="cart__item-image">
                                                    <img src="{{asset('/storage/'.$cart['image'])}}" width="220" height="220" alt="{{$cart['name']}}">
                                                </a>
                                                <div class="cart__item-desc">
                                                    <a  class="cart__item-title">{{$cart['name']}}</a>
                                                    <p></p>
                                                </div>
                                                <div class="cart__item-number">
                                                    <div class="ui-number">
                                                        <input class="ui-number__input" type="number" name="quantity[462]" min="0" max="100" value="{{$cart['count']}}">
                                                        <a class="ui-number__decrease" href="{{'/edit-cart?id='.$cart['id'].'&type=left'}}">
                                                            <img  src="{{asset('img/left_arrow.png')}}">
                                                        </a>
                                                        <a class="ui-number__increase" href="{{'/edit-cart?id='.$cart['id'].'&type=right'}}">
                                                            <img src="{{asset('img/right_arrow.png')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cart__item-price">
                                                    {{$cart['cost']}} ₽
                                                    <small class="cart__item-price-piece">{{$cart['start_cost']}} ₽ / шт.</small>
                                                </div>
                                                <div class="cart__item-action js-action">
                                                    <button class="cart__item-action-toggle js-action-toggle">
                                                        <svg class="icon-dots"><use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-dots"></use>
                                                        </svg>
                                                    </button>
                                                    <div class="cart__item-action-offcanvas">

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                            @endforeach
                                        @else
                                        <h3>Ваша корзина пуста</h3>
                                        @endif
                                    </ul>
                                </div>
                                @if(count(session()->get('carts')) > 0)
                                <div class="cart__sidebar">
                                    <div class="cart__data">
                                        <span class="cart__data-title">О заказе</span>
                                        <table class="cart__data-table">
                                            <tbody>
                                            <tr>
                                                <td class="">Итого</td>
                                                <td class="text-right ">{{$all}} ₽</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Всего</th>
                                                <th class="text-right">{{$all}} ₽</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="cart__action">
                                        <a class="ui-btn ui-btn--60 ui-btn--primary ui-btn--fullwidth" href="{{'/buy-carts?total='.$all}}" style="background-color: orange">Оформление заказа</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div><!-- Cart :: End-->
                    </div>

                </div>
            </div>

        </div>
        <!-- Page :: End-->
    </main>
@endsection

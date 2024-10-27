<?php

?>
@extends('site/layout/layout')
@section('title') Главная страница @endsection
@section('main_content')

    <main class="main">
        <!-- Breadcrumbs :: Start-->
        <div class="breadcrumbs">
            <div class="container-fluid">
                <h1 class="breadcrumbs__title">Все категории оборудования ULIANOVelektro </h1>
                <ul class="breadcrumbs__menu">

                    <li><a class="breadcrumbs__link" href="/"><span>Главная</span></a></li>

                </ul>
            </div>
        </div>
        <!-- Breadcrumbs :: End-->
        <!-- Page :: Start-->
        <div class="page">

            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-12">
                        <div class="ui-wysiwyg editor">
                            <h2>Каталог ULIANOVelektro: скрость поиска, широкий ассортимент,надежность</h2>

                            <p>Каталог позволит разработчикам  выбирать комплектацию для проектирования нового или модернизированного объекта, а также будет полезен эксплуатационникам и ремонтникам.  </p>


                            <p>Необходимые сведения смогут получить работники служб материально-технического снабжения и комплектации производственных предприятий, маркетинговых подразделений оптово-коммерческих фирм.</p>
                            <p style="display: none;"></p>

                        </div>
                    </div>

                </div>
            </div>

            <div class="categories">
                <div class="container-fluid">
                    <span class="h2 categories__title">Категории</span>
                    <div class="products-categories">
                        @if(is_array($categories))
                        <ul class="products-categories__grid">
                            @foreach($categories as $category)
                            <li style="-ms-flex: 0 0 20%;flex: 0 0 20%;max-width: 20%;">
                                <a class="products-categories__item" href="{{'/category?id='.$category['id']}}">
                                    <div class="products-categories__item-image">
                                        @if(!is_null($category['equipment']))
                                        <img src="{{ asset('/storage/'.$category['equipment']['image'])}}">
                                        @endif
                                    </div>
                                    <span class="h2 products-categories__item-title">{{$category['name']}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div><!-- Categories :: End-->

        </div>
        <!-- Page :: End-->
    </main>
    <!-- Main :: End-->


@endsection

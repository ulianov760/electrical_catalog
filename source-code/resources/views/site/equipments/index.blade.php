@extends('site/layout/layout')
@section('title') {{$title}} @endsection
@section('main_content')
    <main class="main">
        <!-- Breadcrumbs :: Start-->
        <div class="breadcrumbs">
            <div class="container-fluid">
                <h1 class="breadcrumbs__title">{{$title}}</h1>
                <small class="breadcrumbs__counter">1663 товара</small>
                <ul class="breadcrumbs__menu">

                    <li><a class="breadcrumbs__link" href="/"><span>Главная</span></a>
                    </li>

                    <li>{{$title}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs :: End-->
        <!-- Catalog :: Start-->
        <div class="catalog">

            <div class="container-fluid">
                <div class="row">
                    <div id="column-left" class="col-xl-3">
                        <!-- Categories :: Start-->
                        <div class="categories-aside">
                            <div class="categories-aside__offcanvas">
                                <div class="categories-aside__offcanvas-in">
                                    <span class="h2 categories-aside__title">Категории</span>
                                    <ul class="categories-aside__menu">
                                        <li class="is-open">
                                            <a class="categories-aside__link is-active" href="https://iek-com.ru/modulnoe-oborudovanie/">Модульное оборудование<svg class="icon-arrow-categories"><use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-arrow-categories"></use>
                                                </svg>
                                            </a>

                                        </li>

                                    </ul>
                                </div>

                            </div>
                        </div><!-- Categories Aside :: End-->
                    </div>

                    <div class="col-xl-9">

                        <div class="catalog__content">

                            <!-- Products :: Start-->
                            <div id="mainContainer">
                                <div class="products">
                                    <ul class="products__list products__list--grid-4">
                                        <li>
                                            <div class="products__item  ">
                                                <div class="products__item-in">
                                                    <div class="products__item-topleft">
                                                        <div class="products__item-badges">
                                                        </div>
                                                    </div>
                                                    <div class="products__item-buttons">
                                                        <button type="button" class="ui-btn ui-btn--compare " title="В сравнение" data-action="compare" data-for="42053">
                                                            <svg class="icon-compare">
                                                                <use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-compare"></use>
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="ui-btn ui-btn--favorite " title="В закладки" data-action="wishlist" data-for="42053">
                                                            <svg class="icon-favorites">
                                                                <use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-favorites"></use>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <a class="products__item-image" href="https://iek-com.ru/mva40-1-016-c/">
                                                        <img src="./Модульное оборудование — Официальный сайт ИЕК (ИЭК) в России _ iek-com.ru_files/iek-MVA40-1-016-C-59-260x260.webp" width="260" height="260" alt="IEK Автоматический выключатель ВА47-100 1Р 16А 10кА С">
                                                    </a>
                                                    <span class="products__item-status products__item-status--true">На складе</span>
                                                    <span class="products__item-id">Артикул: MVA40-1-016-C</span>				<a class="products__item-title" href="https://iek-com.ru/mva40-1-016-c/">IEK Автоматический выключатель ВА47-100 1Р 16А 10кА С</a>
                                                    <p class="products__item-price"><ins>1001.50 ₽ </ins><del>1044.10 ₽</del>				</p>
                                                    <div class="products__item-action">
                                                        <div class="ui-add-to-cart ">
                                                            <button type="button" class="ui-btn ui-btn--primary" onclick="cart.add(&#39;42053&#39;, &#39;1&#39;);" data-add-to-cart="Перейти &lt;br&gt; в корзину">В корзину<svg class="icon-cart"><use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-cart"></use>
                                                                </svg>
                                                            </button>
                                                            <div class="ui-number">
                                                                <button class="ui-number__decrease">
                                                                    <svg class="icon-decrease"><use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-decrease"></use>
                                                                    </svg>
                                                                </button>
                                                                <button class="ui-number__increase">
                                                                    <svg class="icon-increase"><use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-increase"></use>
                                                                    </svg>
                                                                </button>
                                                                <input class="ui-number__input" type="number" name="prod_id_quantity[42053]" value="1" min="0" max="9999">
                                                            </div>
                                                            <a class="ui-btn ui-btn--view js-btn-preview" title="Быстрый просмотр" data-for="42053" href="https://iek-com.ru/#popupprod">
                                                                <svg class="icon-view"><use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-view"></use>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- Products :: End-->

                            <div class="container-pagination">
                                <ul class="pagination">
                                    <li class="active"><span>1</span></li><li><a href="https://iek-com.ru/modulnoe-oborudovanie/?page=2">2</a></li></ul>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

    </div>
    </main>
@endsection

@extends('site/layout/layout')
@section('title') {{($currentCategory != "Поиск")?$currentCategory->name:"Поиск"}} @endsection
@section('main_content')
    <main class="main">
        <!-- Breadcrumbs :: Start-->
        <div class="breadcrumbs">
            <div class="container-fluid">
                <h1 class="breadcrumbs__title">{{($currentCategory != "Поиск")?$currentCategory->name:"Поиск"}}</h1>
                <ul class="breadcrumbs__menu">
                    <li><a class="breadcrumbs__link" href="/"><span>Главная</span></a>
                    </li>
                    <li>{{($currentCategory != "Поиск")?$currentCategory->name:"Поиск"}}</li>
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
                                        @if(!is_null($categories))
                                        @foreach($categories as $category)
                                        <li >
                                            <a class="categories-aside__link is-active" href="{{'/category?id='.$category->id}}">{{$category->name}}
                                            </a>

                                        </li>
                                        @endforeach
                                            @endif
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
                                        @if(!is_null($equipments))
                                         @foreach($equipments as $equipment)
                                                <li>
                                                    <a class="products-categories__item" href="{{'/equipment/'.$equipment->id}}">
                                                        <div class="products-categories__item-image">
                                                            <img src="{{asset('/storage/'.$equipment->image)}}" width="220" height="220" alt="{{$equipment->name}}">
                                                        </div>
                                                        <span class="h2 products-categories__item-title">{{$equipment->name}}</span>
                                                        <p class="products__item-price">
                                                            <ins>{{$equipment->cost-$equipment->cost*($equipment->discount/100)}}₽</ins>
                                                            @if($equipment->discount > 0)
                                                            <del>{{$equipment->cost}}₽</del>
                                                            @endif
                                                        </p>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                        @if(is_null($equipments))
                                            <h3>По вашему запросу ничего не найдено</h3>
                                            @endif
                                    </ul>
                                </div>
                            </div><!-- Products :: End-->

                            <div class="container-pagination">
                                @if(!is_null($equipments) && $currentCategory != "Поиск")
                                <ul class="pagination">
                                    @if($equipments->previousPageUrl())
                                    <li> <a href="{{$equipments->previousPageUrl().'&id='.$currentCategory->id}}">&laquo;</a></li>
                                    @endif
                                    @for($i=1;$i<=$equipments->lastPage();$i++)
                                        @if($equipments->currentPage() == $i)
                                    <li class="active"><span>{{$i}}</span></li>
                                        @else
                                   <li><a href="{{'/category?id='.$currentCategory->id.'&page='.$i}}">{{$i}}</a></li>
                                        @endif
                                    @endfor
                                        @if($equipments->nextPageUrl())
                                           <li> <a href="{{$equipments->nextPageUrl().'&id='.$currentCategory->id}}">&raquo;</a></li>
                                        @endif
                                </ul>
                                @endif
                                @if(!is_null($equipments) && $currentCategory == "Поиск")
                                        <ul class="pagination">
                                            @if($equipments->previousPageUrl())
                                                <li> <a href="{{$equipments->previousPageUrl().'&name='.$searchName}}">&laquo;</a></li>
                                            @endif
                                            @for($i=1;$i<=$equipments->lastPage();$i++)
                                                @if($equipments->currentPage() == $i)
                                                    <li class="active"><span>{{$i}}</span></li>
                                                @else
                                                    <li><a href="{{'/search?name='.$searchName.'&page='.$i}}">{{$i}}</a></li>
                                                @endif
                                            @endfor
                                            @if($equipments->nextPageUrl())
                                                <li> <a href="{{$equipments->nextPageUrl().'&name='.$searchName}}">&raquo;</a></li>
                                            @endif
                                        </ul>
                                    @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>

    </div>
    </main>
@endsection

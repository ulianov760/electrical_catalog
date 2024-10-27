<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# business: https://ogp.me/ns/business# place: http://ogp.me/ns/place#" dir="ltr" lang="ru" class="is-loaded is-header-priority">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <title>@yield('title')</title>
    <meta name="theme-color" content="#e1b503">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="icon" type="image/png" href="{{asset('img/logo_el.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('img/logo_el.png')}}" sizes="16x16">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/logo_el.png')}}">
    <link rel="stylesheet" href="{{asset('css/svg-with-js.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
    <link href="{{asset('css/stylesheet.css')}}" type="text/css" rel="stylesheet" media="screen">
    <link href="{{asset('css/header.css')}}" type="text/css" rel="stylesheet" media="screen">

    <link href="{{asset('img/logo_el.png')}}" rel="icon">

    <meta property="og:locale" content="ru-ru">
    <meta property="og:rich_attachment" content="true">


    <link rel="preload" href="{{asset('img/logo_el.png')}}" as="image">

</head>

<body class="is-page-default  page-homepage bootstrap-3 is-page-header-fixed is-header-v5  ">
<div class="app app--v5 is-footer-v3" id="app">
    <!-- Header V5 :: Start-->
    <header class="header header--v5">
        <div class="container-fluid">
            <div class="header__mobile header__mobile-fixed">
                <div class="header__nav">
                    <div class="header__nav-offcanvas">
                        <div class="header__nav-head">

                        </div>
                        <div class="header__nav-body">
                            <div class="header__nav-group header__nav-group--acc_action_cart">

                            </div>
                            <ul class="header__catalog-menu"></ul>

                            <div class="header__nav-group header__nav-group--currency_language"></div>
                        </div>
                    </div>
                </div>

                <a class="header__logo" href="/">
                    <img  src="{{asset('img/logo_el.png')}}" title="ULIANOVelektro" alt="ULIANOVelektro">
                </a>

                <div class="header__search">
                    <div class="header__search-offcanvas">
                        <div class="header__search-head">
                            <button class="header__search-close js-search-trigger">
                                <svg class="icon-close"><use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-close"></use>
                                </svg>
                            </button>
                            <span class="header__search-title">Поиск</span>
                        </div>
                        <div class="header__search-body">
                            <div class="header__search-control">
                                <input class="header__search-input js-search-input" type="search" name="search" value="" placeholder="Искать товары или категории" autocomplete="off">

                                <button type="button" class="header__search-append js-search-btn">
                                    <svg class="icon-search"><use xlink:href="catalog/view/theme/prostore/sprites/sprite.svg#icon-search"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="header__search-autocomplete"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header__desktop">
                <div class="header__row header__row--01">
                    <div class="header__group header__group--info_call">
                        <div class="header__call">
                            <span class="header__mail"><a style="color: white" href="mailto:al_ulianov@mail.ru">elektr0tehnika@yandex.ru</a></span>  |
                            <button class="header__call-btn">
                                 <svg class="icon-arrow-down">
                                </svg>
                            </button>
                            <div class="header__call-offcanvas">
                                <ul class="header__call-menu">
                                    <li>

                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__row header__row--02 header-fixed" data-fixed-height="80">
                    <a class="header__logo" href="/">
                        <img src="{{asset('img/logo_el.png')}}" style="color: white" title="ULIANOVelektro" alt="ULIANOVelektro">
                    </a>
                    <!-- MAIN NAV Vertical  -->
                    <div></div>
                    <!-- MAIN NAV Vertical  -->
                    <div class="header__search">
                        <div class="header__search-control">
                           <input class="header__search-input js-search-input" type="search" name="search" id="searchInput" value="" placeholder="Искать оборудование" autocomplete="off">
                            <button type="button" onclick="searchEquipment()" class="header__search-btn js-search-btn" style="color: white">Найти</button>

                        </div>
                        <div id="search_result" style="visibility: hidden" class="search-list-block">
                            <ul name="" style="background-color: white" id="search-list">
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="header__row header__row--03">
                    <!-- MAIN NAV  -->

                    <!-- MAIN NAV Horizontal  -->
                    <nav class="header__nav header__priority priority-nav is-empty" data-text-more="Еще" instance="0">
                        <ul class="header__nav-menu">
                        </ul><span class="header__priority-dropdown-wrapper priority-nav__wrapper" aria-haspopup="false"><button aria-controls="menu" type="button" class="header__priority-toggle priority-nav__dropdown-toggle priority-nav-is-hidden">menu</button><ul aria-hidden="true" class="header__priority-dropdown priority-nav__dropdown"></ul></span>
                    </nav>
                    <!-- MAIN NAV Horizontal  -->

                    <!-- MAIN NAV  -->
                </div>
            </div>

        </div>
    </header><!-- Header V5 :: End-->
@yield('main_content')

<div class="fancybox-is-hidden popup popup--buy-click" id="popup-buy-click">

    <div class="popup__form">


    </div>
</div>


<!-- Footer v3 or v4 :: Start-->
<footer class="footer footer--v3"  style="background-color: #0000Cd">
    <div class="container-fluid" >
        <div class="footer__desc is-xl-hidden" >

            <a class="footer__logo" href="/"><img src="{{asset('img/logo_el.png')}}" style="color: white" title="ULIANOVelektro" alt="ULIANOVelektro"></a>

            <p class="footer__copyright" style="color: white">Каталог Электорооборудования
                <br>  <br> © 2020-2024			</p>
        </div>

        <div class="footer__bottom ">

            <a class="footer__logo is-xl-visible" href="/"><img src="{{asset('img/logo_el.png')}}" style="color: white" title="ULIANOVelektro" alt="ULIANOVelektro"></a>

            <p class="footer__copyright is-xl-visible" style="color: white">Каталог Электорооборудования, © 2020-2024 </p>
        </div>
    </div>


</footer>
</div><!-- .app :: End-->
<script >
    const searchInput = document.getElementById('searchInput');
    const results = document.getElementById('search-list');
    const search = <?php echo $equipmentsSearch ?>;

    function searchEquipment(){
        if(searchInput.value.trim().length > 0) {
            window.location.href = "/search?name=" + searchInput.value
        }
    }

    searchInput.addEventListener('focus', (e) => {
        results.style.visibility = "visible"
    });
    document.addEventListener('click', function (e) {
        if(e.target.tagName != "INPUT" && e.target.tagName != "UL" ){
            if(e.target.id != "searchInput" && e.target.id != "search-list" ){
                results.style.visibility = "hidden"
            }
        }})
      function changeSelectSize(size) {
        setTimeout(() => {
            results.size = size;
        }, 75);
    }

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase();
        if(query.trim().length > 0) {
            const filterResults = search[1].filter(item => item.name.toLowerCase().includes(query));
            displayResults(filterResults.slice(0,5));
        }
    });

    function displayResults(resultsArray) {
        results.innerHTML = '';
        let size = 1;
        resultsArray.forEach(result => {
            const li = document.createElement('li');
            const a = document.createElement('a')
            a.href = "/search?id="+result['id'];
            a.textContent = result['name'];
            li.appendChild(a);
            results.append(li);
            size++;
        });
        let height = 20 * size +'px';
        results.style.height = height;
        changeSelectSize(size);
    }

</script>

</body></html>

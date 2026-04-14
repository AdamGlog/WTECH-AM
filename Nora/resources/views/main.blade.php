<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nora</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('resources/NoraLogo.svg') }}">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="{{ asset('styles.css') }}" rel="stylesheet">
    </head>
    <body class="body-bg">

    <!--Top bar Stranky-->
    <x-topbar/>

    <!--Menu kategorii-->
    <x-menu-kategorii/>

    <!-- Modálne okno - Prihlásenie -->
    <x-modal-login/>

    <!-- Velka zlava - presmeruje na vsetky produkty zoradene od najlacnejsieho -->
    <div class="container text-center main-paddings">
        <div class="row mh-50">
            <div class="col mw-50">
                <a href="/vsetky?sort=najlacnejsie">
                    <img src="{{ asset('resources/MegaVypredaj.webp') }}" class="max-sizes-zlavy" alt="Mega Výpredaj">
                </a>
            </div>
        </div>
    </div>

    <!-- Nove Produkty carousel - 9 najnovsich produktov podla created_at -->
    <div class="container main-paddings">
        <h3 class="heading main-headings">Nové Produkty</h3>
        <div class="row">
            <div class="col">
                <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <!-- Slide 1 - produkty 1-3 -->
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center">
                                @foreach($noveProukty->slice(0, 3) as $produkt)
                                    <div class="d-inline-block text-center mx-2 lower-gap">
                                        <a href="/product/{{ $produkt->id }}">
                                            <button type="button" class="btn our-main-buttons">
                                                <img src="{{ asset('resources/' . $produkt->obrazok . '.webp') }}" alt="{{ $produkt->meno }}" class="carousel-images">
                                            </button>
                                        </a>
                                        <p class="carousel-text">{{ $produkt->meno }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Slide 2 - produkty 4-6 -->
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                @foreach($noveProukty->slice(3, 3) as $produkt)
                                    <div class="d-inline-block text-center mx-2 lower-gap">
                                        <a href="/product/{{ $produkt->id }}">
                                            <button type="button" class="btn our-main-buttons">
                                                <img src="{{ asset('resources/' . $produkt->obrazok . '.webp') }}" alt="{{ $produkt->meno }}" class="carousel-images">
                                            </button>
                                        </a>
                                        <p class="carousel-text">{{ $produkt->meno }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Slide 3 - produkty 7-9 -->
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                @foreach($noveProukty->slice(6, 3) as $produkt)
                                    <div class="d-inline-block text-center mx-2 lower-gap">
                                        <a href="/product/{{ $produkt->id }}">
                                            <button type="button" class="btn our-main-buttons">
                                                <img src="{{ asset('resources/' . $produkt->obrazok . '.webp') }}" alt="{{ $produkt->meno }}" class="carousel-images">
                                            </button>
                                        </a>
                                        <p class="carousel-text">{{ $produkt->meno }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <!-- Sipky carousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                        <img src="{{ asset('resources/ArrowBack.svg') }}"/>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                        <img src="{{ asset('resources/ArrowForward.svg') }}"/>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Odporucane produkty carousel - 9 najlepsie hodnotenych produktov -->
    <div class="container main-paddings">
        <h3 class="heading main-headings">Odporúčané Produkty</h3>
        <div class="row">
            <div class="col">
                <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <!-- Slide 1 - produkty 1-3 -->
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center">
                                @foreach($odporucaneProukty->slice(0, 3) as $produkt)
                                    <div class="d-inline-block text-center mx-2 lower-gap">
                                        <a href="/product/{{ $produkt->id }}">
                                            <button type="button" class="btn our-main-buttons">
                                                <img src="{{ asset('resources/' . $produkt->obrazok . '.webp') }}" alt="{{ $produkt->meno }}" class="carousel-images">
                                            </button>
                                        </a>
                                        <p class="carousel-text">{{ $produkt->meno }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Slide 2 - produkty 4-6 -->
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                @foreach($odporucaneProukty->slice(3, 3) as $produkt)
                                    <div class="d-inline-block text-center mx-2 lower-gap">
                                        <a href="/product/{{ $produkt->id }}">
                                            <button type="button" class="btn our-main-buttons">
                                                <img src="{{ asset('resources/' . $produkt->obrazok . '.webp') }}" alt="{{ $produkt->meno }}" class="carousel-images">
                                            </button>
                                        </a>
                                        <p class="carousel-text">{{ $produkt->meno }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Slide 3 - produkty 7-9 -->
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                @foreach($odporucaneProukty->slice(6, 3) as $produkt)
                                    <div class="d-inline-block text-center mx-2 lower-gap">
                                        <a href="/product/{{ $produkt->id }}">
                                            <button type="button" class="btn our-main-buttons">
                                                <img src="{{ asset('resources/' . $produkt->obrazok . '.webp') }}" alt="{{ $produkt->meno }}" class="carousel-images">
                                            </button>
                                        </a>
                                        <p class="carousel-text">{{ $produkt->meno }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <!-- Sipky carousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                        <img src="{{ asset('resources/ArrowBack.svg') }}"/>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
                        <img src="{{ asset('resources/ArrowForward.svg') }}"/>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Promo -->
    <div class="container">
        <h3 class="heading main-headings ps-0">Promo</h3>
        <div class="row align-items-center">

            <!-- Promo obrazok - presmeruje na vsetky konzoly -->
            <div class="col">
                <a href="/category/Konzoly">
                    <img src="{{ asset('resources/Promo.webp') }}" class="w-100 promo-image" alt="Konzoly">
                </a>
            </div>

            <!-- Promo buttons - kazdy spusti search pre danu konzolu -->
            <div class="col">
                <div class="row promo-buttons">
                    <div class="col">
                        <a href="/search?search-querry=Ybox" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">Ybox</a>
                    </div>
                    <div class="col">
                        <a href="/search?search-querry=PlayState" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">PlayState</a>
                    </div>
                </div>
                <div class="row promo-buttons">
                    <div class="col">
                        <a href="/search?search-querry=5SD" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">5SD</a>
                    </div>
                    <div class="col">
                        <a href="/search?search-querry=Nontend" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">Nontend</a>
                    </div>
                </div>
                <div class="row promo-buttons">
                    <div class="col">
                        <a href="/search?search-querry=Steak Deck" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">Steak Deck</a>
                    </div>
                    <div class="col">
                        <a href="/search?search-querry=GameGirl" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">GameGirl</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>
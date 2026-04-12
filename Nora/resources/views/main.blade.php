<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nora</title>
        <link rel="icon" type="image/x-icon" href="./resources/NoraLogo.svg">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="./styles.css" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <x-topbar/>
    
    <!--Menu kategorii-->
    <x-menu-kategorii/>
    
    <!-- Modálne okno - Prihlásenie -->
    <x-modal-login/>

    <!-- Velka zlava -->
    <div class="container text-center main-paddings">
            <div class="row mh-50">
                <div class="col mw-50">
                    <a href="/categoryPage">
                        <img src="./resources/MegaVypredaj.webp" class="max-sizes-zlavy"/>
                    </a>
                </div>
            </div>
    </div>

    <!-- Nove produkty carousel -->
    <div class="container main-paddings">
    <h3 class="heading main-headings">Nové Produkty</h3>
            <div class="row">
                <div class="col">
                    <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center">
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage">
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/TheWichter.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">The Wichter: The Legend of Regalt</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage">
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/trickoWichter.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Tričko The Wichter</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage">    
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/MyMeowingCats.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">My Meowing Cats</p>
                                 </div>
                            </div>
                                
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/PathOfFiitkar.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Path of Fiitkar</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/plysakMegaboing.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                        <p class="carousel-text">Plyšák Vlad z Megaboing</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/plagatWichter.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                        <p class="carousel-text">Plagát The Wichter</p>
                                 </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/plagatWichter2.webp" alt="1"class="carousel-images"></button>
                                    </a>
                                        <p class="carousel-text">Premium plagát The Wichter</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/MerchBoxMegaboing.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Mega box s merchom Megaboing</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/PS7.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Play State 7 konzola</p>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                        <img src="./resources/ArrowBack.svg"/>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                        <img src="./resources/ArrowForward.svg"/>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                </div>
            </div>
    </div>
    <!-- Odporucane produkty carousel -->
    <div class="container main-paddings">
    <h3 class="heading main-headings">Odporúčané Produkty</h3>
            <div class="row">
                <div class="col">
                    <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <div class="d-flex justify-content-center">
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/wichterHrncek.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Hrnček The Wichter</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/megaboing.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Megaboing</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/Cap2POF.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">FAN šiltovka Path of Fiitkar</p>
                                 </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/FigurkaAllOfThemIII.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Figúrka Eli z All of Them Part III</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/CapPOF.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Originálna šiltovka Path of Fiitkar</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/wichterHrncek2.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Gold hrnček The Wichter</p>
                                 </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/PS6.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Play State 6 konzola</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/AllOfThemIII.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">All of Them part III.</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="/productPage"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/klucenkaWichter.webp" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Premium Kľúčenka The Wichter</p>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                        <img src="./resources/ArrowBack.svg"/>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
                        <img src="./resources/ArrowForward.svg"/>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                </div>
            </div>
    </div>
    <!-- Promo  -->
    <div class="container">
        <h3 class="heading main-headings ps-0">Promo</h3>
        <div class="row align-items-center">
            <div class="col">
                <a href="/categoryPage">
                    <img src="./resources/Promo.webp" class="w-100 promo-image">
                </a>
            </div>
            <div class="col">
                <div class="row promo-buttons">
                    <div class="col">
                        <a href="/categoryPage" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">Ybox</a>
                    </div>
                    <div class="col">
                        <a href="/categoryPage" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">PlayState</a>
                    </div>
                </div>
                <div class="row promo-buttons">
                    <div class="col">
                        <a href="/categoryPage" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">PC</a>
                    </div>
                    <div class="col">
                        <a href="/categoryPage" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">Nontend</a>
                    </div>
                </div>
                <div class="row promo-buttons">
                    <div class="col">
                        <a href="/categoryPage" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">Steak Deck</a>
                    </div>
                    <div class="col">
                        <a href="/categoryPage" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">GameGirl</a>
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
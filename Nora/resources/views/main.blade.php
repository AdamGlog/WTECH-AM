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
    <div class="container">
        <div class="row align-items-center g-1">
            <div class="col-auto">
                <a href="./">
                    <img src="./resources/NoraLogo.svg" class="top-logo">
                </a>
            </div>
            <div class="col search-area">
                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search"/>   
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-success our-buttons top-bar-sizes bar-buttons" type="submit">
                    <img src="./resources/search.svg" class="top-bar-icons bar-icon-black">
                    <img src="./resources/searchWhite.svg" class="top-bar-icons bar-icon-white">
                </button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-secondary our-buttons top-bar-sizes bar-buttons" data-bs-toggle="modal" data-bs-target="#profil">
                    <img src="./resources/profile.svg" class="top-bar-icons bar-icon-black">
                    <img src="./resources/profileWhite.svg" class="top-bar-icons bar-icon-white">
                </button>
            </div>
            <div class="col-auto">
                <a href="./cart/cart.html">
                    <button type="button" class="btn btn-secondary our-buttons top-bar-sizes bar-buttons">
                        <img src="./resources/ShopCart.svg" class="top-bar-icons bar-icon-black">
                        <img src="./resources/ShopCartWhite.svg" class="top-bar-icons bar-icon-white">
                    </button>
                </a>
            </div>    
        </div>
    </div>

    <!--Menu kategorii-->
    <div class="container">
        <div class="row g-0 flex-nowrap">
            <div class="col">
                <div class="d-grid menu-button-left" role="group" aria-label="Basic example">
                    <a href="./categoryPage.html" type="button" class="btn btn-secondary menu-buttons our-buttons">Hry</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid" role="group" aria-label="Basic example">
                    <a href="./categoryPage.html" type="button" class="btn btn-secondary menu-buttons our-buttons">Konzoly</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid" role="group" aria-label="Basic example">
                    <a href="./categoryPage.html" type="button" class="btn btn-secondary menu-buttons our-buttons">Merch</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid" role="group" aria-label="Basic example">
                    <a href="./categoryPage.html" type="button" class="btn btn-secondary menu-buttons our-buttons">Figúrky</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid menu-button-right" role="group" aria-label="Basic example">
                    <a href="./footer/aboutUs.html" type="button" class="btn btn-secondary menu-buttons-last our-buttons">O Nás</a>
                </div>
            </div>    
        </div>
    </div>

    <!-- Modálne okno - Prihlásenie -->
    <div class="modal fade" id="profil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Prihlásenie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                   <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <div class="modal-body">
                    <label>Meno profilu</label>
                    <input type="text" name="nickname" class="form-control" value="{{ old('nickname') }}">
                    <label>Heslo</label>
                    <input type="password" name="password" class="form-control">
                    @error('nickname')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer d-flex flex-column align-items-center">
                    <button type="submit" class="btn btn-primary">Prihlásiť</button>
                    <label for="exampleName" class="form-label">
                        Nemáte účet? Zaregistrujte sa -> <a href="./profile/registration.html">TU</a>
                    </label>
                </div>
            </form>
                
            </div>
        </div>
    </div>

    <!-- Velka zlava -->
    <div class="container text-center main-paddings">
            <div class="row mh-50">
                <div class="col mw-50">
                    <a href="./categoryPage.html">
                        <img src="./resources/MegaVypredaj.jpg" class="max-sizes-zlavy"/>
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
                                    <a href="./productPage.html">
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/TheWichter.jpg" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">The Wichter: The Legend of Regalt</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html">
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/trickoWichter.png" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Tričko The Wichter</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html">    
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/MyMeowingCats.png" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">My Meowing Cats</p>
                                 </div>
                            </div>
                                
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/PathOfFiitkar.jpg" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Path of Fiitkar</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/plysakMegaboing.jpg" alt="1" class="carousel-images"></button>
                                    </a>
                                        <p class="carousel-text">Plyšák Vlad z Megaboing</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/plagatWichter.png" alt="1" class="carousel-images"></button>
                                    </a>
                                        <p class="carousel-text">Plagát The Wichter</p>
                                 </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/plagatWichter2.png" alt="1"class="carousel-images"></button>
                                    </a>
                                        <p class="carousel-text">Premium plagát The Wichter</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/MerchBoxMegaboing.jpg" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Mega box s merchom Megaboing</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/PS7.jpg" alt="1" class="carousel-images"></button>
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
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/wichterHrncek.png" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Hrnček The Wichter</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/megaboing.jpg" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Megaboing</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/Cap2POF.jpg" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">FAN šiltovka Path of Fiitkar</p>
                                 </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/FigurkaAllOfThemIII.jpg" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Figúrka Eli z All of Them Part III</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/CapPOF.jpg" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Originálna šiltovka Path of Fiitkar</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/wichterHrncek2.png" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Gold hrnček The Wichter</p>
                                 </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/PS6.jpg" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">Play State 6 konzola</p>
                                 </div>
                                <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/AllOfThemIII.jpg" alt="1" class="carousel-images"></button>
                                    </a>
                                    <p class="carousel-text">All of Them part III.</p>
                                 </div>
                                 <div class="d-inline-block text-center mx-2 lower-gap">
                                    <a href="./productPage.html"> 
                                        <button type="button" class="btn our-main-buttons"><img src="./resources/klucenkaWichter.png" alt="1" class="carousel-images"></button>
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
                <a href="./categoryPage.html">
                    <img src="./resources/Promo.jpg" class="w-100 promo-image">
                </a>
            </div>
            <div class="col">
                <div class="row promo-buttons">
                    <div class="col">
                        <a href="./categoryPage.html" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">Ybox</a>
                    </div>
                    <div class="col">
                        <a href="./categoryPage.html" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">PlayState</a>
                    </div>
                </div>
                <div class="row promo-buttons">
                    <div class="col">
                        <a href="./categoryPage.html" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">PC</a>
                    </div>
                    <div class="col">
                        <a href="./categoryPage.html" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">Nontend</a>
                    </div>
                </div>
                <div class="row promo-buttons">
                    <div class="col">
                        <a href="./categoryPage.html" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">Steak Deck</a>
                    </div>
                    <div class="col">
                        <a href="./categoryPage.html" type="button" class="btn btn-secondary our-buttons w-100 min-width-promo button-texts">GameGirl</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Paticka -->
    <div class="container">
        <hr class="border-dark border-2 opacity-100 my-0 mt-3"/>
        <div class="paticka">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <a href="./footer/reklamacia.html" class="link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>Reklamácie</p>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="./footer/shipping.html" class="link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>Možnosti dopravy</p>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="./footer/aboutUs.html" class= "link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>O nás</p>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="./footer/warranty.html" class= "link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>Záruky</p>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="./footer/zmluvnePodmienky.html" class= "link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>Zmluvné podmienky</p>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="./footer/kontakt.html" class= "link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>Kontakt</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-3 mt-md-0">
                        <p>Adresa</p>
                        <p>
                            <span class="highlight">Nora s.r.o. </span>Rynek Główny 31, 31-008 Kraków
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
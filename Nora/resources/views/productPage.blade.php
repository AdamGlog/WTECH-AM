<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Wichter: legend of Regalt</title>
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
                <a href="./main.html">
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
            <div class="modal-body">
                <label for="exampleName" class="form-label">Email alebo Meno profilu</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="jozkoMrkvicka555">
                <label for="inputPassword5" class="form-label">Heslo</label>
                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            </div>
            <div class="modal-footer d-flex flex-column align-items-center">
                <button type="button" class="btn btn-primary">Prihlásiť</button>
                <label for="exampleName" class="form-label">Nemáte účet? Zaregistrujte sa -> <a href="./profile/registration.html">TU</a></label>
            </div>
            </div>
        </div>
    </div>

    <!-- Telo stranky-->
    <div class="container">
        <h3 class="text-start ps-5 pt-4"> The Wichter: The Legend of Regalt</h3>
        <div class="row">
            <div class="col-12 col-md-5">

            <!-- Carousel -->
            <div id="productCarousel" class="carousel slide">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="./resources/TheWichter.jpg" 
                            class="d-block w-75 mx-auto" 
                            alt="produkt1">
                    </div>

                    <div class="carousel-item">
                        <img src="./resources/TheWichter2.png" 
                            class="d-block w-75 mx-auto" 
                            alt="produkt2">
                    </div>

                    <div class="carousel-item">
                        <img src="./resources/TheWichter3.png" 
                            class="d-block w-75 mx-auto" 
                            alt="produkt3">
                    </div>

                </div>

                <!-- Sípky -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <img src="./resources/ArrowBack.svg"/>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <img src="./resources/ArrowForward.svg"/>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Opis-->
        <div class="col">
            <div class="col p-3 bg-light border rounded mt-2">
                <h4>Popis produktu</h4>
                <p>
                    Regalt z Virie nebol vždy legendou. Bol to muž s mečom, dlhmi a príliš veľa nepriateľmi. 
                    V tejto epickej RPG hre prežiješ jeho príbeh od začiatku - od prvého zabitého monštra až po okamih, 
                    keď celý svet začal šepkať jeho meno.
                </p>
                <p>
                    Preskúmaj rozľahlý otvorený svet plný živých miest, zabudnutých ruín a stvorení, ktoré ťa nepustia spať. 
                    Každé rozhodnutie má cenu. Každý spojenec môže byť zrada. A každý súboj môže byť posledný.
                </p>
                <h4>
                    Požiadavky:
                </h4>
                <p>OS: Windows 10</p>
                   <p> Procesor: Intel Core i5 6600 alebo AMD Ryzen 5 1600 </p>
                    <p>Úložisko: 50GB</p>
                    <p>Pamäť: 8GB RAM</p>
                    <p>Grafická karta: NVIDIA GTX 1050</p>
                <h3> Cena:</h3>
                <h5>49,99€</h5>
            </div>
            
            <!-- Tlačidlá -->
            <div class="row">
                <div class="col">
                <button class="btn buttonProduct2 w-100 no-wrap my-2">Sledovať cenu</button>
                </div>
                <div class="col">
                <button class="btn buttonProduct2 w-100 no-wrap my-2">Pridať do obľúbených</button>
                </div>
                <div class="col">
                <button class="btn w-100 buttonProduct1 buttonProduct0 no-wrap my-2">Pridať do košíka</button>
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
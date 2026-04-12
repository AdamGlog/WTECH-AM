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
    <x-topbar/>
    
    <!--Menu kategorii-->
    <x-menu-kategorii/>
    
    <!-- Modálne okno - Prihlásenie -->
    <x-modal-login/>

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
                <div class="col-auto d-flex align-items-center gap-1">
                    <button class="btn-qty btn-qty-prev">
                        <img src="../resources/ArrowBack.svg" height="20">
                    </button>
                    <span class="kosik-qty">1</span>
                    <button class="btn-qty btn-qty-next">
                        <img src="../resources/ArrowForward.svg" height="20">
                    </button>
                </div>
                <div class="col">
                <button class="btn w-100 buttonProduct1 buttonProduct0 no-wrap my-2">Pridať do košíka</button>
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
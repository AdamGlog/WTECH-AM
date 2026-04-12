<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kategória hry</title>
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

    <!-- Nazov kategorie a Sort & Filter tlacitka -->
    <div class="container pt-3">
        <div class="row g-1 align-items-center">
            <div class="col">
                <h2 class="heading p-3 ms-1 main-headings">Hry</h2>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-secondary our-buttons dropdown-toggle smaller-text" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./resources/SortImage.svg" class="top-bar-icons">
                    Zoradenie
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Pôvodné zoradenie</a></li>
                    <li><a class="dropdown-item" href="#">Najdrahšie</a></li>
                    <li><a class="dropdown-item" href="#">Najlacnejšie</a></li>
                    <li><a class="dropdown-item" href="#">S najvyššou akciou</a></li>
                    <li><a class="dropdown-item" href="#">S najnižšou akciou</a></li>
                    <li><a class="dropdown-item" href="#">Najpredávanejšie</a></li>
                    <li><a class="dropdown-item" href="#">Najmenej predávané</a></li>
                </ul>
            </div>  
            <div class="col-auto">
                <div class="dropdown">
                        <button type="button" class="btn btn-secondary our-buttons dropdown-toggle smaller-text" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <img src="./resources/FilterImage.svg" class="top-bar-icons">
                            Filtrovanie
                        </button>
                        <div class="dropdown-menu p-3 dropdown-menu-end" style="min-width: 300px;">
                            <!-- Cena od -->
                            <label class="form-label highlight">Cena od:  </label>
                            <output for="cenaSlider">0 €</output>
                            <input type="range" class="form-range mb-2" min="0" max="999" value="0" id="cenaSliderOd">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">0 €</small>
                                <small class="text-muted">999 €</small>
                            </div>
                            <!-- Cena do -->
                            <label class="form-label highlight">Cena do:  </label>
                            <output for="cenaSlider">999 €</output>
                            <input type="range" class="form-range mb-2" min="0" max="999" value="999" id="cenaSliderDo">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">0 €</small>
                                <small class="text-muted">999 €</small>
                            </div>
                            <!-- Typ -->
                            <label class="form-label highlight">Typ</label>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ1"><label class="form-check-label" for="typ1">Akčné</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ2"><label class="form-check-label" for="typ2">RPG</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ3"><label class="form-check-label" for="typ3">Športové</label></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ4"><label class="form-check-label" for="typ4">Stratégia</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ5"><label class="form-check-label" for="typ5">Simulácia</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ6"><label class="form-check-label" for="typ6">Adventúra</label></div>
                                </div>
                            </div>
                            <!-- Hodnotenie -->
                            <label class="form-label highlight">Minimálne hodnotenie:</label>
                            <div class="d-flex gap-2 mb-3">
                                <label for="range2" class="form-label">0★</label>
                                <input type="range" class="form-range" min="0" max="5" id="range3">    
                                <label for="range2" class="form-label">5★</label>
                            </div>
                            <!-- Tlačidlá -->
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-secondary w-50" id="resetFilter">Resetovať</button>
                                <button type="button" class="btn btn-primary w-50" id="aplikovatFilter">Filtrovať</button>
                            </div>
                        </div>
                </div>  
            </div>
        </div>
    </div>

    <!-- Produkty v danej Kategorii -->
    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="./resources/TheWichter.jpg" class="card-img-top card-image" alt="..." >
                    <div class="card-body">
                        <h5 class="card-title">The Wichter: The Legend of Regalt</h5>
                        <p class="card-text">Epické fantasy RPG v rozľahlom otvorenom svete, kde bojuješ proti temným silám a odhaľuješ tajomstvá dávnych kráľovstiev.</p>
                        <a href="" class="btn btn-secondary our-buttons">Objav produkt</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4"> 
                <div class="card">
                    <img src="./resources/megaboing.jpg" class="card-img-top card-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Megaboing</h5>
                        <p class="card-text">Šialená akčná plošinovka plná humoru, chaosu a nepredvídateľných nepriateľov ktorí ťa dostanú do kolien smiechom.</p>
                        <a href="" class="btn btn-secondary our-buttons">Objav produkt</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="./resources/AllOfThemIII.jpg" class="card-img-top card-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">All Of Them Part III.</h5>
                        <p class="card-text">Postapokalyptická akcia v zničenom svete kde každé tvoje rozhodnutie formuje príbeh a určuje osud posledných preživších.</p>
                        <a href="" class="btn btn-secondary our-buttons">Objav produkt</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="./resources/MyMeowingCats.png" class="card-img-top card-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">My Meowing Cats</h5>
                        <p class="card-text">Rozkošná casual hra o starostlivosti o mačky - buduj svoj domov, adoptuj nové mačičky a staraj sa o ich šťastie.</p>
                        <a href="" class="btn btn-secondary our-buttons">Objav produkt</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="./resources/CyberBug.jpg" class="card-img-top card-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CyberBug 2067</h5>
                        <p class="card-text">Cyberpunkový akčný RPG zasadený do neonového mesta budúcnosti, kde korporácie vládnu a ty bojuješ o prežitie na uliciach.</p>
                        <a href="" class="btn btn-secondary our-buttons">Objav produkt</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="./resources/PathOfFiitkar.jpg" class="card-img-top card-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Path Of Fiitkar</h5>
                        <p class="card-text">Temné fantasy dungeon RPG s hlbokou príbehovou líniou, náročnými bossmi a stovkami zbraní na objavenie.</p>
                        <a href="" class="btn btn-secondary our-buttons">Objav produkt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Strankovanie -->
    <div class="container">
        <nav aria-label="..." class="p-3" >
            <ul class="pagination justify-content-center">
                <li class="page-item"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                    <a class="page-link" href="#" aria-current="page">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
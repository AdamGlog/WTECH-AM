<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prehľad admina</title>
        <link rel="icon" type="image/x-icon" href="../resources/NoraLogo.svg">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="{{ asset('styles.css') }}" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <div class="container">
        <div class="row align-items-center g-1">
            <div class="col-auto">
                <a href="/">
                    <img src="{{ asset('resources/NoraLogo.svg') }}" class="top-logo">
                </a>
            </div>
            <div class="col search-area">
                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search"/>   
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-success our-buttons top-bar-sizes bar-buttons" type="submit">
                    <img src="../resources/search.svg" class="top-bar-icons bar-icon-black">
                    <img src="../resources/searchWhite.svg" class="top-bar-icons bar-icon-white">
                </button>
            </div>
            <div class="col-auto">
                <a href="./adminDashboard.html">
                    <button type="button" class="btn btn-secondary our-buttons top-bar-sizes bar-buttons" data-bs-toggle="modal" data-bs-target="#profil">
                        <img src="../resources/profile.svg" class="top-bar-icons bar-icon-black">
                        <img src="../resources/profileWhite.svg" class="top-bar-icons bar-icon-white">
                    </button>
                </a>
            </div>
            <div class="col-auto">
                <a href="../cart/cart.html">
                    <button type="button" class="btn btn-secondary our-buttons top-bar-sizes bar-buttons">
                        <img src="../resources/ShopCart.svg" class="top-bar-icons bar-icon-black">
                        <img src="../resources/ShopCartWhite.svg" class="top-bar-icons bar-icon-white">
                    </button>
                </a>
            </div>    
        </div>
    </div>

    <!-- Menu Profilu Admina -->
    <div class="container">
        <div class="row g-0 flex-nowrap">
            <div class="col">
                <div class="d-grid menu-button-left" role="group" aria-label="Basic example">
                    <a href="profile/profileOverview" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons pe-2">Prehľad Účtu</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid" role="group" aria-label="Basic example">
                    <a href="adminCategories" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons">Kategórie</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid" role="group" aria-label="Basic example">
                    <a href="adminProducts" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons">Produkty</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid" role="group" aria-label="Basic example">
                    <a href="adminUsers" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons">Užívatelia</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid menu-button" role="group" aria-label="Basic example">
                    <a href="adminOrders" type="button" class="btn btn-secondary menu-buttons-last our-buttons profile-menu-buttons">Objednávky</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid menu-button" role="group" aria-label="Basic example">
                    <a href="adminDashboard" type="button" class="btn btn-secondary menu-buttons-last our-buttons profile-menu-buttons">Admin</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid menu-button-right" role="group" aria-label="Basic example">
                    <a href="/" type="button" class="btn btn-danger our-buttons-logout profile-menu-buttons">Odhlásiť</a>
                </div>
            </div>  
        </div>
    </div>

    <!-- Admin Dashboard -->
    <div class="container">
        <h2 class="heading main-headings text-center px-0 mt-4 my-3">Vitaj Admin!</h2>
        <div class="row g-3">
            <div class="col-12 col-md-4">
                <div class="card text-center border-secondary">
                    <div class="card-body smaller-text">
                        <h2 class="card-title fw-bold">999</h2>
                        <p class="card-text text-muted">Objednávok dnes</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card text-center border-secondary">
                    <div class="card-body smaller-text">
                        <h2 class="card-title fw-bold">100</h2>
                        <p class="card-text text-muted">Aktívnych užívateľov</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card text-center border-secondary">
                    <div class="card-body smaller-text">
                        <h2 class="card-title fw-bold">5</h2>
                        <p class="card-text text-muted">Nových užívateľov dnes</p>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="heading main-headings text-center px-0 pt-3">Nástroje</h3>
        <div class="row text-center">
            <div class="col d-flex flex-column align-items-center smaller-text">
                <a type="button" href="adminProducts" class="btn btn-secondary our-buttons my-2 admin-dasboard-buttons">
                    <img src="../resources/InventoryWhite.svg" class="admin-dasboard-buttons-icons icon-white"/>
                    <img src="../resources/InventoryBlack.svg" class="admin-dasboard-buttons-icons icon-black"/>
                    Správa Produktov
                </a>
                <a type="button" href="adminCategories" class="btn btn-secondary our-buttons my-2 admin-dasboard-buttons">
                    <img src="../resources/FolderWhite.svg" class="admin-dasboard-buttons-icons icon-white"/>
                    <img src="../resources/FolderBlack.svg" class="admin-dasboard-buttons-icons icon-black"/>
                    Správa Kategórií
                </a>
                <a type="button" href="adminUsers" class="btn btn-secondary our-buttons my-2 admin-dasboard-buttons">
                    <img src="../resources/UserListWhite.svg" class="admin-dasboard-buttons-icons icon-white"/>
                    <img src="../resources/UserListBlack.svg" class="admin-dasboard-buttons-icons icon-black"/>
                    Správa Užívateľov
                </a>
                <a type="button" href="adminOrders" class="btn btn-secondary our-buttons my-2 admin-dasboard-buttons">
                    <img src="../resources/OrderWhite.svg" class="admin-dasboard-buttons-icons icon-white"/>
                    <img src="../resources/OrderBlack.svg" class="admin-dasboard-buttons-icons icon-black"/>
                    Správa Objednávok
                </a>
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
                                <a href="../footer/reklamacia.html" class="link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>Reklamácie</p>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="../footer/shipping.html" class="link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>Možnosti dopravy</p>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="../footer/aboutUs.html" class= "link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>O nás</p>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="../footer/warranty.html" class= "link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>Záruky</p>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="../footer/zmluvnePodmienky.html" class= "link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>Zmluvné podmienky</p>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="../footer/kontakt.html" class= "link-dark link-underline link-underline-opacity-0 link-opacity-75-hover">
                                    <p>Kontakt</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-3 mt-md-0">
                        <p>Adresa</p>
                        <p>
                            <span class="highlight">Nora s.r.o. </span> Rynek Główny 31, 31-008 Kraków
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
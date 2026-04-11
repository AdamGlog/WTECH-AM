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
    <x-topbar/>

    <!-- Menu Profilu Admina -->
    <x-menu-profilu-admina/>

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
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
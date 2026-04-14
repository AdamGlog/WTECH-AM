<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Obľúbené položky</title>
        <link rel="icon" type="image/x-icon" href="../resources/NoraLogo.svg">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <x-profile-topbar/>
    
    <!--Menu Profilu-->
    <x-menu-profilu/>

    <!-- Oblubene polozky -->
    <div class="container">
        <h3 class="heading pt-2 ps-2 ms-1 main-headings">Obľúbené položky</h3>
        <div class="row justify-content-md-center pt-3 text-center">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="../resources/TheWichter.webp" class="card-img-top card-image" alt="..." >
                    <div class="card-body">
                        <h5 class="card-title">The Wichter: The Legend of Regalt</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="../productPage.html" class="btn btn-secondary our-buttons">Stránka Produktu</a>
                        <a href="" class="btn btn-danger">X</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="../resources/PathOfFiitkar.webp" class="card-img-top card-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Path of Fiitkar</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="" class="btn btn-secondary our-buttons">Stránka Produktu</a>
                        <a href="" class="btn btn-danger">X</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card">
                    <img src="../resources/CyberBug.webp" class="card-img-top card-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CyberBug 2067</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="" class="btn btn-secondary our-buttons">Stránka Produktu</a>
                        <a href="" class="btn btn-danger">X</a>
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
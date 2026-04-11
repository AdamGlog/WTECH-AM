<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Košík</title>
        <link rel="icon" type="image/x-icon" href="../resources/NoraLogo.svg">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <x-topbar/>

    <!--Menu kategorii-->
    <x-menu-kategorii/>
    
    <!-- Modálne okno - Prihlásenie -->
    <x-modal-login/>

    <!--Košík vypísaný-->
    <div class="container mt-4">
        <h3 class="main-headings">Obsah Košíka:</h3>
        <div class="border rounded p-3 bg-light">
            <!--Orientačné čísla-->
            <div class="d-flex align-items-center justify-content-center gap-3 mb-4">
                <div class="d-flex align-items-center gap-2">
                <span class="step-circle active">1</span>
                <span class="step-label active">Košík</span>
                </div>
                <div class="step-line"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle">2</span>
                    <span class="step-label">Doprava a platba</span>
                </div>
                <div class="step-line"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle">3</span>
                    <span class="step-label">Dodacie údaje</span>
                </div>
                <div class="step-line"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle">4</span>
                    <span class="step-label">Sumár</span>
                </div>
            </div>
            <!-- Položka -->
            <div class="d-flex align-items-center border rounded bg-white p-2 mb-2 flex-wrap kosik-item">
                <img src="../resources/wichterHrncek.png" height="50" class="me-3">
                <span class="me-2 kosik-item-name"><strong>Hrnček The Wichter</strong> - Popis produktu</span>
                <div class="kosik-item-controls ms-auto d-flex align-items-center gap-2">
                    <span>Počet ks.</span>
                    <button class="btn btn-danger btn-sm">✕</button>
                    <button class="btn-qty btn-qty-prev">
                        <img src="../resources/arrow_back.png" height="20">
                    </button>
                    <span class="kosik-qty">5</span>
                    <button class="btn-qty btn-qty-next">
                        <img src="../resources/arrow_forward.png" height="20">
                    </button>
                    <span class="fw-bold">49,95 €</span>
                </div>
            </div>

            <!-- Položka -->
            <div class="d-flex align-items-center border rounded bg-white p-2 mb-2 flex-wrap kosik-item">
                <img src="../resources/wichterHrncek.png" height="50" class="me-3">
                <span class="me-2 kosik-item-name"><strong>Hrnček The Wichter</strong> - Popis produktu</span>
                <div class="kosik-item-controls ms-auto d-flex align-items-center gap-2">
                    <span>Počet ks.</span>
                    <button class="btn btn-danger btn-sm">✕</button>
                    <button class="btn-qty btn-qty-prev">
                        <img src="../resources/arrow_back.png" height="20">
                    </button>
                    <span class="kosik-qty">5</span>
                    <button class="btn-qty btn-qty-next">
                        <img src="../resources/arrow_forward.png" height="20">
                    </button>
                    <span class="fw-bold">49,95 €</span>
                </div>
            </div>

            <!-- Položka -->
            <div class="d-flex align-items-center border rounded bg-white p-2 mb-2 flex-wrap kosik-item">
                <img src="../resources/wichterHrncek.png" height="50" class="me-3">
                <span class="me-2 kosik-item-name"><strong>Hrnček The Wichter</strong> - Popis produktu</span>
                <div class="kosik-item-controls ms-auto d-flex align-items-center gap-2">
                    <span>Počet ks.</span>
                    <button class="btn btn-danger btn-sm">✕</button>
                    <button class="btn-qty btn-qty-prev">
                        <img src="../resources/arrow_back.png" height="20">
                    </button>
                    <span class="kosik-qty">5</span>
                    <button class="btn-qty btn-qty-next">
                        <img src="../resources/arrow_forward.png" height="20">
                    </button>
                    <span class="fw-bold">49,95 €</span>
                </div>
            </div>

            <div class="d-flex justify-content-between fw-bold fs-5">
                <span>Spolu</span>
                <span>634,91 €</span>
            </div>

            <!-- Pokračovať -->
            <div class="d-flex justify-content-end mt-2">
                <a href="/cartShipment">
                    <button class="btn cart-pokracovat">Pokračovať</button>
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
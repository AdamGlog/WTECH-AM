<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dodacie údaje košíku</title>
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

    <!--Dodacie údaje objednávky-->
    <div class="container">
        <div class="row mt-4">
        <h3>Dodacie údaje:</h3>
        <div class="border rounded p-3 bg-light">
            <!--Orientačné čísla-->
            <div class="d-flex align-items-center justify-content-center gap-3 mb-4">
                <div class="d-flex align-items-center gap-2">
                <span class="step-circle active">1</span>
                <span class="step-label active">Košík</span>
                </div>
                <div class="step-line active"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle active">2</span>
                    <span class="step-label active">Doprava a platba</span>
                </div> 
                <div class="step-line active"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle active">3</span>
                    <span class="step-label active">Dodacie údaje</span>
                </div>
                <div class="step-line"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle">4</span>
                    <span class="step-label">Sumár</span>
                </div>
            </div>
            <div class="row">
               <div class="col-12 col-md-5">
                    <div class="mb-3">
                        <label for="meno" class="form-label">Meno</label>
                        <input type="text" class="form-control" id="meno">
                    </div>
                    <div class="mb-3">
                        <label for="priezvisko" class="form-label">Priezvisko</label>
                        <input type="text" class="form-control" id="priezvisko">
                    </div>
                    <div class="mb-3">
                        <label for="tel-cislo" class="form-label">Telefónne číslo</label>
                        <input type="text" class="form-control" id="tel-cislo">
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="mb-3">
                        <label for="ulica" class="form-label">Ulica</label>
                        <input type="text" class="form-control" id="meno">
                    </div>
                    <div class="mb-3">
                        <label for="mesto" class="form-label">Mesto</label>
                        <input type="text" class="form-control" id="priezvisko">
                    </div>
                    <div class = "mb-3">
                            <label for="krajina" class="form-label">Krajina</label>
                            <select class="form-select" aria-label="Default select example">
                            <option selected>Výber krajiny</option>
                            <option value="1">Slovensko</option>
                            <option value="2">Česko</option>
                            <option value="3">Poľsko</option>
                            </select>
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <div class="mb-3">
                        <label for="cislo-domu" class="form-label">Číslo domu</label>
                        <input type="text" class="form-control" id="meno">
                    </div>
                    <div class="mb-3">
                        <label for="psc" class="form-label">PSČ</label>
                        <input type="text" class="form-control" id="priezvisko">
                    </div>
                    <div class="mb-3 mt-5"><button class="btn btn-secondary  w-100">Vyplniť info z profilu</button></div>
                    
                </div>
            </div>
            <div class="d-flex justify-content-between mt-2">
                <a href="/cartShipment">
                    <button class="btn cart-back">Vrátiť sa</button>
                </a>
                <a href="/cartSummary">
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
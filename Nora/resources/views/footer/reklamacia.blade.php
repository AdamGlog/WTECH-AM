<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reklamácie</title>
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

    <!--Reklamácia-->
    <div class="container">
        <br>
        <h1 class = "text-center highlight">RÝCHLA REKLAMÁCIA</h1>
        <br>
        <h4 class = "text-center highlight">Stalo sa niečo zakúpenému produktu? Vybav to tu a rýchlo!</h4>
        <div class="row">
            <div class="col mt-4">
            <!-- Ľavý stĺpec - formulár -->
                <div class="row">
                    <div class="col mb-2">
                        <label for="exampleName" class="form-label">Meno</label>
                        <input type="email" class="form-control" id="menoReklamanta" placeholder="Janko">
                    </div>
                    <div class="col mb-2">
                        <label for="exampleName" class="form-label">Priezvisko</label>
                        <input type="email" class="form-control" id="PriezviskoReklamanta" placeholder="Mrkvička">
                    </div>
                </div>
            <div class="mb-2">
                <label for="exampleName" class="form-label">ID objednávky</label>
                <input type="email" class="form-control" id="IDobjednavkyReklamanta" placeholder="001122334455">
            </div>
            <div class="mb-2">
                <label for="exampleName" class="form-label">Typ problému</label>
                <input type="email" class="form-control" id="TypProblemuReklamanta" placeholder="Rozbitie displeju">
            </div>
            <div class="mb-2">
                <label for="exampleName" class="form-label">Dôvod reklamácie</label>
                <textarea class="form-control" id="DovodReklamacieReklamanta" rows="4" placeholder="nepáči sa mi produkt"> </textarea>
            </div>
        </div>
            <!--Fotka reklamácie-->
            <div class="col-4 text-center">
                <img src="../resources/gallery.svg" class="w-75">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Vložiť obrázok z PC</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>
        </div>
        <div class="text-center"><button type="button" class="btn btn-secondary w-50 fw-bold">Potvrdiť reklamáciu</button></div>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
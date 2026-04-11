<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Údaje profilu</title>
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


    <!-- Zmena Udajov o uzivatelovi -->
    <div class="container">
        <h2 class="heading p-3 ms-1 main-headings">Zmena osobných údajov profilu</h2>
        <div class="row align-items-center">
            <div class="col-4 text-center">
                <img src="../resources/AccountImage.svg" class="w-75">
                <div class="mb-3">
                    <label for="formFile" class="form-label smaller-text">Vložiť profilový obrázok</label>
                    <input class="form-control smaller-text" type="file" id="formFile">
                </div>
            </div>
            <div class="col-4 fs-4">
                <div class="mb-3">
                    <label for="exampleFormControlInputName" class="form-label smaller-text">Krstné Meno</label>
                    <input type="text" class="form-control smaller-text" id="exampleFormControlInputName" placeholder="Jožko">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInputSurN" class="form-label smaller-text">Priezvisko</label>
                    <input type="text" class="form-control smaller-text" id="exampleFormControlInputSurN" placeholder="Hráško">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInputTel" class="form-label smaller-text">Telefónne číslo</label>
                    <input type="tel" class="form-control smaller-text" id="exampleFormControlInputTel" placeholder="+421 555 555 555">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInputEmail" class="form-label smaller-text">Email</label>
                    <input type="email" class="form-control smaller-text" id="exampleFormControlInputEmail" placeholder="janko.hrasko@gnail.com">
                </div>
            </div>
            <div class="col-3 fs-4">
                <div class="mb-3">
                    <label for="exampleFormControlInputStreet" class="form-label smaller-text">Ulica</label>
                    <input type="text" class="form-control smaller-text" id="exampleFormControlInputStreet" placeholder="Kukučínova">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInputHouseN" class="form-label smaller-text">Číslo Domu</label>
                    <input type="text" class="form-control smaller-text" id="exampleFormControlInputHouseN" placeholder="2025/11">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInputCity" class="form-label smaller-text">Mesto</label>
                    <input type="text" class="form-control smaller-text" id="exampleFormControlInputCity" placeholder="Snina">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInputZipCode" class="form-label smaller-text">PSČ</label>
                    <input type="text" class="form-control smaller-text" id="exampleFormControlInputZipCode" placeholder="069 01">
                </div>
            </div>
            <div class="d-flex justify-content-end mt-2">
                <button class="btn cart-pokracovat">Potvrdiť</button>
            </div>
        </div>
    </div>
    
    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
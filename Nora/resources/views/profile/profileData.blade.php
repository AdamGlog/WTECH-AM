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
    <form action="/profileData" method="POST">
    @csrf 
    <div class="container">
        <h2 class="heading p-3 ms-1 main-headings">Zmena osobných údajov profilu</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
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
                    <label class="form-label smaller-text">Krstné Meno</label>
                    <input type="text" name="meno" class="form-control smaller-text" value="{{ auth()->user()->meno }}">
                </div>
                <div class="mb-3">
                    <label class="form-label smaller-text">Priezvisko</label>
                    <input type="text" name="priezvisko" class="form-control smaller-text" value="{{ auth()->user()->priezvisko }}">
                </div>
                <div class="mb-3">
                    <label class="form-label smaller-text">Telefónne číslo</label>
                    <input type="tel" name="telefonne_cislo" class="form-control smaller-text" value="{{ auth()->user()->telefonne_cislo }}">
                </div>
                <div class="mb-3">
                    <label class="form-label smaller-text">Email</label>
                    <input type="email" name="email" class="form-control smaller-text" id="exampleFormControlInputEmail" value="{{ auth()->user()->email }}">
                </div>
            </div>
            <div class="col-3 fs-4">
                <div class="mb-3">
                    <label class="form-label smaller-text">Ulica</label>
                    <input type="text" name="ulica" class="form-control smaller-text" value="{{ auth()->user()->ulica }}">
                </div>
                <div class="mb-3">
                    <label class="form-label smaller-text">Číslo Domu</label>
                    <input type="text" name="cislo_domu" class="form-control smaller-text" value="{{ auth()->user()->cislo_domu }}">
                </div>
                <div class="mb-3">
                    <label class="form-label smaller-text">Mesto</label>
                    <input type="text" name="mesto" class="form-control smaller-text" value="{{ auth()->user()->mesto->mesto }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label smaller-text">PSČ</label>
                    <input type="text" name="psc" class="form-control smaller-text" value="{{ auth()->user()->mesto->psc }}">
                </div>
            </div>
            <div class="d-flex justify-content-end mt-2">
                <button class="btn cart-pokracovat">Potvrdiť</button>
            </div>
        </div>
    </div>
    </form>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
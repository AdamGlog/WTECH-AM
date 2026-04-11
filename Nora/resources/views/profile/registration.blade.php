<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrácia</title>
        <link rel="icon" type="image/x-icon" href="../resources/NoraLogo.svg">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <x-topbar/>
    
    <!-- Modálne okno - Prihlásenie -->
    <x-modal-login/>

    <!-- reklamy a registracia-->
    <div class="container ">
        <div class="row d-flex mt-4 justify-content-between">
            <div class="col-2">
                <img src="../resources/banner_reklama.png" class="" height="700" alt="produkt2">
            </div>
            <div class="col-6 px-5">
                <h2 class="text-center mb-4">Registrácia</h2>
            <!-- Form -->
            <form action="/registration" method="POST">
                @csrf

                <!-- Meno užívateľa -->
                <div class="mb-3">
                    <label class="form-label">Meno a priezvisko</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meno" class="form-control" placeholder="Meno" aria-label="Meno">
                        <span class="input-group-text"> </span>
                        <input type="text" name="priezvisko" class="form-control" placeholder="Priezvisko" aria-label="Priezvisko">    
                    </div>
                </div>

                <!-- Prezývka užívateľa -->
                <div class="mb-3">
                    <label class="form-label">Nickname užívateľa</label>
                    <input type="text" name="nickname" class="form-control" aria-label="Nickname">
                </div>

                <!-- Telefónne číslo -->
                <div class="mb-3">
                    <label class="form-label">Telefónne číslo</label>
                    <div class="input-group mb-3">
                        <select name="predvolba" class="form-select" style="max-width: 100px;">
                            <option value="+421" selected>+421</option>
                            <option value="+420">+420</option>
                            <option value="+48">+48</option>
                        </select>
                        <input type="text" name="telefonne_cislo" class="form-control">
                    </div>
                </div>

                <!-- Email užívateľa -->
                <div class="mb-3">
                    <label class="form-label">Email užívateľa</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <!-- Heslo -->
                <div class="mb-3">
                    <label class="form-label">Heslo</label>
                    <input type="password" name="heslo" class="form-control">
                </div>

                <!-- Pokračovať -->
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-secondary">Registrovať</button>
                    </div>
                </div>
            </form>


            <div class="col-2 ">
            <img src="../resources/banner_reklama.png" 
                                class="right-banner" height="700"
                                alt="produkt2">
            </div>
        </div>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  
</body>
</html>
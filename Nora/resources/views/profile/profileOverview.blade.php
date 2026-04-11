<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prehľad profilu</title>
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

    <div class="container">
        <h2 class="heading p-3 ms-1 main-headings">Profil Hráča: {{ $user->nickname }}</h2>
        <div class="row align-items-center">
            <div class="col-3">
                <img src="../resources/AccountImage.svg" class="w-100">
            </div>
            <div class="col-9 fs-4">
                <p class="smaller-text">
                    <b>Telefón:</b> +421 {{ $user->telefonne_cislo }}
                </p>
                <p class="smaller-text">
                    <b>Email:</b> {{ $user->email }} 
                </p>
                <p class="smaller-text">
                    <b>Člen od:</b> {{ $user->datum_registracie }}
                </p>
                <p class="smaller-text">
                    <b>Typ člena:</b> {{ $user->typ_clena }}
                </p>
            </div>
        </div>
    </div>
    
    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
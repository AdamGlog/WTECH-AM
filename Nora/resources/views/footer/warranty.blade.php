<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Záruky</title>
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
    
    <!--Telo stránky-->
    <div class="container my-4">
        <div class="container text-center">
            <h2>Naše záruky</h2>                
        </div>
        <br>
        <div class="row justify-content-around align-items-center">
            <div class="col-md-6">
                <p class="text-start mb-0 zaruka-text">
                Naše služby sú postavené na kvalite a spoľahlivosti.
                Každý projekt riešime individuálne a dbáme na detaily,
                aby výsledok presne zodpovedal vašim očakávaniam.
                Používame overené postupy a moderné riešenia,
                vďaka čomu vám vieme garantovať dlhodobú spokojnosť.
                https://blog.shoptet.sk/reklamacia-a-zaruka-medzi-podnikatelmi/
                </p>
            </div>
            <div class="col">
                <img src="../resources/zaruka1.jpg" 
                            class="d-block w-75 mx-auto" 
                            style="max-width: 450px;"
                            alt="zaruka1">
            </div>
        </div>
        <br>
        <br>
        <div class="row justify-content-around align-items-center">
            <div class="col">
                <img src="../resources/zaruka2.jpg" 
                            class="d-block w-75 mx-auto" 
                            style="max-width: 450px;"
                            alt="zaruka2">
            </div>
            <div class="col-md-6">
                <p class="text-end mb-0 zaruka-text">
                Zákazník je pre nás vždy na prvom mieste. Komunikujeme 
                otvorene, dodržiavame dohodnuté termíny a poskytujeme 
                jasné informácie počas celého procesu. Naším cieľom nie 
                je len splniť zadanie, ale vytvoriť riešenie, ktoré vám 
                prinesie reálnu hodnotu.
                https://www.dovoz-z-ciny.sk/category/kontrola/
            </p>
            </div>
        </div>
        <br>
        <br>
        <div class="row justify-content-around align-items-center">
            <div class="col-md-6">
                <p class="text-start mb-0 zaruka-text">
                Veríme v transparentnosť a férový prístup. Preto ponúkame 
                jasné podmienky, bez skrytých poplatkov a nepríjemných prekvapení. 
                Naša podpora je tu pre vás aj po dokončení projektu, aby ste sa 
                na nás mohli spoľahnúť kedykoľvek to budete potrebovať.
                https://trade-info.sk/clanky/navod-reklamacia-ako-uspiet-s-reklamaciou/
                </p>
            </div>
            <div class="col">
                <img src="../resources/zaruka3.jpg" 
                            class="d-block w-75 mx-auto" 
                            style="max-width: 450px;"
                            alt="zaruka3">
            </div>
        </div>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  
</body>
</html>
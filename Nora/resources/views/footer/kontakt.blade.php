<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kontaktné údaje</title>
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

    <!--Text o Kontakte-->
    <div class="container">
        <br>
        <h1 class = "text-center">SME TU PRE VÁS</h1>
        <br>
        <!--Zákaznícke centrum-->
        <div class="row justify-content-around align-items-center">
            <div class="col-md-6">
                <p class="text-start mb-0 zaruka-text">
                <span class="highlight title">Zákaznícke centrum</span><br>
                Máš nejaký problém? Neváhaj a zavolaj nám. Tvoj problém vyriešime 
                rýchlejšie než stihneš vystrčiť nohy z nory. Pomôžeme s hocijakým 
                problémam zo sveta gamingu alebo našej elektroniky. Naši kolegovia
                zo zákacníckeho centra sú školený na problémy hocijakého typu.
                https://www.justdial.com/Kolkata/Free-Shyam-Solution/033PXX33-XX33-110907171301-Z2N8_BZDET
            </p>
            </div>
            <div class="col">
                <img src="../resources/zakaznickeCentrum.webp" 
                            class="d-block w-75 mx-auto" 
                            style="max-width: 400px;"
                            alt="zákaznícke centrum">
            </div>
        </div>

        <!--Vyťaženosť linky-->
        <div class="row justify-content-around align-items-center">
            <div class="col">
                <img src="../resources/vytazenost.png" 
                            class="d-block w-75 mx-auto" 
                            style="max-width: 450px;"
                            alt="vytazenost nasej tel. linky">
            </div>
            <div class="col-md-6">
                <p class="text-end mb-0 zaruka-text">
                <p class = "highlight">Tvoj telefonát vybavíme:</p>
                <p>+421 900 000 000</p>
                <p>pondelok - piatok: 8:00-18:00</p>
                <p>sobota - nedeľa: 10:00-17:00</p>
                https://www.telekom.sk/kontakt/zakaznicka-linka
                </p>
            </div> 
        </div>
        <!--špeciálne služby-->
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <div class="d-flex justify-content-center align-items-center gap-3 mb-2">
                    <div>
                        <p class="fw-bold mb-0">Výkup hier a konzol:</p>
                        <p>+421 900 000 000</p>
                    </div>
                    <img src="../resources/controller.svg" alt="obrazok" height="60">
                </div>
                <p class="w-75 text-center ms-auto">Zbavuješ sa starých hier alebo konzol? Prines ich k nám a my ti 
                    za ne zaplatíme férovu cenu. Odkupujeme hry a konzoly všetkých 
                    generácií — od retro kúskov až po najnovšie modely. Rýchlo, jednoducho 
                    a bez zbytočného papierovania.</p>
            </div>
            <div class="col-md-6 text-center">
                    <div class="d-flex align-items-between gap-3 mb-2">
                        <div>
                            <p class="fw-bold mb-0">Náš servis:</p>
                            <p>+421 900 000 000</p>
                        </div>
                    <img src="../resources/repair.svg" alt="obrazok" height="60">
                </div>
                <p class="w-75 text-center">
                    Pokazila sa ti konzola alebo herný ovládač? Náš tím skúsených technikov 
                    sa postará o rýchlu a spoľahlivú opravu. Opravujeme všetky bežné značky 
                    a modely, či už ide o mechanické poškodenie, softvérový problém alebo 
                    opotrebované diely. Prines nám svoje zariadenie a my sa o zvyšok postaráme.</p>
            </div>
        </div>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Možnosti dopravy</title>
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
            <h2>Možnosti dopravy</h2>                
        </div>
        <br>
        <!--Doručenie kuriérom-->
        <div class="row justify-content-around align-items-center">
            <div class="col">
                <img src="../resources/kurier.jpg" 
                            class="d-block w-75 mx-auto" 
                            style="max-width: 450px;"
                            alt="kurier">
            </div>
            <div class="col-md-6">
                <p class="text-end mb-0 zaruka-text">
                <span class="highlight title">Rýchla doprava až pred vaše dvere</span><br>
                Ak preferujete rýchlosť a maximálne pohodlie, odporúčame doručenie kuriérom. 
                Vaša objednávka bude doručená priamo k vašim dverám - domov alebo do práce, 
                bez nutnosti kamkoľvek chodiť. Kuriér vás bude vopred kontaktovať, aby ste 
                si mohli dohodnúť presný čas doručenia, ktorý vám najviac vyhovuje. Tento 
                spôsob dopravy je ideálny pre tých, ktorí chcú mať svoj tovar čo najskôr 
                a bez zbytočných komplikácií.
                https://shipcenter.pl/blog/praca-kuriera-na-czym-polega-czy-warto-i-ile-zarabia-kurier/
                </p>
            </div>
        </div>
        <br>
        <br>

        <!--Doručenie na poštu-->
        <div class="row justify-content-around align-items-center">
            <div class="col-md-6">
                <p class="text-start mb-0 zaruka-text">
                <span class="highlight title">Expresné vyzdvihnutie na pošte</span><br>
                Ponúkame spoľahlivé doručenie prostredníctvom pošty, ktoré je ideálne pre 
                zákazníkov, ktorí hľadajú overené a cenovo dostupné riešenie. Každú objednávku 
                starostlivo balíme tak, aby bola počas prepravy maximálne chránená pred poškodením. 
                Balík si môžete nechať doručiť priamo na vašu adresu alebo na vybranú pobočku, kde 
                si ho vyzdvihnete v čase, ktorý vám vyhovuje. O priebehu doručenia vás budeme priebežne 
                informovať, aby ste mali vždy prehľad o stave vašej zásielky.
                https://zahori.sk/93603/pobocka-posty-v-max-e-konci-posta-skalica-1-predlzi-otvaracie-hodiny/
            </p>
            </div>
            <div class="col">
                <img src="../resources/posta.jpg" 
                            class="d-block w-75 mx-auto" 
                            style="max-width: 450px;"
                            alt="posta">
            </div>
        </div>
        <br>
        <br>

        <!--Doručenie na predajňu-->
        <div class="row justify-content-around align-items-center">
            <div class="col">
                <img src="../resources/balikNaPredajni.jpg" 
                            class="d-block w-75 mx-auto" 
                            style="max-width: 450px;"
                            alt="balik na predajni">
            </div>
            <div class="col-md-6">
                <p class="text-end mb-0 zaruka-text">
                <span class="highlight title">Okamžité vyzdvihnutie u nás na predajni</span><br>
                Pre zákazníkov, ktorí preferujú osobný prístup, ponúkame možnosť vyzdvihnutia 
                objednávky priamo na našej predajni. Po pripravení vás budeme informovať, aby 
                ste si ju mohli prísť vyzdvihnúť bez zbytočného čakania. Výhodou osobného odberu 
                je nielen úspora času na doručenie, ale aj možnosť poradiť sa s naším personálom 
                alebo si produkt prezrieť ešte pred prevzatím. Tento spôsob je ideálny pre tých, 
                ktorí chcú mať nad celým procesom plnú kontrolu.
                https://www.alza.sk/alza-garantuje-dorucenie-darcekov-do-vianoc-2024
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
<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>O Nás</title>
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

    <!-- Text O Nás-->
    <div class="container">
        <h3 class="main-headings text-center fs-2 mt-3">O nás</h3>
        <div class="row mt-3">
            <div class="col">
                <h3>Naše Sídlo</h3>
                <img src="https://img.freepik.com/free-photo/location-symbol-street-city_23-2149764154.jpg" height="200px"/>
            </div>
            <div class="col">
                <h3>Adresa</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="highlight">Nora s.r.o.</span></li>
                    <li class="list-group-item">Sídlo: Rynek Główny 31, 31-008 Kraków</li>
                    <li class="list-group-item">IČO: 00000000</li>
                    <li class="list-group-item">DIČ: SK1112223344</li>
                    <li class="list-group-item">Email: <a href="mailto:kontakt@nora.sk">kontakt@nora.sk</a></li>
                    <li class="list-group-item">Telefón: +421 900 000 000</li>
                </ul>
            </div>
            <div class="col">
                <h3>Info</h3>
                <p>
                    Sme e-shop pre všetkých herných nadšencov. Či už hľadáte novú mašinu na ktorej si zahráte najnovšie hry, nové ale aj staré konzole. 
                    Staráme sa aj o zdravie naších zákazníkov v podobe výživových doplnkov. Po novom nás nájdete aj v kamenných predajniach po celom Slovensku.
                    <strong>Disclaimer: </strong>Všetky obrázky použité pre produkty, a väčšina ďalších obrázkov, boli generované pomocou Grok a Gemini, zvyšné sú z online zdrojov a nebudú sa používať na zisk.
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="main-headings mt-3">Kde nás môžete osobne navštíviť:</h3>
        <div class="row mt-3 g-5 justify-content-center">
            <div class="col-auto">
                <img src="https://europasc.sk/api/img/brloh-jpg-1737982461-jpg_1738671982.jpg" height="200px"/>
            </div>
            <div class="col-auto">
                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item"><span class="highlight">Bratislava</span></li>
                    <li class="list-group-item">Slnečná 14,</li>
                    <li class="list-group-item">841 05 Bratislava</li>
                </ul>
            </div>
            <div class="col-auto">
                <img src="https://static.standard.co.uk/2024/01/16/11/43/game-s.jpg?width=1200" height="200px"/>
            </div>
            <div class="col-auto">
                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item"><span class="highlight">Piešťany</span></li>
                    <li class="list-group-item">Nálepkova 5,</li>
                    <li class="list-group-item">921 01 Piešťany</li>
                </ul>
            </div>
        </div>
        <div class="row g-5 mt-1 justify-content-center">
            <div class="col-auto">
                <img src="https://touchit.sk/wp-content/uploads/2023/09/progaming-playgosmart-1.jpg" height="200px"/>
            </div>
            <div class="col-auto">
                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item"><span class="highlight">Považská Bystrica</span></li>
                    <li class="list-group-item">Rozkvet 16,</li>
                    <li class="list-group-item">017 01 Považská Bystrica</li>
                </ul>
            </div>
            <div class="col-auto">
                <img src="https://eurovea.sk/img/containers/images/shops/nay/nayfinal.jpg/986073ae869c086c118b520e3873ab2d/nayfinal.jpg" height="200px"/>
            </div>
            <div class="col-auto">
                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item"><span class="highlight">Dolný Kubín</span></li>
                    <li class="list-group-item">Hviezdoslavovo námestie 4,</li>
                    <li class="list-group-item">026 01 Dolný Kubín</li>
                </ul>
            </div>
        </div>
        <div class="row g-5 mt-1 justify-content-center">
            <div class="col-auto">
                <img src="https://www.nextech.sk/files/photo/2023-09/108337/bd4534/2_872.jpg" height="200px"/>
            </div>
            <div class="col-auto">
                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item"><span class="highlight">Poprad</span></li>
                    <li class="list-group-item">Tatranská 14,</li>
                    <li class="list-group-item">058 01 Poprad</li>
                </ul>
            </div>
            <div class="col-auto">
                <img src="https://files.smarty.cz/SmartySK/prodejny/700x500/Bratislava-Eurovea.jpg?v=202406140810" height="200px"/>
            </div>
            <div class="col-auto">
                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item"><span class="highlight">Snina</span></li>
                    <li class="list-group-item">Kapitána Nálepku 31,</li>
                    <li class="list-group-item">069 01 Snina</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sumár objednávky</title>
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

    <!--Sumár celej objednávky-->
    <div class="container mt-3">
        <h3>Sumár objednávky:</h3>
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
                <div class="step-line active"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle active">4</span>
                    <span class="step-label active">Sumár</span>
                </div>
            </div>
        <div class="row">    
            <!--Údaje kupujúceho-->
            <div class="col-12 col-md-4 mb-3">
                <h4>Dodacie údaje</h4>
                <p><span class="highlight">Meno:   </span>Jožko</p>
                <p><span class="highlight">Priezvisko:   </span>Mrkvička</p>
                <p><span class="highlight">Ulica:   </span>Športová 1078/45</p>
                <p><span class="highlight">Mesto:   </span>Snina 069 01</p>
                <p><span class="highlight">Krajina:   </span>Slovensko</p>
            </div>
            <!--Zoznam produktov-->
            <div class="col-12 col-md-8 gap-3 mb-2">
                <h4>Produkty</h4>
                @if(session('cart') && count(session('cart')) > 0)
                    @foreach(session('cart') as $id => $item)
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('resources/' . ($item['image'] ?? '') . '.webp') }}" alt="{{ $item['meno'] }}" height="50" class="me-3">
                            <span class="flex-grow-1">{{ $item['meno'] }}</span>
                            <span>Počet ks.:</span>
                            <input type="text" class="ms-2 form-control qty-input" value="{{ $item['pocet'] }}" style="width: 50px; text-align: center;" readonly>
                            <span class="ms-4">Cena:</span>
                            <input type="text" class="ms-2 form-control price-input" value="{{ number_format($item['cena'] * $item['pocet'], 2, ',', ' ') }}€" style="width: 100px; text-align: right;" readonly>
                        </div>
                        <br>
                    @endforeach

                <!--Spolu-->
                <div class="d-flex justify-content-end fw-bold fs-5">
                    <span>Spolu: </span>
                    <input type="text" class="form-control ms-4" style="width:115px; text-align:right;" value="{{ number_format(collect(session('cart'))->sum(fn($item) => $item['pocet'] * $item['cena']), 2, ',', ' ') }}€" readonly>
                </div>
                @else
                    <div class="alert alert-warning">V košíku nie sú žiadne produkty.</div>
                @endif
            </div>
            <!-- Pokračovať a Vrátiť sa-->
            <div class="d-flex justify-content-between mt-2">
                <a href="/cartData">
                    <button class="btn cart-back">Vrátiť sa</button>
                </a>
                <a href="/cartCompleted">
                    <button class="btn cart-pokracovat ms-4">Záväzne objednať</button>
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
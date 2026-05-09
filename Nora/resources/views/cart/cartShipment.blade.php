<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Výber dopravy a platby</title>
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

    <!--Výber dopravy a platby-->
    <div class="container">
        <div class="row mt-4">
        <h3>Doprava a platba:</h3>
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
                <div class="step-line"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle">3</span>
                    <span class="step-label">Dodacie údaje</span>
                </div>
                <div class="step-line"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle">4</span>
                    <span class="step-label">Sumár</span>
                </div>
            </div>
        <form method="POST" action="/cartShipment">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="row">
                        <h4>Výber dopravy:</h4>
                    </div> 
                    <div class="btn-group-vertical w-75 p-3" role="group">
                    <input type="radio" class="btn-check" name="typ_dorucenia" value="kurier" id="doprava1" autocomplete="off" {{ session('checkout.typ_dorucenia') == 'kurier' ? 'checked' : '' }}>
                    <label class="btn btn-secondary smaller-text py-2" for="doprava1">Kuriér</label>

                    <input type="radio" class="btn-check" name="typ_dorucenia" value="posta" id="doprava2" autocomplete="off" {{ session('checkout.typ_dorucenia') == 'posta' ? 'checked' : '' }}>
                    <label class="btn btn-secondary smaller-text py-2" for="doprava2">Pošta</label>

                    <input type="radio" class="btn-check" name="typ_dorucenia" value="osobny_odber" id="doprava3" autocomplete="off" {{ session('checkout.typ_dorucenia') == 'osobny_odber' ? 'checked' : '' }}>
                    <label class="btn btn-secondary smaller-text py-2" for="doprava3">Osobný odber</label>
                </div>
                </div>
                <div class="col">
                    <div class="row">
                        <h4>Výber platby:</h4>
                    </div> 
                    <div class="btn-group-vertical w-75 p-3" role="group" aria-label="Vertical radio toggle button group">
                    <input type="radio" class="btn-check" name="typ_platby" value="karta" id="platba1" autocomplete="off" {{ session('checkout.typ_platby') == 'karta' ? 'checked' : '' }}>
                    <label class="btn smaller-text py-2" for="platba1">Karta online</label>

                    <input type="radio" class="btn-check" name="typ_platby" value="prevod" id="platba2" autocomplete="off" {{ session('checkout.typ_platby') == 'prevod' ? 'checked' : '' }}>
                    <label class="btn smaller-text py-2" for="platba2">Bankový prevod</label>

                    <input type="radio" class="btn-check" name="typ_platby" value="dobierka" id="platba3" autocomplete="off" {{ session('checkout.typ_platby') == 'dobierka' ? 'checked' : '' }}>
                    <label class="btn smaller-text py-2" for="platba3">Osobná dobierka</label>
                    </div>
                </div>
                @error('typ_dorucenia') 
                    <div class="alert alert-danger">Vyberte spôsob dopravy.</div> 
                @enderror
                @error('typ_platby')    
                    <div class="alert alert-danger">Vyberte spôsob platby.</div>    
                @enderror
                <div class="d-flex justify-content-between mt-2">
                    <a href="/cart">
                        <button type="button" class="btn cart-back">Vrátiť sa</button>
                    </a>
                    <a href="/cartData">
                        <button button="submit" class="btn cart-pokracovat">Pokračovať</button>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $produkt->meno }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('resources/NoraLogo.svg') }}">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="{{ asset('styles.css') }}" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <x-topbar/>
    
    <!--Menu kategorii-->
    <x-menu-kategorii/>
    
    <!-- Modálne okno - Prihlásenie -->
    <x-modal-login/>

    <!-- Telo stranky-->
    <div class="container">
        <h3 class="text-start ps-5 pt-4"> {{ $produkt->meno }}</h3>
        <div class="row">
            <div class="col-12 col-md-5">

            <!-- Carousel -->
            <div id="productCarousel" class="carousel slide">
                <div class="carousel-inner">

                    @foreach($produkt->obrazky as $index => $obrazok)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset($obrazok->cesta) }}" 
                                class="d-block w-75 mx-auto" 
                                alt="produkt {{ $index + 1 }}">
                        </div>
                    @endforeach

                </div>

                <!-- Sípky -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <img src="{{ asset('resources/ArrowBack.svg') }}"/>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <img src="{{ asset('resources/ArrowForward.svg') }}"/>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Opis-->
        <div class="col">
            <div class="col p-3 bg-light border rounded mt-2">
                <h4>Popis produktu</h4>
                <p>
                    {{ $produkt->info }}
                </p>
                <h4>
                    Požiadavky:
                </h4>
                <p>{{ $produkt->doplnkove_info }}</p>
                <h4> Cena:</h4>
                <h5>{{ $produkt->cena }} €</h5>
                <h4>Na sklade: </h4>
                <p> {{ $produkt->pocet_na_sklade }} ks</p>
            </div>
            
            <!-- Tlačidlá -->
            <div class="row">
                <div class="col">
                    <button class="btn buttonProduct2 w-100 no-wrap my-2">Sledovať cenu</button>
                </div>
                <div class="col">
                    <button class="btn buttonProduct2 w-100 no-wrap my-2">Pridať do obľúbených</button>
                </div>
                <div class="col-auto d-flex align-items-center gap-1">
                    <button class="btn-qty btn-qty-prev" onclick="zmenPocet(-1)">
                        <img src="{{ asset('resources/ArrowBack.svg') }}" height="20">
                    </button>
                    <span class="kosik-qty" id="pocet_zobrazeny">1</span>
                    <button class="btn-qty btn-qty-next" onclick="zmenPocet(1)">
                        <img src="{{ asset('resources/ArrowForward.svg') }}" height="20">
                    </button>
                </div>
                <!-- Pridať do košíka -->
                <div class="col">
                    <form method="POST" action="/kosik/cart">
                        @csrf
                        <input type="hidden" name="id" value="{{ $produkt->id }}">
                        <input type="hidden" name="qty" id="qty_input" value="1">
                        
                        <button type="submit" 
                                class="btn w-100 buttonProduct1 buttonProduct0 no-wrap my-2">
                            Pridať do košíka
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- JS pre zmenu počtu -->
    <script>
        function zmenPocet(zmena) {
            let el = document.getElementById('pocet_zobrazeny');
            let input = document.getElementById('qty_input');
            let novy = parseInt(el.innerText) + zmena;
            if (novy < 1) novy = 1;
            el.innerText = novy; 
            input.value = novy;
        }
    </script>
</body>
</html>
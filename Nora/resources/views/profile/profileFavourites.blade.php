<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Obľúbené položky</title>
        <link rel="icon" type="image/x-icon" href="../resources/NoraLogo.svg">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <x-topbar/>
    
    <!--Menu Profilu-->
    <x-menu-profilu/>

    <!-- Oblubene polozky -->
    <div class="container text-center mt-3">
        <h3 class="heading pt-2 ps-2 ms-1 main-headings">Obľúbené položky</h3>
        @if($produkty->isEmpty())
            <p class="smaller-text">Wishlist je prázdny.</p>
        @else
        @foreach($produkty->chunk(3) as $riadok)
            <div class="row justify-content-md-center mb-4">
                @foreach($riadok as $produkt)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card h-100">
                            <img src="{{ asset('resources/' . $produkt->obrazok . '.webp') }}" 
                                    class="card-img-top card-image" 
                                    alt="{{ $produkt->meno }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $produkt->meno }}</h5>
                                <p class="card-text">{{ $produkt->popis }}</p>
                                <div class="d-flex gap-2 mt-auto justify-content-center">
                                    <a href="/product/{{ $produkt->id }}" class="btn btn-secondary our-buttons">Stránka Produktu</a>
                                    <form action="/wishlist/remove/{{ $produkt->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">X</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
    </div>

    <!-- Strankovanie -->
    <div class="container">
        <nav aria-label="strankovanie" class="p-3">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $produkty->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $produkty->previousPageUrl() }}">Previous</a>
                </li>
                @for($i = 1; $i <= $produkty->lastPage(); $i++)
                    <li class="page-item {{ $produkty->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $produkty->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ !$produkty->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $produkty->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kategória {{ $kategoria->meno }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('resources/NoraLogo.svg') }}">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('styles.css') }}" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <x-topbar/>

    <!--Menu kategorii-->
    <x-menu-kategorii/>

    <!-- Modálne okno - Prihlásenie -->
    <x-modal-login/>

    <!-- Nazov kategorie a Sort & Filter tlacitka -->
    <div class="container pt-3">
        <div class="row g-1 align-items-center">
            <div class="col">
                <h2 class="heading p-3 ms-1 main-headings">{{ $kategoria->meno }}</h2>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-secondary our-buttons dropdown-toggle smaller-text" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('resources/SortImage.svg') }}" class="top-bar-icons">
                    Zoradenie
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Pôvodné zoradenie</a></li>
                    <li><a class="dropdown-item" href="#">Najdrahšie</a></li>
                    <li><a class="dropdown-item" href="#">Najlacnejšie</a></li>
                    <li><a class="dropdown-item" href="#">S najvyššou akciou</a></li>
                    <li><a class="dropdown-item" href="#">S najnižšou akciou</a></li>
                    <li><a class="dropdown-item" href="#">Najpredávanejšie</a></li>
                    <li><a class="dropdown-item" href="#">Najmenej predávané</a></li>
                </ul>
            </div>
            <div class="col-auto">
                <div class="dropdown">
                    <button type="button" class="btn btn-secondary our-buttons dropdown-toggle smaller-text" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="{{ asset('resources/FilterImage.svg') }}" class="top-bar-icons">
                        Filtrovanie
                    </button>
                    <!-- Cena od a Cena do-->
                    <div class="dropdown-menu p-3 dropdown-menu-end" style="min-width: 300px;">
                        <label class="form-label highlight">Cena od:</label>
                        <output>0 €</output>
                        <input type="range" class="form-range mb-2" min="0" max="999" value="0" id="cenaSliderOd">
                        <label class="form-label highlight">Cena do:</label>
                        <output>999 €</output>
                        <input type="range" class="form-range mb-2" min="0" max="999" value="999" id="cenaSliderDo">
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-muted">0 €</small>
                            <small class="text-muted">999 €</small>
                        </div>

                        <!-- Typ -->
                        <label class="form-label highlight">Typ</label>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="typ1"><label class="form-check-label" for="typ1">Akčné</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="typ2"><label class="form-check-label" for="typ2">RPG</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="typ3"><label class="form-check-label" for="typ3">Športové</label></div>
                            </div>
                            <div class="col-6">
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="typ4"><label class="form-check-label" for="typ4">Stratégia</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="typ5"><label class="form-check-label" for="typ5">Simulácia</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="typ6"><label class="form-check-label" for="typ6">Adventúra</label></div>
                            </div>
                        </div>

                        <!-- Hodnotenie -->
                        <label class="form-label highlight">Minimálne hodnotenie:</label>
                        <div class="d-flex gap-2 mb-3">
                            <label class="form-label">0★</label>
                            <input type="range" class="form-range" min="0" max="5" id="range3">
                            <label class="form-label">5★</label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary w-50">Resetovať</button>
                            <button type="button" class="btn btn-primary w-50">Filtrovať</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produkty v danej Kategorii -->
    <div class="container text-center mt-3">
        @foreach($produkty->chunk(3) as $riadok)
            <div class="row justify-content-md-center mb-4">
                @foreach($riadok as $produkt)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card h-100">
                            <img src="{{ asset('resources/' . $produkt->meno . '.jpg') }}" 
                                 class="card-img-top card-image" 
                                 alt="{{ $produkt->meno }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $produkt->meno }}</h5>
                                <p class="card-text">{{ $produkt->popis }}</p>
                                <a href="/product/{{ $produkt->id }}" class="btn btn-secondary our-buttons">Objav produkt</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
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

    <x-paticka/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
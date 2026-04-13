<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            @if($kategoria)
                {{ $kategoria->meno }}
            @else
                Hľadanie
            @endif
        </title>
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
                <h2 class="heading p-3 ms-1 main-headings">
                    @if($kategoria)
                        {{ $kategoria->meno }}
                    @else
                        Hľadanie: "{{ $searchQuery }}"
                    @endif
                </h2>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-secondary our-buttons dropdown-toggle smaller-text" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('resources/SortImage.svg') }}" class="top-bar-icons">
                    Zoradenie
                </button>
                <ul class="dropdown-menu">
                    <!-- <li><a class="dropdown-item" href="#">Pôvodné zoradenie</a></li>
                    <li><a class="dropdown-item" href="#">Najdrahšie</a></li>
                    <li><a class="dropdown-item" href="#">Najlacnejšie</a></li>
                    <li><a class="dropdown-item" href="#">S najvyššou akciou</a></li>
                    <li><a class="dropdown-item" href="#">S najnižšou akciou</a></li>
                    <li><a class="dropdown-item" href="#">Najpredávanejšie</a></li>
                    <li><a class="dropdown-item" href="#">Najmenej predávané</a></li> -->
                        <li><a class="dropdown-item" href="{{ $baseUrl }}">Pôvodné zoradenie</a></li>
                        <li><a class="dropdown-item" href="{{ $baseUrl }}&sort=najdrahsie">Najdrahšie</a></li>
                        <li><a class="dropdown-item" href="{{ $baseUrl }}&sort=najlacnejsie">Najlacnejšie</a></li>
                        <li><a class="dropdown-item" href="{{ $baseUrl }}&sort=hodnotenie">Najlepšie hodnotené</a></li>
                    </ul>
                </ul>
            </div>
            <div class="col-auto">
                <div class="dropdown">
                    <button type="button" class="btn btn-secondary our-buttons dropdown-toggle smaller-text" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="{{ asset('resources/FilterImage.svg') }}" class="top-bar-icons">
                        Filtrovanie
                    </button>
                    <!-- Form pre Filtrovanie -->
                    <form method="GET" action="{{ $kategoria ? '/category/' . $kategoria->meno : '/search' }}">
                        @if(request('sort'))
                            <input type="hidden" name="sort" value="{{ request('sort') }}">
                        @endif
                        @unless($kategoria)
                            <input type="hidden" name="search-querry" value="{{ $searchQuery }}">
                        @endunless
                        <div class="dropdown-menu p-3 dropdown-menu-end" style="min-width: 300px;">
                            <!-- Filter by cena od -->
                            <label class="form-label highlight">Cena od:</label>
                            <output id="outputOd">{{ request('cena_od', 0) }} €</output>
                            <input type="range" class="form-range mb-2" min="0" max="999" 
                                value="{{ request('cena_od', 0) }}" 
                                name="cena_od" id="cenaSliderOd"
                                oninput="document.getElementById('outputOd').value = this.value + ' €'">
                            <div class="d-flex justify-content-between mb-2">
                                <small class="text-muted">0 €</small>
                                <small class="text-muted">999 €</small>
                            </div>
                            <!-- Filter by cena do -->
                            <label class="form-label highlight">Cena do:</label>
                            <output id="outputDo">{{ request('cena_do', 999) }} €</output>
                            <input type="range" class="form-range mb-2" min="0" max="999" 
                                value="{{ request('cena_do', 999) }}" 
                                name="cena_do" id="cenaSliderDo"
                                oninput="document.getElementById('outputDo').value = this.value + ' €'">
                            <div class="d-flex justify-content-between mb-2">
                                <small class="text-muted">0 €</small>
                                <small class="text-muted">999 €</small>
                            </div>

                            <!-- Filter by typ - zatial disabled, kym nie je v DB typ -->
                            <label class="form-label highlight">Typ</label>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ1" disabled><label class="form-check-label text-muted" for="typ1">Akčné</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ2" disabled><label class="form-check-label text-muted" for="typ2">RPG</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ3" disabled><label class="form-check-label text-muted" for="typ3">Športové</label></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ4" disabled><label class="form-check-label text-muted" for="typ4">Stratégia</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ5" disabled><label class="form-check-label text-muted" for="typ5">Simulácia</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="typ6" disabled><label class="form-check-label text-muted" for="typ6">Adventúra</label></div>
                                </div>
                            </div>
                            <!-- Filter by hodnotenie -->
                            <label class="form-label highlight">Minimálne hodnotenie:</label> <output id="outputHodnotenie">{{ request('hodnotenie', 0) }}★</output>
                            <div class="d-flex gap-2 mb-3">
                                <label class="form-label">0★</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5"
                                    name="hodnotenie" id="range3"
                                    value="{{ request('hodnotenie', 0) }}"
                                    oninput="document.getElementById('outputHodnotenie').value = this.value + '★'">
                                <label class="form-label">5★</label>
                            </div>
                            

                            <div class="d-flex gap-2 mt-2">
                                <a href="{{ $baseUrl }}" class="btn btn-outline-secondary w-50">Resetovať</a>
                                <button type="submit" class="btn btn-primary w-50">Filtrovať</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Produkty v danej Kategorii -->
    <div class="container text-center mt-3">
        @if ($produkty->isEmpty())
            <p class="smaller-text">Nenašiel sa žiaden produkt</p>
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
                                    <p class="card-text">{{ $produkt->popis }}<br>Cena: {{ $produkt->cena }}€<br>Hodnotenie: {{ $produkt->hodnotenie }}★</p>
                                    <a href="/product/{{ $produkt->id }}" class="btn btn-secondary our-buttons">Objav produkt</a>
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

    <x-paticka/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
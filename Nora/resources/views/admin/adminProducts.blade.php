<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Správa produktov</title>
        <link rel="icon" type="image/x-icon" href="../resources/NoraLogo.svg">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <x-topbar/>

    <!-- Menu Profilu Admina -->
    <x-menu-profilu-admina/>


    <!-- Zoznam Produktov -->
    <div class="container">
        <div class="row mt-2">
            <div class="col text-start">
                <h3 class="heading pt-2 ps-2 ms-1 main-headings">Prehľad Produktov</h3>
            </div>
            <div class="col text-end">
                <button type="button" class="btn btn-success create-button" data-bs-toggle="modal" data-bs-target="#add-new-product">Vytvoriť nový produkt</button>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success shadow-sm mb-0">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger shadow-sm mb-0">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger shadow-sm mb-0">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle smallest-text">
                <thead class="table-info">
                    <tr>
                        <th>Obrázok</th>
                        <th>ID produktu</th>
                        <th>Názov</th>
                        <th>Kategória</th>
                        <th>Typ</th>
                        <th>Cena</th>
                        <th>Skladom</th>
                        <th>Funkcie</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <!-- {{ var_dump($product) }} -->
                    <tr>
                        <td><img src="{{ asset('storage/' . $product->obrazok) }}" class="order-img"></td>
                        <td>#{{ $product->id }}</td>
                        <td>{{ $product->meno }}</td>
                        <td>{{ $product->category->meno ?? 'Bez kategórie' }}</td>
                        <td>{{ $product->typ }}</td>
                        <td>{{ number_format($product->cena, 2, ',', ' ') }}€</td>
                        <td>{{ $product->pocet_na_sklade }}</td>
                        <td class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary table-function-buttons" data-bs-toggle="modal" data-bs-target="#edit-product-{{ $product->id }}">
                                <img src="../resources/EditWhite.svg" class="table-function-buttons-icons"/>
                            </button>
                            <button type="button" class="btn btn-danger table-function-buttons" data-bs-toggle="modal" data-bs-target="#delete-product-{{ $product->id }}">
                                <img src="../resources/DeleteWhite.svg" class="table-function-buttons-icons"/>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 fw-bold">
                            Zatiaľ nie sú žiadne produkty.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modálne okno - Vytvorenie nového produktu -->
    <div class="modal fade" id="add-new-product" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="/adminProducts" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Vytvorenie nového produktu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-start">
                    <!-- Názov produktu -->
                    <div class="mb-3">
                        <label class="form-label">Názov produktu</label>
                        <input type="text" name="meno" class="form-control" required>
                    </div>
                    <div class="row">
                        <!-- Kategória -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategória</label>
                            <select class="form-select" name="kategoria_id" required>
                                <option value="" selected disabled>Vyber kategóriu</option>
                                <option value="1">Hry</option>
                                <option value="2">Konzoly</option>
                                <option value="3">Merch</option>
                                <option value="4">Figúrky</option>
                            </select>
                        </div>
                        <!-- Typ produktu -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Typ</label>
                            <input type="text" name="typ" class="form-control" placeholder="Akčné">
                        </div>
                    </div>
                    <!-- Popis produktu -->
                    <div class="mb-3">
                        <label class="form-label">Popis produktu</label>
                        <textarea name="popis" class="form-control" rows="3"></textarea>
                    </div>
                    <!-- Info o produkte -->
                    <div class="mb-3">
                        <label class="form-label">Info o produkte</label>
                        <textarea name="info" class="form-control" rows="5"></textarea>
                    </div>
                    <!-- Doplnkové info -->
                    <div class="mb-3">
                        <label class="form-label">Doplnkové info</label>
                        <textarea name="doplnkove_info" class="form-control" rows="1"></textarea>
                    </div>
                    <div class="row">
                        <!-- Cena -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cena (€)</label>
                            <input type="number" step="0.01" name="cena" class="form-control" required>
                        </div>
                        <!-- Množstvo -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Množstvo na sklade</label>
                            <input type="number" name="pocet_na_sklade" class="form-control" value="0">
                        </div>
                    </div>
                    <!-- Pridanie obrazkov pre produkt -->
                    <div class="mb-3">
                        <label class="form-label">Nahrať obrázky</label>
                        <input class="form-control" type="file" name="obrazky[]" multiple>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Vytvoriť produkt</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modalne okno pre edit produktu -->
    @foreach($products as $product)
        <div class="modal fade" id="edit-product-{{ $product->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="/adminProducts/{{ $product->id }}" method="POST" enctype="multipart/form-data" class="modal-content">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Editácia produktu: {{ $product->meno }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-start">
                        <div class="mb-3">
                            <label class="form-label">Názov produktu</label>
                            <input type="text" name="meno" class="form-control" value="{{ $product->meno }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategória</label>
                                <select class="form-select" name="kategoria_id" required>
                                    <option value="1" {{ $product->kategoria_id == 1 ? 'selected' : '' }}>Hry</option>
                                    <option value="2" {{ $product->kategoria_id == 2 ? 'selected' : '' }}>Konzoly</option>
                                    <option value="3" {{ $product->kategoria_id == 3 ? 'selected' : '' }}>Merch</option>
                                    <option value="4" {{ $product->kategoria_id == 4 ? 'selected' : '' }}>Figúrky</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Typ</label>
                                <input type="text" name="typ" class="form-control" value="{{ $product->typ }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Popis produktu</label>
                            <textarea name="popis" class="form-control" rows="3">{{ $product->popis }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Info o produkte</label>
                            <textarea name="info" class="form-control" rows="5">{{ $product->info }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Doplnkové info</label>
                            <textarea name="doplnkove_info" class="form-control" rows="1">{{ $product->doplnkove_info }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Cena (€)</label>
                                <input type="number" step="0.01" name="cena" class="form-control" value="{{ $product->cena }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Množstvo na sklade</label>
                                <input type="number" name="pocet_na_sklade" class="form-control" value="{{ $product->pocet_na_sklade }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Aktuálna galéria (označte pre vymazanie)</label>
                            <div class="d-flex flex-wrap gap-2 p-2 border rounded bg-light">
                                @forelse($product->obrazky as $img)
                                    <div class="position-relative">
                                        <img src="{{ asset($img->cesta) }}" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                        
                                        <div class="position-absolute bottom-0 end-0 bg-white border rounded-circle p-1" style="line-height: 0;">
                                            <input type="checkbox" name="odstranit_obrazky[]" value="{{ $img->id }}" class="form-check-input m-0" title="Odstrániť obrázok">
                                        </div>

                                        @if($img->hlavny)
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success" style="font-size: 0.6rem;">
                                                Main
                                            </span>
                                        @endif
                                    </div>
                                @empty
                                    <span class="text-muted small">Tento produkt nemá žiadne obrázky v galérii.</span>
                                @endforelse
                            </div>
                            <div class="form-text text-danger">Obrázky označené checkboxom budú po uložení odstránené.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pridať ďalšie obrázky</label>
                            <input class="form-control" type="file" name="obrazky[]" multiple>
                            <div class="form-text">Nové obrázky sa pridajú k existujúcej galérii.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">Uložiť zmeny</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Modalne okno pre delete produktu -->
        <div class="modal fade" id="delete-product-{{ $product->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/adminProducts/{{ $product->id }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Zmazať produkt?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Naozaj chcete natrvalo zmazať <strong>{{ $product->meno }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                        <button type="submit" class="btn btn-danger">Áno, vymazať</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
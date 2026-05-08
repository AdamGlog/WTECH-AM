<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Správa užívateľov</title>
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


    <!-- Zoznam Užívateľov -->
    <div class="container">
        <div class="row mt-2">
            <div class="col text-start">
                <h3 class="heading pt-2 ps-2 ms-1 main-headings">Prehľad Užívateľov</h3>
            </div>
            <div class="col text-end">
                <button type="button" class="btn btn-success create-button" data-bs-toggle="modal" data-bs-target="#create-user">Vytvoriť nového užívateľa</button>
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
                        <th>Profilový obrázok</th>
                        <th>Krstné meno</th>
                        <th>Priezvisko</th>
                        <th>Nickname</th>
                        <th>Telefónne číslo</th>
                        <th>Email</th>
                        <th>Ulica</th>
                        <th>Číslo domu</th>
                        <th>Mesto</th>
                        <th>PSČ</th>
                        <th>Typ člena</th>
                        <th>Rola</th>
                        <th>Funkcie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><img src="../resources/AccountImage.svg" class="order-img rounded-circle"></td>
                            <td>{{ $user->meno }}</td>
                            <td>{{ $user->priezvisko }}</td>
                            <td>{{ $user->nickname }}</td>
                            <td>{{ $user->telefonne_cislo }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->ulica }}</td>
                            <td>{{ $user->cislo_domu }}</td>
                            <td>{{ $user->mesto->mesto }}</td>
                            <td>{{ $user->mesto->psc }}</td>
                            <td>{{ $user->typClena->uroven }}</td>
                            <td>
                                @if($user->role->name === 'ADMIN')
                                    <span class="badge bg-primary">Admin</span>
                                @else
                                    <span class="badge bg-secondary">Zákazník</span>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center gap-1">
                                <button type="button" class="btn btn-primary table-function-buttons" data-bs-toggle="modal" data-bs-target="#edit-user-{{ $user->id }}">
                                    <img src="{{ asset('resources/EditWhite.svg') }}" class="table-function-buttons-icons"/>
                                </button>
                                <button type="button" class="btn btn-danger table-function-buttons" data-bs-toggle="modal" data-bs-target="#delete-user-{{ $user->id }}">
                                    <img src="{{ asset('resources/DeleteWhite.svg') }}" class="table-function-buttons-icons"/>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($users as $user)
        <!-- Modálne okno - Upravenie existujuceho uzivatela -->
        <div class="modal fade" id="edit-user-{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="/adminUsers/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="modal-content text-start">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Upravenie užívateľa: {{ $user->meno }} {{ $user->priezvisko }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Meno a priezvisko</label>
                            <div class="input-group">
                                <input type="text" name="meno" class="form-control" value="{{ $user->meno }}" required>
                                <input type="text" name="priezvisko" class="form-control" value="{{ $user->priezvisko }}" required>    
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nickname</label>
                            <input type="text" name="nickname" class="form-control" value="{{ $user->nickname }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Profilový obrázok</label>
                            <div class="mb-2">
                                @if($user->profilovka_url)
                                    <img src="{{ asset('storage/' . $user->profilovka_url) }}" class="img-thumbnail" style="width:80px;">
                                @else
                                    <img src="{{ asset('resources/AccountImage.svg') }}" class="img-thumbnail" style="width:80px;">
                                @endif
                            </div> 
                            <input class="form-control" type="file" name="profilovka_url">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telefónne číslo</label>
                            <input type="text" name="telefonne_cislo" class="form-control" value="{{ $user->telefonne_cislo }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="typ_clena" class="form-label">Typ členstva (Zľava)</label>
                                <select class="form-select" name="typ_clena" id="typ_clena">
                                    <option value="1" {{ $user->typ_clena == 1 ? 'selected' : '' }}>klasický</option>
                                    <option value="2" {{ $user->typ_clena == 2 ? 'selected' : '' }}>lepší</option>
                                    <option value="3" {{ $user->typ_clena == 3 ? 'selected' : '' }}>pravidelný</option>
                                    <option value="4" {{ $user->typ_clena == 4 ? 'selected' : '' }}>profesionálny</option>
                                    <option value="5" {{ $user->typ_clena == 5 ? 'selected' : '' }}>legendárny</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Rola</label>
                                <select class="form-select" name="role">
                                    <option value="1" {{ $user->role->value == 1 ? 'selected' : '' }}>Zákazník</option>
                                    <option value="2" {{ $user->role->value == 2 ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Adresa</label>
                            <div class="input-group">
                                <input type="text" name="ulica" class="form-control" value="{{ $user->ulica }}" placeholder="Ulica">
                                <input type="text" name="cislo_domu" class="form-control" value="{{ $user->cislo_domu }}" placeholder="Číslo">    
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ID mesta (PSC)</label>
                            <input type="text" name="mesto_psc" class="form-control" value="{{ $user->mesto_psc }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Heslo (Ponechajte prázdne, ak nechcete meniť)</label>
                            <input type="password" name="heslo" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Uložiť zmeny</button>    
                    </div>
                </form>
            </div>
        </div>

        <!-- Modálne okno - Vymazanie užívateľa -->
        <div class="modal fade" id="delete-user-{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/adminUsers/{{ $user->id }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header text-start">
                        <h1 class="modal-title fs-5">Vymazanie užívateľa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-start">
                        <p>Naozaj chcete vymazať užívateľa <strong>{{ $user->meno }} {{ $user->priezvisko }}</strong>?</p>
                        <p class="text-danger small">Táto akcia je nevratná.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrušiť</button>
                        <button type="submit" class="btn btn-danger">Áno, vymazať</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Modálne okno - Vytvorenie nového užívateľa -->
    <div class="modal fade" id="create-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="/adminUsers" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Vytvorenie nového užívateľa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Meno užívateľa -->
                    <div class="mb-3">
                        <label class="form-label">Meno a priezvisko</label>
                        <div class="input-group mb-3">
                            <input type="text" name="meno" class="form-control" placeholder="Meno" required>
                            <span class="input-group-text"> </span>
                            <input type="text" name="priezvisko" class="form-control" placeholder="Priezvisko" required>    
                        </div>
                    </div>

                    <!-- Prezývka užívateľa -->
                    <div class="mb-3">
                        <label for="nickname" class="form-label">Nickname užívateľa</label>
                        <input type="text" name="nickname" id="nickname" class="form-control">
                    </div>

                    <!-- Profilovka užívateľa -->
                    <div class="mb-3">
                        <label for="profilovka_url" class="form-label smaller-text">Vložiť profilový obrázok</label>
                        <input class="form-control smaller-text" type="file" name="profilovka_url" id="profilovka_url">
                    </div>

                    <!-- Telefónne číslo -->
                    <div class="mb-3">
                        <label class="form-label">Telefónne číslo</label>
                        <div class="input-group mb-3">
                            <select class="form-select" style="max-width: 100px;">
                                <option value="+421" selected>+421</option>
                                <option value="+420">+420</option>
                            </select>
                            <input type="text" name="telefonne_cislo" class="form-control">
                        </div>
                    </div>

                    <!-- Email a Heslo (Heslo je povinné pri vytváraní!) -->
                    <div class="mb-3">
                        <label class="form-label">Email užívateľa</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Heslo (dočasné)</label>
                        <input type="password" name="heslo" class="form-control" required>
                    </div>

                    <div class="row">
                        <!-- Typ užívateľa -->
                        <div class="col-md-6 mb-3">
                            <label for="typ_clena" class="form-label">Typ členstva (Zľava)</label>
                            <select class="form-select" name="typ_clena" id="typ_clena">
                                <option value="1" selected>klasický</option>
                                <option value="2">lepší</option>
                                <option value="3">pravidelný</option>
                                <option value="4">profesionálny</option>
                                <option value="5">legendárny</option>
                            </select>
                        </div>

                        <!-- Rola užívateľa -->
                        <div class="col-md-6 mb-3">
                            <label for="role" class="form-label">Rola užívateľa (Práva)</label>
                            <select class="form-select" name="role" id="role">
                                <option value="1" selected>Zákazník</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                    </div>

                    <!-- Bydlisko užívateľa -->
                    <div class="mb-3">
                        <label class="form-label">Adresa užívateľa</label>
                        <div class="input-group mb-3">
                            <input type="text" name="ulica" class="form-control" placeholder="Ulica">
                            <span class="input-group-text">,</span>
                            <input type="text" name="cislo_domu" class="form-control" placeholder="Číslo domu">    
                        </div>
                    </div>

                    <!-- PSČ užívateľa -->
                    <div class="mb-3">
                        <label for="mesto_psc" class="form-label">ID mesta / PSČ</label>
                        <input type="text" name="mesto_psc" id="mesto_psc" class="form-control">
                    </div>
                </div>

                <div class="modal-footer d-flex flex-column align-items-center">
                    <button type="submit" class="btn btn-primary">Vytvoriť užívateľa</button>    
                </div>
            </form>
        </div>
    </div>


    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
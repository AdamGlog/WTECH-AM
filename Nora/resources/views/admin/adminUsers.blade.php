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
                            <td class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary table-function-buttons" data-bs-toggle="modal" data-bs-target="#edit-user">
                                <img src="../resources/EditWhite.svg" class="table-function-buttons-icons"/>
                            </button>
                            <button type="button" class="btn btn-danger table-function-buttons" data-bs-toggle="modal" data-bs-target="#delete-user">
                                <img src="../resources/DeleteWhite.svg" class="table-function-buttons-icons"/>
                            </button>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


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

    <!-- Modálne okno - Editovanie existujúceho užívateľa -->
    <div class="modal fade" id="edit-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Upravenie existujúceho užívateľa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Meno užívateľa -->
                <div class="mb-3">
                    <label for="productName" class="form-label">Meno a priezvisko</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Momentálne Meno" aria-label="Meno">
                        <span class="input-group-text"> </span>
                        <input type="text" class="form-control" placeholder="Momentálne Priezvisko" aria-label="Priezvisko">    
                    </div>
                </div>
                <!-- Prezývka užívateľa -->
                <div class="mb-3">
                    <label for="productQuantity" class="form-label">Nickname užívateľa</label>
                    <input type="text" class="form-control" placeholder="Nastavený nickname" aria-label="Nickname">
                </div>
                <!-- Profilovka užívateľa -->
                <div class="mb-3">
                    <label for="formFile" class="form-label smaller-text">Vložiť nový profilový obrázok</label>
                    <div class="position-relative">
                        <img src="../resources/profile.svg" class="img-thumbnail" style="width:100px; height:100px;">
                        <label for="formFile" class="form-label smaller-text">Aktuálna profilovka</label>
                    </div> 
                    <input class="form-control smaller-text" type="file" id="formFile">
                </div>
                <!-- Telefónne číslo -->
                <div class="mb-3">
                    <label for="productName" class="form-label">Telefónne číslo</label>
                    <div class="input-group mb-3">
                        <select class="form-select" style="max-width: 100px;">
                            <option value="+421" selected>+421</option>
                            <option value="+420">+420</option>
                            <option value="+48">+48</option>
                        </select>
                        <input type="text" class="form-control" placeholder="Momentálne tel. číslo">
                    </div>
                </div>
                <!-- Email užívateľa -->
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Email užívateľa</label>
                    <input type="text" class="form-control" placeholder="Momentálny Email">
                </div>
                <!-- Typ užívateľa -->
                <div class="mb-3">
                    <label for="productCategory" class="form-label">Typ členstva</label>
                    <select class="form-select" id="productCategory">
                    <option selected>klasický</option>
                    <option value="1">lepší</option>
                    <option value="2">pravideľný</option>
                    <option value="3">profesionálny</option>
                    <option value="4">legendárny</option>
                    <option value="5">admin</option>
                    </select>
                </div>
                <!-- Bydlisko užívateľa -->
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Adresa užívateľa</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Momentálna ulica" aria-label="Ulica">
                        <span class="input-group-text">,</span>
                        <input type="text" class="form-control" placeholder="Momentálne číslo domu" aria-label="Číslo domu">    
                    </div>
                </div>
                <!-- PSČ užívateľa -->
                <div class="mb-3">
                    <label for="productQuantity" class="form-label">PSČ mesta adresy</label>
                    <input type="text" class="form-control" placeholder="Momentálne nastavené PSC" aria-label="PSC mesta">
                </div>
            </div>
            <div class="modal-footer d-flex flex-column align-items-center">
                <button type="button" class="btn btn-primary">Uložiť editovaného užívateľa</button>    
            </div>
            </div>
        </div>
    </div>

    <!-- Modálne okno - Vymazanie užívateľa -->
    <div class="modal fade" id="delete-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Potvrdenie vymazania užívateľa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Ste si istý, že chcete vymazať tohto užívateľa?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
            <button type="button" class="btn btn-danger">Áno, natrvalo vymazať</button>
        </div>
        </div>
    </div>
    </div>


    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
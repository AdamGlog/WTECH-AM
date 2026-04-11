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
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle smallest-text">
                <thead class="table-info">
                    <tr>
                        <th>Profilový obrázok</th>
                        <th>Krstné meno</th>
                        <th>Priezvisko</th>
                        <th>Telefónne číslo</th>
                        <th>Email</th>
                        <th>Ulica</th>
                        <th>Číslo domu</th>
                        <th>Mesto</th>
                        <th>PSČ</th>
                        <th>Typ člena</th>
                        <th>Funkcie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><img src="../resources/AccountImage.svg" class="order-img rounded-circle"></td>
                            <td>{{ $user->meno }}</td>
                            <td>{{ $user->priezvisko }}</td>
                            <td>{{ $user->telefonne_cislo }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->ulica }}</td>
                            <td>{{ $user->cislo_domu }}</td>
                            <td>{{ $user->mesto }}</td>
                            <td>{{ $user->mesto_psc }}</td>
                            <td>{{ $user->typ_clena }}</td>
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
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Vytvorenie nového užívateľa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Meno užívateľa -->
                <div class="mb-3">
                    <label for="productName" class="form-label">Meno a priezvisko</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Meno" aria-label="Meno">
                        <span class="input-group-text"> </span>
                        <input type="text" class="form-control" placeholder="Priezvisko" aria-label="Priezvisko">    
                    </div>
                </div>
                <!-- Prezývka užívateľa -->
                <div class="mb-3">
                    <label for="productQuantity" class="form-label">Nickname užívateľa</label>
                    <input type="text" class="form-control" aria-label="Nickname">
                </div>
                <!-- Profilovka užívateľa -->
                <div class="mb-3">
                    <label for="formFile" class="form-label smaller-text">Vložiť profilový obrázok</label>
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
                        <input type="text" class="form-control">
                    </div>
                </div>
                <!-- Email užívateľa -->
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Email užívateľa</label>
                    <input type="text" class="form-control">
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
                        <input type="text" class="form-control" placeholder="Ulica" aria-label="Ulica">
                        <span class="input-group-text">,</span>
                        <input type="text" class="form-control" placeholder="Číslo domu" aria-label="Číslo domu">    
                    </div>
                </div>
                <!-- PSČ užívateľa -->
                <div class="mb-3">
                    <label for="productQuantity" class="form-label">PSČ mesta adresy</label>
                    <input type="text" class="form-control" aria-label="PSC mesta">
                </div>
            </div>
            <div class="modal-footer d-flex flex-column align-items-center">
                <button type="button" class="btn btn-primary">Vytvoriť užívateľa</button>    
            </div>
            </div>
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
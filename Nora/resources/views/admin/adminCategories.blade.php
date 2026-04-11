<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Správa kategórií</title>
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

    <!-- Zoznam Kategórií -->
    <div class="container">
        <div class="row mt-2">
            <div class="col text-start">
                <h3 class="heading pt-2 ps-2 ms-1 main-headings">Prehľad Kategórií</h3>
            </div>
            <div class="col text-end">
                <button type="button" class="btn btn-success create-button" data-bs-toggle="modal" data-bs-target="#add-new-category">Vytvoriť novú kategóriu</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle smallest-text">
                <thead class="table-info">
                    <tr>
                        <th>ID kategórie</th>
                        <th>Názov</th>
                        <th>Počet produktov</th>
                        <th>Funkcie</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Hry</td>
                        <td>24</td>
                        <td class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary table-function-buttons" data-bs-toggle="modal" data-bs-target="#edit-category">
                                <img src="../resources/EditWhite.svg" class="table-function-buttons-icons"/>
                            </button>
                            <button type="button" class="btn btn-danger table-function-buttons" data-bs-toggle="modal" data-bs-target="#delete-category">
                                <img src="../resources/DeleteWhite.svg" class="table-function-buttons-icons"/>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Konzoly</td>
                        <td>8</td>
                        <td class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary table-function-buttons" data-bs-toggle="modal" data-bs-target="#edit-category">
                                <img src="../resources/EditWhite.svg" class="table-function-buttons-icons"/>
                            </button>
                            <button type="button" class="btn btn-danger table-function-buttons" data-bs-toggle="modal" data-bs-target="#delete-category">
                                <img src="../resources/DeleteWhite.svg" class="table-function-buttons-icons"/>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Merch</td>
                        <td>15</td>
                        <td class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary table-function-buttons" data-bs-toggle="modal" data-bs-target="#edit-category">
                                <img src="../resources/EditWhite.svg" class="table-function-buttons-icons"/>
                            </button>
                            <button type="button" class="btn btn-danger table-function-buttons" data-bs-toggle="modal" data-bs-target="#delete-category">
                                <img src="../resources/DeleteWhite.svg" class="table-function-buttons-icons"/>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modálne okno - Vytvorenie novej kategórie -->
    <div class="modal fade" id="add-new-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Vytvorenie novej kategórie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Názov kategórie -->
                <div class="mb-3">
                    <label for="productName" class="form-label">Názov kategórie</label>
                    <input type="text" class="form-control" id="productName">
                </div>
                <!-- Popis kategórie -->
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Popis kategórie</label>
                    <textarea class="form-control" id="productDescription" rows="6"></textarea>
                </div>
                <!-- Počet produktov v nej -->
                <div class="mb-3">
                    <label for="productQuantity" class="form-label">Počet produktov v kategórii</label>
                    <input type="number" class="form-control" id="productQuantity" placeholder="0" min="0" step="1">
                </div>
            </div>
            <div class="modal-footer d-flex flex-column align-items-center">
                <button type="button" class="btn btn-primary">Vytvoriť kategóriu</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modálne okno - Editovanie kategórie -->
    <div class="modal fade" id="edit-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editovanie kategórie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Názov kategórie -->
                <div class="mb-3">
                    <label for="productName" class="form-label">Názov kategórie</label>
                    <input type="text" class="form-control" id="productName" placeholder="Existujúci názov kategórie tu">
                </div>
                <!-- Popis kategórie -->
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Popis kategórie</label>
                    <textarea class="form-control" id="productDescription" rows="6" placeholder="Momentálny popis kategórie"></textarea>
                </div>
                <!-- Počet produktov v nej -->
                <div class="mb-3">
                    <label for="productQuantity" class="form-label">Množstvo</label>
                    <input type="number" class="form-control" id="productQuantity" placeholder="Momentálne množstvo produktov v kategórii tu" min="0" step="1">
                </div>
            </div>
            <div class="modal-footer d-flex flex-column align-items-center">
                <button type="button" class="btn btn-primary">Uložiť editovanú kategóriu</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modálne okno - Vymazanie kategórie -->
    <div class="modal fade" id="delete-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Potvrdenie vymazania kategórie</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Ste si istý, že chcete vymazať túto kategóriu?</p>
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
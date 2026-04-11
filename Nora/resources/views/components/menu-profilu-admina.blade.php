<!-- Menu Profilu Admina -->
    <div class="container">
        <div class="row g-0 flex-nowrap">
            <div class="col">
                <div class="d-grid menu-button-left" role="group" aria-label="Basic example">
                    <a href="/profileOverview" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons pe-2">Prehľad Účtu</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid" role="group" aria-label="Basic example">
                    <a href="/adminCategories" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons">Kategórie</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid" role="group" aria-label="Basic example">
                    <a href="/adminProducts" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons">Produkty</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid" role="group" aria-label="Basic example">
                    <a href="/adminUsers" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons">Užívatelia</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid menu-button" role="group" aria-label="Basic example">
                    <a href="/adminOrders" type="button" class="btn btn-secondary menu-buttons-last our-buttons profile-menu-buttons">Objednávky</a>
                </div>
            </div>
            <div class="col">
                <div class="d-grid menu-button" role="group" aria-label="Basic example">
                    <a href="/adminDashboard" type="button" class="btn btn-secondary menu-buttons-last our-buttons profile-menu-buttons">Admin</a>
                </div>
            </div>
            <!-- <div class="col">
                <div class="d-grid menu-button-right" role="group" aria-label="Basic example">
                    <a href="/" type="button" class="btn btn-danger our-buttons-logout profile-menu-buttons">Odhlásiť</a>
                </div>
            </div> -->
            <div class="col">
                <div class="d-grid menu-button-right">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger our-buttons-logout profile-menu-buttons w-100">Odhlásiť</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
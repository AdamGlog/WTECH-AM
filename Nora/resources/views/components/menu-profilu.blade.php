<!-- Menu Profilu -->
<div class="container">
    <div class="row g-0 flex-nowrap">
        <div class="col">
            <div class="d-grid menu-button-left">
                <a href="/profileOverview" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons pe-2">Prehľad Účtu</a>
            </div>
        </div>
        <div class="col">
            <div class="d-grid">
                <a href="/profileOrders" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons">Objednávky</a>
            </div>
        </div>
        <div class="col">
            <div class="d-grid">
                <a href="/profileFavourites" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons">Obľúbené</a>
            </div>
        </div>
        <div class="col">
            <div class="d-grid">
                <a href="/profileData" type="button" class="btn btn-secondary menu-buttons our-buttons profile-menu-buttons">Údaje</a>
            </div>
        </div>
        <div class="col">
            <div class="d-grid menu-button">
                <a href="/profilePrivacy" type="button" class="btn btn-secondary menu-buttons-last our-buttons profile-menu-buttons">Súkromie</a>
            </div>
        </div>
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
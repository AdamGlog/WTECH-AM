<!--Top bar Stranky-->
<div class="container">
    <div class="row align-items-center g-1">
        <div class="col-auto">
            <a href="/">
                <img src="{{ asset('resources/NoraLogo.svg') }}" class="top-logo">
            </a>
        </div>
        <div class="col search-area">
            <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search"/>   
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-success our-buttons top-bar-sizes bar-buttons" type="submit">
                <img src="{{ asset('resources/search.svg') }}" class="top-bar-icons bar-icon-black">
                <img src="{{ asset('resources/searchWhite.svg') }}" class="top-bar-icons bar-icon-white">
            </button>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-secondary our-buttons top-bar-sizes bar-buttons" data-bs-toggle="modal" data-bs-target="#profil">
                <img src="{{ asset('resources/profile.svg') }}" class="top-bar-icons bar-icon-black">
                <img src="{{ asset('resources/profileWhite.svg') }}" class="top-bar-icons bar-icon-white">
            </button>
        </div>
        <div class="col-auto">
            <a href="/cart">
                <button type="button" class="btn btn-secondary our-buttons top-bar-sizes bar-buttons">
                    <img src="{{ asset('resources/ShopCart.svg') }}" class="top-bar-icons bar-icon-black">
                    <img src="{{ asset('resources/ShopCartWhite.svg') }}" class="top-bar-icons bar-icon-white">
                </button>
            </a>
        </div>    
    </div>
</div>
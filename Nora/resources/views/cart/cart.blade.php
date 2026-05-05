<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Košík</title>
        <link rel="icon" type="image/x-icon" href="../resources/NoraLogo.svg">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <x-topbar/>

    <!--Menu kategorii-->
    <x-menu-kategorii/>
    
    <!-- Modálne okno - Prihlásenie -->
    <x-modal-login/>

    <!--Košík vypísaný-->
    <div class="container mt-4">
        <h3 class="main-headings">Obsah Košíka:</h3>
        <div class="border rounded p-3 bg-light">
            <!--Orientačné čísla-->
            <div class="d-flex align-items-center justify-content-center gap-3 mb-4">
                <div class="d-flex align-items-center gap-2">
                <span class="step-circle active">1</span>
                <span class="step-label active">Košík</span>
                </div>
                <div class="step-line"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle">2</span>
                    <span class="step-label">Doprava a platba</span>
                </div>
                <div class="step-line"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle">3</span>
                    <span class="step-label">Dodacie údaje</span>
                </div>
                <div class="step-line"></div>
                <div class="d-flex align-items-center gap-2">
                    <span class="step-circle">4</span>
                    <span class="step-label">Sumár</span>
                </div>
            </div>
            <!-- Položky v košíku -->
            @if(session('cart') && count(session('cart')) > 0)
                @foreach(session('cart') as $id => $item)
                    <div class="d-flex align-items-center border rounded bg-white p-2 mb-2 flex-wrap kosik-item" data-id="{{ $id }}">
                        <img src="{{ asset('resources/' . ($item['image'] ?? '') . '.webp') }}" height="50" class="me-3" alt="{{ $item['meno'] }}">
                        <span class="me-2 kosik-item-name highlight">{{ $item['meno'] }}</span>
                        <div class="kosik-item-controls ms-auto d-flex align-items-center gap-2">
                            <span>Počet ks.</span>
                            <!-- Odstrániť -->
                            <button type = "button" class="btn btn-danger btn-sm" onclick="zmenMnozstvo({{ $id }}, -{{ $item['pocet'] }})">✕</button>
                            <!-- Tlačidlá pre počet -->
                            <button class="btn-qty btn-qty-prev centering" onclick="zmenMnozstvo({{ $id }}, -1)">
                                <img src="{{ asset('resources/ArrowBack.svg') }}" height="20">
                            </button>
                            <span type="button" class="kosik-qty" id="qty-{{ $id }}">{{ $item['pocet'] }}</span>
                            <button class="btn-qty btn-qty-next" onclick="zmenMnozstvo({{ $id }}, 1)">
                                <img src="{{ asset('resources/ArrowForward.svg') }}" height="20">
                            </button>
                            <!--<span class="fw-bold">{{ number_format($item['cena'], 2) }} €</span>-->
                            <span class="fw-bold" id="sum-{{ $id }}">
                                {{ number_format($item['pocet'] * $item['cena'], 2) }} €
                            </span>
                        </div>
                    </div>
                @endforeach
                <!-- Celková suma -->
                <div class="d-flex justify-content-between fw-bold fs-5">
                    <span>Spolu</span>
                    <span>
                        {{ number_format(
                            collect(session('cart'))->sum(function($item) {
                                return $item['pocet'] * $item['cena'];
                            }), 2) }} €
                    </span>
                </div>
                @else
                <div class="alert alert-info text-center py-5">
                    <p class="fs-5">Váš košík je prázdny.</p>
                </div>
            @endif

            <!-- Pokračovať -->
            <div class="d-flex justify-content-end mt-2">
                <a href="/cartShipment">
                    <button class="btn cart-pokracovat">Pokračovať</button>
                </a>
            </div>
        </div>
    </div>
      
    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- Logika vytvorená pomocou Gemini AI https://gemini.google.com/app -->
    <script>
    async function zmenMnozstvo(id, zmena){
        //odoslanie req
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('id', id);
        formData.append('zmena', zmena);
        try{
            const response = await fetch('/kosik/update', {
                method: 'POST',
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                body: formData
            });
            const data = await response.json();
            //spracujeme polozku updateom alebo vymazaniim
            if (data.success){
                const item = data.items.find(i => Number(i.id) === Number(id));
                if(!item){
                    document.querySelector(`.kosik-item[data-id="${id}"]`)?.remove();
                } 
                else{
                    const qtyEl = document.getElementById('qty-' + id);
                    if(qtyEl){
                        qtyEl.textContent = item.pocet;
                    }
                }
                // aktualizácia ceny konkrétneho riadku
                    const rowSumEl = document.getElementById('sum-' + id);
                    if (rowSumEl && item){
                        const newSum = (item.pocet * item.cena).toFixed(2);
                        rowSumEl.textContent = newSum + ' €';
                    }
                //celkova suma aktualizujeme
                const totalEl = document.querySelector('.d-flex.justify-content-between.fw-bold.fs-5 span:last-child');
                if(totalEl){ 
                    totalEl.textContent = data.total + ' €';
                }
                //ak je kosik praydny tak reload sa spravi
                if(data.cart_empty){
                    //location.reload();
                    document.querySelector('.border.rounded.p-3.bg-light').innerHTML = 
                    `<div class="alert alert-info text-center py-5">
                            <p class="fs-5">Váš košík je prázdny.</p>
                        </div>`;
                }
            }
        } 
        catch (error){
            console.error(error);
            alert('Chyba pri aktualizácii košíka');
        }
    }
    </script>
</body>
</html>
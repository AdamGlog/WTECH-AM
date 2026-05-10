<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Správa objednávok</title>
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


    <!-- Zoznam Objednávok -->
    <div class="container">
        <div class="row mt-2">
            <div class="col text-start">
                <h3 class="heading pt-2 ps-2 ms-1 main-headings">Prehľad Objednávok</h3>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle smallest-text">
                <thead class="table-info">
                    <tr>
                        <th>ID objednávky</th>
                        <th>Užívateľ</th>
                        <th>Dátum</th>
                        <th>Cena</th>
                        <th>Stav</th>
                        <th>Typ doručenia</th>
                        <th>Typ platby</th>
                        <th>Produkty</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->user->nickname ?? 'Neznámy' }}</td>
                        <td>{{ $order->datum_objednania?->format('d.m.Y') }}</td>
                        <td>{{ number_format($order->celkova_cena, 2) }} €</td>
                        <td>{{ $order->stav->value }}
                        </td>
                        <td>{{ ucfirst($order->typ_dorucenia->value) }}</td>
                        <td>{{ ucfirst($order->typ_platby->value) }}</td>
                        <!--produkty s obrazkami-->
                            <td>
                                @foreach($order->items as $item)
                                <div class="produkt-riadok">
                                    @if($item->product)
                                        <img src="{{ asset('storage/' . $item->product->obrazok) }}" class="produkt-img ">
                                        <div>
                                            {{ $item->product->meno }}<br>
                                            {{ $item->pocet }} ks
                                        </div>
                                    @else
                                        <span>Chýba produkt (ID: {{ $item->product_id }})</span>
                                    @endif
                                </div>
                            @endforeach
                            @if($order->items->count() > 4)
                                <div class = "viac-admin-produktov-v-orders">
                                    + {{ $order->items->count() - 4 }} ďalšie
                                </div>
                            @endif
                            </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">Žiadne objednávky nenájdené.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Paticka -->
    <x-paticka/>


    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
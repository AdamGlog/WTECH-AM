<!doctype html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Objednávky</title>
        <link rel="icon" type="image/x-icon" href="../resources/NoraLogo.svg">
        <!-- CSS z Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet">
    </head>
    <body class="body-bg">
    <!--Top bar Stranky-->
    <x-profile-topbar/>
    
    <!--Menu Profilu-->
    <x-menu-profilu/>

    <!-- Zoznam Objednavok -->
    <div class="container">
        <h3 class="heading pt-2 ps-2 ms-1 main-headings">Prehľad Objednávok</h3>
        <table class="table table-bordered text-center align-middle smallest-text">
            <thead class="table-secondary">
                <tr>
                    <th>Dátum</th>
                    <th>ID objednávky</th>
                    <th>Cena</th>
                    <th>Stav</th>
                    <th>Produkty</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <!-- Dátum -->
                        <td>{{ $order->datum_objednania->format('d.m.Y') }}</td>
                        
                        <!-- ID objednávky -->
                        <td>{{ $order->id }}</td>
                        
                        <!-- Cena -->
                        <td>{{ number_format($order->celkova_cena, 2, ',', ' ') }}€</td>
                        
                        <!-- Stav (ak má tvoj Enum metódu label() alebo hodnotu value) -->
                        <td>{{ $order->stav->value ?? $order->stav }}</td>
                        
                        <!-- Produkty -->
                        <td class="text-end">
                            @foreach($order->items as $item)
                                @if($item->product)
                                    <img src="{{ asset('resources/' . $item->product->obrazok . '.webp') }}" 
                                        class="order-img" 
                                        title="{{ $item->product->nazov }}"
                                        alt="{{ $item->product->nazov }}">
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center">Nemáte žiadne objednávky.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
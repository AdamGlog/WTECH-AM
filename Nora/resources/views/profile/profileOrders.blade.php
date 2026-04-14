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
                <tr>
                    <td>6.3.2026</td>
                    <td>619574558</td>
                    <td>259,99€</td>
                    <td>pripravuje sa</td>
                    <td class="text-end">
                        <img src="../resources/CapPOF.webp" class="order-img">
                        <img src="../resources/CapPOF.webp" class="order-img">
                        <img src="../resources/CapPOF.webp" class="order-img">
                        <img src="../resources/CapPOF.webp" class="order-img">
                    </td>
                </tr>
                <tr>
                    <td>7.9.2025</td>
                    <td>619574557</td>
                    <td>959,99€</td>
                    <td>vybavená</td>
                    <td class="text-end">
                        <img src="../resources/CapPOF.webp" class="order-img">
                        <img src="../resources/CapPOF.webp" class="order-img">
                        <img src="../resources/CapPOF.webp" class="order-img">
                    </td>
                </tr>
                <tr>
                    <td>18.04.2025</td>
                    <td>619574556</td>
                    <td>19,99€</td>
                    <td>vybavená</td>
                    <td class="text-end">
                        <img src="../resources/CapPOF.webp" class="order-img">
                    </td>
                </tr>
                <tr>
                    <td>10.11.2024</td>
                    <td>619574555</td>
                    <td>629,99€</td>
                    <td>zrušená</td>
                    <td class="text-end">
                        <img src="../resources/CapPOF.webp" class="order-img">
                        <img src="../resources/CapPOF.webp" class="order-img">
                        <img src="../resources/CapPOF.webp" class="order-img">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Paticka -->
    <x-paticka/>

    <!-- JS z Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
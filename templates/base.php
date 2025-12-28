<?php
require_once 'utils/functions.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $templateParams["titolo"]; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/<?= $templateParams["css_file"]; ?>">
</head>

<body>

<?php if (!empty($templateParams["usa_sidebar"]) && $templateParams["usa_sidebar"] === true): ?>

    <!-- NAVBAR -->
    <nav class="navbar navbar-light shadow-sm px-3">
        <button class="btn btn-light"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebar"
                aria-controls="sidebar">
            <i class="bi bi-list"></i>
        </button>
        <span class="fw-bold ms-2 text-white">Università di Bologna</span>
    </nav>

    <!-- SIDEBAR -->
    <div class="offcanvas offcanvas-start sidebar-bg" tabindex="-1" id="sidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">
                <?= getUserRole() === 'admin' ? 'Menu Admin' : 'Menu Utente'; ?>
            </h5>
            <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="offcanvas"
                    aria-label="Chiudi"></button>
        </div>

        <div class="offcanvas-body">
            <?php
            if (getUserRole() === 'admin') {
                require 'templates/sidebar.php';
            } else {
                require 'templates/sidebar_utente.php';
            }
            ?>
        </div>
    </div>

    <!-- CONTENUTO -->
    <main class="container py-5 vh-100 flex-column">
        <?php require $templateParams["nome"]; ?>
    </main>

<?php else: ?>

    <div class="d-flex justify-content-center align-items-center flex-column vh-100">

        <?php if (!empty($templateParams["show_welcome"])): ?>
            <header class="container py-5 text-center">
                <h1 class="fw-bold display-3">Benvenuto!</h1>
                <h2 class="h5 fs-6">Scambia qui i tuoi appunti</h2>
            </header>
        <?php endif; ?>

        <main class="container">
            <?php require $templateParams["nome"]; ?>
        </main>
    </div>

<?php endif; ?>

<!-- FOOTER -->
<footer class="footer py-4 px-4 text-white">
    <h3 class="h6 fw-bold">Contatti</h3>
    <p class="mb-1">Contattaci alle nostre mail</p>

    <ul class="list-unstyled mb-0">
        <li>
            <a class="text-white text-decoration-none"
               href="mailto:elena.fucci3@studio.unibo.it">
                elena.fucci3@studio.unibo.it
            </a>
        </li>
        <li>
            <a class="text-white text-decoration-none"
               href="mailto:leonardo.damario@studio.unibo.it">
                leonardo.damario@studio.unibo.it
            </a>
        </li>
        <li>
            <a class="text-white text-decoration-none"
               href="mailto:maddalena.prandini@studio.unibo.it">
                maddalena.prandini@studio.unibo.it
            </a>
        </li>
    </ul>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $templateParams["titolo"]; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css/<?php echo $templateParams["css_file"]; ?>">
</head>

<body>

    <?php if(isset($templateParams["usa_sidebar"]) && $templateParams["usa_sidebar"] === true): ?>
        <nav class="navbar navbar-light shadow-sm px-3">
            <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                <i class="bi bi-list"></i>
            </button>
            <span class="fw-bold ms-2 text-white">Università di Bologna</span>
        </nav>

        <?php require("templates/sidebar.php"); ?>

        <main class="container py-5 vh-100 flex-column">
            <?php require($templateParams["nome"]); ?>
        </main>

    <?php else: ?>
        <div class="text-center d-flex justify-content-center align-items-center flex-column vh-100">
            <header class="container py-5">
                <h1 class="fw-bold display-3">Benvenuto!</h1>
                <h2 class="h5 fs-6">Scambia qui i tuoi appunti</h2>
            </header>

            <main class="container">
                <?php require($templateParams["nome"]); ?>
            </main>
        </div>
    <?php endif; ?>

    <footer class="footer py-4 px-4 text-white">
        <?php if(!isset($templateParams["usa_sidebar"])): ?>
            <h3>Contatti</h3>
        <?php else: ?>
            <h6 class="fw-bold">Contatti</h6>
            <p class="mb-1">Contattaci alle nostre mail</p>
        <?php endif; ?>
        
        <ul class="list-unstyled mb-0">
            <li><a class="text-white text-decoration-none" href="#">elena.fucci3@studio.unibo.it</a></li>
            <li><a class="text-white text-decoration-none" href="#">leonardo.damario@studio.unibo.it</a></li>
            <li><a class="text-white text-decoration-none" href="#">maddalena.prandini@studio.unibo.it</a></li>
        </ul>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
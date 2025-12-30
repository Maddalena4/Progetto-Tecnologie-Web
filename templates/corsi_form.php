<main class="container py-5">

    <h2 class="fw-bold mb-4">
        <?php echo $templateParams["corso_di_studi"]; ?>
    </h2>

    <!-- Dropdown Anno -->
    <div class="dropdown mb-4">
        <button class="btn btn-navy dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $templateParams["anno_selezionato"]; ?>° anno
        </button>
        <ul class="dropdown-menu">
            <?php for($anno=1; $anno<=3; $anno++): ?>
                <li>
                    <a class="dropdown-item" href="corsi.php?idFacolta=<?php echo $templateParams['idFacolta']; ?>&anno=<?php echo $anno; ?>">
                        <?php echo $anno; ?>° anno
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </div>

    <!-- Lista corsi -->
    <div class="row gy-3 align-items-center">
        <?php foreach ($templateParams["corsi"] as $corso): ?>
            <div class="col-6 col-md-7">
                <a href="appunti.php?codice=<?php echo $corso['idcorso']; ?>&nome=<?php echo urlencode($corso['nome']); ?>" 
                   class="scelta d-block text-start text-decoration-none">
                    <i class="bi bi-flower1 me-2"></i>
                    <?php echo $corso["nome"]; ?>
                </a>
            </div>
            <div class="col-3 col-md-2 text-center">
                <strong><?php echo $corso["idcorso"]; ?></strong>
            </div>
        <?php endforeach; ?>
    </div>

</main>

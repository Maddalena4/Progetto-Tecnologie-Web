<h2 class="fw-bold mb-4">
    <?= htmlspecialchars($templateParams["corso_di_studi"]); ?>
</h2>

<div class="dropdown mb-4">
    <button class="btn btn-navy dropdown-toggle"
            type="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            aria-label="Seleziona anno di corso">
        <?= (int)$templateParams["anno_selezionato"]; ?>° anno
    </button>

    <ul class="dropdown-menu">
        <?php
            $maxAnno = ($templateParams['facolta']['tipologia'] === 'magistrale') ? 2 : 3;
        ?>

        <?php for ($anno = 1; $anno <= $maxAnno; $anno++): ?>
            <li>
                <a class="dropdown-item"
                   href="corsi.php?idFacolta=<?= (int)$templateParams['idFacolta']; ?>&anno=<?= $anno; ?>">
                    <?= $anno; ?>° anno
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</div>

<div class="row gy-4">
<?php foreach ($templateParams["corsi"] as $corso): ?>

    <div class="col-8 col-md-7">
        <a href="pdf_corso_controller.php?idcorso=<?= (int)$corso['idcorso']; ?>"
           class="scelta d-block text-decoration-none">
            <span class="bi bi-flower1 me-2" aria-hidden="true"></span>
            <?= htmlspecialchars($corso["nome"]); ?>
        </a>
    </div>

    <div class="col-4 col-md-2 text-end text-md-center">
        <strong>ID: <?= (int)$corso["idcorso"]; ?></strong>
    </div>

<?php endforeach; ?>
</div>

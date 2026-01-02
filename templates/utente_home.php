<h2 class="fw-bold mb-4">Facoltà</h2>

<div class="row gy-3 align-items-center">
<?php if (!empty($templateParams["facolta"])): ?>
    <?php foreach ($templateParams["facolta"] as $f): ?>

        <div class="col-6 col-md-7">
            <a href="corsi.php?idFacolta=<?= urlencode($f['idfacolta']); ?>"
               class="scelta d-block text-start text-decoration-none text-dark">
                <span class="bi bi-flower1 me-2" aria-hidden="true"></span>
                <?= htmlspecialchars($f['nome']); ?>
            </a>
        </div>

        <div class="col-3 col-md-2 text-center">
            <strong>ID: <?= htmlspecialchars($f['idfacolta']); ?></strong>
        </div>

        <div class="col-3 col-md-3 text-end">
            <strong><?= htmlspecialchars($f['tipologia']); ?></strong>
        </div>

        <hr>

    <?php endforeach; ?>
<?php else: ?>
    <div class="col-12">
        <p class="text-muted">Nessuna facoltà disponibile al momento.</p>
    </div>
<?php endif; ?>
</div>

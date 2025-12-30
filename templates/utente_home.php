<h2 class="fw-bold mb-4">Università di Bologna</h2>
<div class="row gy-3">
<?php if (!empty($facolta_list)): ?>
    <?php foreach ($facolta_list as $f): ?>
        <div class="col-6 col-md-7">
            <a href="corsi.php?idFacolta=<?= urlencode($f['idfacolta']); ?>" 
               class="scelta d-block text-start text-decoration-none">
                <span class="bi bi-flower1 me-2" aria-hidden="true"></span>
                <?= htmlspecialchars($f['nome']); ?>
            </a>
        </div>
        <div class="col-3 col-md-2 text-center">
            <strong>
                <?= htmlspecialchars($f['tipologia']); ?>
                (<?= htmlspecialchars($f['idfacolta']); ?>)
            </strong>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-12">
        <p class="text-muted">Nessuna facoltà disponibile al momento.</p>
    </div>
<?php endif; ?>
</div>

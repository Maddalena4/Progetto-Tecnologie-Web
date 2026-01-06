<h2 class="fw-bold mb-4">Seguiti</h2>

<div class="row gy-3">

<?php if (empty($corsiSeguiti)) : ?>
    <div class="col-12">
        <p class="text-muted">Non segui ancora nessun corso.</p>
    </div>
<?php else : ?>

<?php foreach ($corsiSeguiti as $corso) : ?>
    <div class="col-8 col-md-9">
        <a href="pdf_corso_controller.php?idcorso=<?= $corso['idcorso']; ?>"
           class="scelta d-block text-start text-decoration-none">
            <span class="bi bi-flower1 me-2"></span>
            <?= htmlspecialchars($corso['nome']); ?>
        </a>
    </div>

    <div class="col-4 col-md-3 text-end">
        <small class="text-muted">
            <?= htmlspecialchars($corso['nome_facolta']); ?> ·
            Anno <?= htmlspecialchars($corso['anno']); ?>
        </small>
    </div>
<?php endforeach; ?>

<?php endif; ?>

</div>

<main class="container py-5 vh-100 flex-column">
    <h2 class="fw-bold mb-4">Università di Bologna</h2>
    <div class="row gy-3">
        <?php if (!empty($facolta_list)): ?>
            <?php foreach ($facolta_list as $f): ?>
                <div class="col-6 col-md-7">
                    <a href="#" class="scelta d-block text-start text-decoration-none">
                        <i class="bi bi-flower1 me-2"></i>
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
</main>

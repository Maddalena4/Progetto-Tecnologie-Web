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

<h2 class="fw-bold mt-5 mb-4">Notifiche</h2>

<div class="card shadow-sm">
    <div class="card-body">
        <?php if (!empty($templateParams["notifiche"])): ?>
            <ul class="list-group list-group-flush">
                <?php foreach ($templateParams["notifiche"] as $n): ?>
                    <li class="list-group-item">
                        <div class="small text-muted">
                            <?= date("d/m/Y H:i", strtotime($n["data_notifica"])) ?>
                        </div>
                        <div>
                            <?= htmlspecialchars($n["messaggio"]) ?>
                            <?php if (!empty($n["link"])): ?>
                                <a href="<?= htmlspecialchars($n["link"]) ?>"
                                   class="btn btn-lg text-white"
                                   style="background-color:#00274D; min-width: 60px; display: inline-block; margin-left: 0.5rem;">
                                    Vai al corso
                                </a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-muted mb-0">Nessuna notifica</p>
        <?php endif; ?>
    </div>
</div>

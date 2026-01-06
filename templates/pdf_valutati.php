<h2 class="fw-bold mb-5">
    I PDF che hai valutato
</h2>

<div class="row row-cols-3 g-4">

<?php if (count($templateParams["pdfs"]) === 0): ?>
    <div class="col-12">
        <p>Non hai ancora valutato nessun PDF.</p>
    </div>
<?php endif; ?>

<?php foreach ($templateParams["pdfs"] as $pdf): ?>
    <div class="col">
        <div class="file-item text-center">

            <a href="<?= htmlspecialchars($pdf["path"]) ?>"
               target="_blank"
               class="text-decoration-none text-dark file-icon-placeholder p-4 border rounded d-block">

                <span class="bi bi-file-earmark-pdf-fill fs-1"></span>
                <div class="mt-2 text-truncate">
                    <?= htmlspecialchars($pdf["nomefile"]) ?>
                </div>
            </a>

            <div class="mt-2">
                <small class="text-muted">
                    ⭐ Media: <?= $pdf["media"] ?? 0 ?>/5 (<?= $pdf["totale_voti"] ?> voti)
                </small>
            </div>

            <div class="mt-1">
                <small class="fw-bold d-block">Il tuo voto:</small>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <span class="bi <?= ($pdf["voto_utente"] >= $i)
                        ? 'bi-star-fill text-warning'
                        : 'bi-star text-secondary' ?>"></span>
                <?php endfor; ?>
            </div>

        </div>
    </div>
<?php endforeach; ?>

</div>
<h2 class="fw-bold mb-5">
    I PDF che hai valutato
</h2>

<div class="row row-cols-3 g-4">

<?php if (count($templateParams["pdfs"]) === 0): ?>
    <p>Non hai ancora valutato nessun PDF.</p>
<?php endif; ?>

<?php foreach ($templateParams["pdfs"] as $pdf): ?>
    <div class="col">
        <div class="file-item text-center">

            <a href="<?= htmlspecialchars($pdf["path"]) ?>"
               target="_blank"
               class="text-decoration-none text-dark">

                <div class="file-icon-placeholder p-4 border rounded">
                    <i class="bi bi-file-earmark-pdf-fill fs-1"></i>
                    <div class="mt-2 text-truncate">
                        <?= htmlspecialchars($pdf["nomefile"]) ?>
                    </div>
                </div>
            </a>

            <!-- MEDIA GENERALE -->
            <div class="mt-2">
                <small class="text-muted">
                    ⭐ Media: <?= $pdf["media"] ?? 0 ?>/5 (<?= $pdf["totale_voti"] ?> voti)
                </small>
            </div>

            <!-- VOTO DATO DA TE -->
            <div class="mt-1">
                <small class="fw-bold">Il tuo voto:</small><br>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <i class="bi <?= ($pdf["voto_utente"] >= $i)
                        ? 'bi-star-fill text-warning'
                        : 'bi-star text-secondary' ?>"></i>
                <?php endfor; ?>
            </div>

        </div>
    </div>
<?php endforeach; ?>

</div>

<h2 class="fw-bold mb-5">
    <?= htmlspecialchars($templateParams["corso"]["nome"]) ?>
</h2>

<div class="row row-cols-1 row-cols-md-3 g-4">

<?php if (count($templateParams["pdfs"]) === 0): ?>
    <p>Nessun PDF disponibile per questo corso</p>
<?php endif; ?>

<?php foreach ($templateParams["pdfs"] as $pdf): ?>
    <div class="col">
        <a href="<?= htmlspecialchars($pdf["path"]) ?>"
           target="_blank"
           class="text-decoration-none text-dark">

            <div class="border rounded p-3 text-center h-100">

                <i class="bi bi-file-earmark-pdf-fill fs-1 text-danger"></i>

                <div class="mt-2 text-truncate fw-semibold">
                    <?= htmlspecialchars($pdf["nomefile"]) ?>
                </div>

                <div class="mt-1">
                    <span class="badge bg-info">
                        v<?= $pdf["versione"] ?>
                    </span>

                    <?php if ($pdf["is_latest"]): ?>
                        <span class="badge bg-success">
                            Versione aggiornata
                        </span>
                    <?php endif; ?>
                </div>

            </div>
        </a>
    </div>
<?php endforeach; ?>

</div>

<div class="text-center mt-5">
<?php if ($templateParams["isSeguito"]): ?>
    <a href="pdf_corso_controller.php?idcorso=<?= $templateParams["corso"]["idcorso"] ?>&action=unfollow"
       class="btn btn-lg text-white" style="background:#00274D">
        Non seguire più
    </a>
<?php else: ?>
    <a href="pdf_corso_controller.php?idcorso=<?= $templateParams["corso"]["idcorso"] ?>&action=follow"
       class="btn btn-lg text-white" style="background:#00274D">
        Segui
    </a>
<?php endif; ?>
</div>

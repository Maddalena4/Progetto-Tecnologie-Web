<h2 class="fw-bold mb-5">
    <?= htmlspecialchars($templateParams["corso"]["nome"]) ?>
</h2>

<div class="row row-cols-3 g-4">

<?php if (count($templateParams["pdfs"]) === 0): ?>
    <p>Nessun PDF disponibile per questo corso</p>
<?php endif; ?>

<?php foreach ($templateParams["pdfs"] as $pdf): ?>
    <div class="col">
        <a href="<?= htmlspecialchars($pdf["path"]) ?>"
           target="_blank"
           class="file-item text-decoration-none text-dark">

            <div class="file-icon-placeholder text-center p-4 border rounded">
                <i class="bi bi-file-earmark-pdf-fill fs-1"></i>
                <div class="mt-2 text-truncate">
                    <?= htmlspecialchars($pdf["nomefile"]) ?>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; ?>

</div>

<div class="text-center mt-4 py-5">
    <button type="button" class="btn btn-crea-lg">Segui</button>
</div>
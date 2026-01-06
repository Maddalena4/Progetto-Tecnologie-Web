<h2 class="fw-bold mb-5">Upload</h2>

<div class="row row-cols-3 g-4">

    <?php if (count($templateParams["files"]) === 0): ?>
        <p class="text-muted">Non hai ancora caricato nessun PDF</p>
    <?php endif; ?>

    <?php foreach ($templateParams["files"] as $file): ?>
        <div class="col">
            <a href="<?= 'uploads/pdf/' . rawurlencode($file["nomefile"]) ?>"
            target="_blank"
            class="file-item text-decoration-none text-dark">

                <div class="file-icon-placeholder text-center p-4 border rounded">
                    <span class="bi bi-file-earmark-pdf-fill fs-1"></span>

                    <div class="mt-2 text-truncate">
                        <?= htmlspecialchars($file["nomefile"]) ?>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>

</div>

<div class="text-center mt-5 py-5">
    <a href="utente_carica_pdf.php"
       class="btn btn-lg text-white"
       style="background-color: #00274D;">
        Carica
    </a>
</div>

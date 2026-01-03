<?php $isSeguito = false;

if (isset($_SESSION["iduser"])) {
    $isSeguito = $dbh->isCorsoSeguito($idcorso, $_SESSION["iduser"]);
}
?>

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
    <?php if ($isSeguito): ?>
        <a href="#"
           class="btn btn-lg text-white disabled"
           style="background-color: #00274D; pointer-events: none;">
            Seguito
        </a>
    <?php else: ?>
        <a href="pdf_corso_controller.php?idcorso=<?= $idcorso ?>&action=follow"
        class="btn btn-lg text-white"
        style="background-color: #00274D;">
            Segui
        </a>
    <?php endif; ?>
</div>

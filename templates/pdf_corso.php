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

            <!-- MEDIA VALUTAZIONE -->
            <div class="mt-2">
                <?php
                    $media = $pdf["rating"]["media"] ?? 0;
                    $tot   = $pdf["rating"]["totale"] ?? 0;
                ?>
                <small>
                    ⭐ <?= $media ?>/5 (<?= $tot ?> voti)
                </small>
            </div>

            <!-- STELLE VOTABILI -->
            <?php if (isset($_SESSION["iduser"])): ?>
                <form method="POST" class="mt-1">
                    <input type="hidden" name="idpdf" value="<?= $pdf["idpdf"] ?>">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <button type="submit"
                                name="valore"
                                value="<?= $i ?>"
                                class="btn btn-sm p-0 border-0 bg-transparent">
                            <i class="bi <?= ($pdf["user_rating"] >= $i)
                                ? 'bi-star-fill text-warning'
                                : 'bi-star text-secondary' ?>"></i>
                        </button>
                    <?php endfor; ?>
                </form>
            <?php endif; ?>

        </div>
    </div>
<?php endforeach; ?>


</div>

<div class="text-center mt-4 py-5">
    <?php if ($isSeguito): ?>
        <a href="pdf_corso_controller.php?idcorso=<?= $idcorso ?>&action=unfollow"
           class="btn btn-lg text-white"
           style="background-color: #00274D;">
            Non seguire piu
        </a>
    <?php else: ?>
        <a href="pdf_corso_controller.php?idcorso=<?= $idcorso ?>&action=follow"
        class="btn btn-lg text-white"
        style="background-color: #00274D;">
            Segui
        </a>
    <?php endif; ?>
</div>

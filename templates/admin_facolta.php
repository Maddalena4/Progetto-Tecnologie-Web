<h2 class="fw-bold mb-4">Facoltà</h2>

<?php foreach ($templateParams['facolta'] as $fac): ?>
<div class="row align-items-center py-4 gy-3 border-bottom">

    <div class="col-12 col-md-6">
        <a href="admin.php?action=corsi&idfacolta=<?= $fac['idfacolta']; ?>"
           class="text-decoration-none text-dark fw-semibold fs-5">
            <span class="bi bi-flower1 me-2" aria-hidden="true"></span>
            <?= htmlspecialchars($fac['nome']); ?>
        </a>
    </div>

    <div class="col-6 col-md-2">
        <span class="fw-medium">
            ID: <?= $fac['idfacolta']; ?>
        </span>
    </div>

    <div class="col-6 col-md-4">
        <div class="d-flex justify-content-end gap-2 flex-wrap">

            <a href="admin.php?action=modifica_facolta&idfacolta=<?= $fac['idfacolta']; ?>"
               class="btn btn-sm btn-unibo d-flex align-items-center gap-1"
               aria-label="Modifica facoltà">
                <span class="bi bi-pencil-fill" aria-hidden="true"></span>
                <span>Modifica</span>
            </a>

            <form action="admin_facolta_controller.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="idfacolta" value="<?= $fac['idfacolta']; ?>">
                <button type="submit"
                        class="btn btn-sm btn-unibo"
                        aria-label="Elimina facoltà"
                        onclick="return confirm('Eliminare questa facoltà e tutti i corsi associati?');">
                    <span class="bi bi-trash-fill" aria-hidden="true"></span>
                </button>
            </form>

        </div>
    </div>

</div>
<?php endforeach; ?>

<div class="text-center mt-4 py-5">
    <a href="admin.php?action=crea_facolta"
    class="btn btn-lg text-white"
    style="background-color: #00274D;">
        + Crea
    </a>
</div>

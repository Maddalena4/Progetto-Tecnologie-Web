<h2 class="fw-bold mb-4">Facoltà</h2>

<?php foreach ($templateParams['facolta'] as $fac): ?>
<div class="row align-items-center py-4 gy-3 border-bottom">

    <div class="col-12 col-md-6">
        <a href="admin.php?action=corsi&idfacolta=<?php echo $fac['idfacolta']; ?>"
           class="scelta text-decoration-none text-dark fw-semibold fs-5">
            <span class="bi bi-flower1 me-2" aria-hidden="true"></span>
            <?php echo $fac['nome']; ?>
        </a>
    </div>

    <div class="col-6 col-md-2">
        <span class="text-muted fw-medium">
            ID: <?php echo $fac['idfacolta']; ?>
        </span>
    </div>

    <div class="col-6 col-md-4">
        <div class="d-flex justify-content-end gap-2 flex-wrap">

            <a href="admin.php?action=modifica_facolta&idfacolta=<?php echo $fac['idfacolta']; ?>"
               class="btn btn-sm text-white d-flex align-items-center gap-1"
               style="background-color:#00274D;">
                <span class="bi bi-pencil-fill" aria-hidden="true"></span>
                <span class="text-white">Modifica</span>
            </a>

            <form action="admin_facolta_controller.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="idfacolta" value="<?php echo $fac['idfacolta']; ?>">
                <button type="submit"
                        class="btn btn-sm text-white"
                        style="background-color:#00274D;"
                        aria-label="Elimina facoltà"
                        onclick="return confirm('Eliminare questa facoltà e tutti i corsi associati?');">
                    <span class="bi bi-trash-fill" aria-hidden="true"></span>
                </button>
            </form>

        </div>
    </div>

</div>
<?php endforeach; ?>

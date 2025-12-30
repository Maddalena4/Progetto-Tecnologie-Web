<h2 class="fw-bold mb-4">Facoltà</h2>

<div class="row gy-3 align-items-center">
    <?php foreach ($templateParams['facolta'] as $fac): ?>

        <div class="col-6 col-md-7">
            <a href="admin.php?action=corsi&idfacolta=<?php echo $fac['idfacolta']; ?>"
               class="scelta d-block text-start text-decoration-none text-dark">
                <span class="bi bi-flower1 me-2" aria-hidden="true"></span>
                <?php echo $fac['nome']; ?>
            </a>
        </div>

        <div class="col-3 col-md-2 text-center">
            <strong>ID: <?php echo $fac['idfacolta']; ?></strong>
        </div>

        <div class="col-3 col-md-3 text-end">
            <a href="admin.php?action=modifica_facolta&idfacolta=<?php echo $fac['idfacolta']; ?>"
               class="btn btn-sm me-2 text-white"
               style="background-color: #00274D;">
                <span class="bi bi-pencil-fill" aria-hidden="true"></span>
                Modifica
            </a>

            <button type="button"
                    class="btn btn-sm text-white"
                    style="background-color: #00274D;">
                <span class="bi bi-trash-fill" aria-hidden="true"></span>
            </button>
        </div>

        <hr>

    <?php endforeach; ?>
</div>

<div class="text-center mt-4 py-5">
    <a href="admin.php?action=crea_facolta"
       class="btn btn-lg text-white"
       style="background-color: #00274D;">
        + Crea
    </a>
</div>

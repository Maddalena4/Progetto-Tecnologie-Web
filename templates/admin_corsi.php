<h2 class="fw-bold mb-4">Corsi</h2>

<!-- FILTRO FACOLTÀ -->
<div class="dropdown mb-4">

    <button class="btn text-white dropdown-toggle"
            style="background-color:#00274D;"
            id="dropdownFacolta"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            aria-label="Seleziona facoltà">
        <?= isset($templateParams['facolta_selezionata'])
            ? htmlspecialchars($templateParams['facolta_selezionata']['nome'])
            : 'Seleziona Facoltà'; ?>
    </button>

    <ul class="dropdown-menu"
        aria-labelledby="dropdownFacolta">
        <?php foreach ($templateParams["lista_facolta"] as $facolta): ?>
            <li>
                <a class="dropdown-item"
                   href="admin.php?action=corsi&idfacolta=<?= $facolta['idfacolta']; ?>">
                    <?= htmlspecialchars($facolta['nome']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<!-- LISTA CORSI -->
<?php foreach ($templateParams['corsi'] as $corso): ?>
<div class="row align-items-center py-4 gy-3 border-bottom">

    <!-- Nome corso -->
    <div class="col-12 col-md-6">
        <a href="#"
           class="text-decoration-none text-dark fw-semibold fs-5">
            <span class="bi bi-flower1 me-2" aria-hidden="true"></span>
            <?= htmlspecialchars($corso['nome']); ?>
        </a>
    </div>

    <!-- ID -->
    <div class="col-6 col-md-2">
        <span class="fw-medium text-bold">
            ID: <?= $corso['idcorso']; ?>
        </span>

    </div>

    <!-- Azioni -->
    <div class="col-6 col-md-4">
        <div class="d-flex justify-content-end gap-2 flex-wrap">

            <a href="admin.php?action=modifica_corso&idcorso=<?= $corso['idcorso']; ?>"
               class="btn btn-sm text-white d-flex align-items-center gap-1"
               style="background-color:#00274D;"
               aria-label="Modifica corso">
                <span class="bi bi-pencil-fill" aria-hidden="true"></span>
                <span class="text-white text-bold">Modifica</span>
            </a>

            <form action="admin_controller_corsi.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="idcorso" value="<?= $corso['idcorso']; ?>">
                <button type="submit"
                        class="btn btn-sm text-white"
                        style="background-color:#00274D;"
                        aria-label="Elimina corso"
                        onclick="return confirm('Eliminare il corso?');">
                    <span class="bi bi-trash-fill" aria-hidden="true"></span>
                </button>
            </form>

        </div>
    </div>

</div>
<?php endforeach; ?>

<!-- CREA CORSO -->
<div class="text-center mt-5">
    <a href="admin.php?action=crea_corso&idfacolta=<?= $templateParams['idfacolta']; ?>"
       class="btn btn-lg text-white"
       style="background-color:#00274D;">
        + Crea
    </a>
</div>

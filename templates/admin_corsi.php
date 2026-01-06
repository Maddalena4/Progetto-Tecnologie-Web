<h2 class="fw-bold mb-4">Corsi</h2>

<div class="dropdown mb-4">
    <button class="btn btn-unibo dropdown-toggle"
            id="dropdownFacolta"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            aria-label="Seleziona facoltà">
        <?= isset($templateParams['facolta_selezionata'])
            ? htmlspecialchars($templateParams['facolta_selezionata']['nome'])
            : 'Seleziona Facoltà'; ?>
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownFacolta">
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

<?php foreach ($templateParams['corsi'] as $corso): ?>
<div class="row align-items-center py-4 gy-3 border-bottom">

    <div class="col-12 col-md-6">
        <a href="#"
           class="text-decoration-none text-dark fw-semibold fs-5">
            <span class="bi bi-flower1 me-2" aria-hidden="true"></span>
            <?= htmlspecialchars($corso['nome']); ?>
        </a>
    </div>

    <div class="col-6 col-md-2">
        <span class="fw-medium">
            ID: <?= $corso['idcorso']; ?>
        </span>
    </div>

    <div class="col-6 col-md-4">
        <div class="d-flex justify-content-end gap-2 flex-wrap">

            <a href="admin.php?action=modifica_corso&idcorso=<?= $corso['idcorso']; ?>"
               class="btn btn-sm btn-unibo d-flex align-items-center gap-1"
               aria-label="Modifica corso">
                <span class="bi bi-pencil-fill" aria-hidden="true"></span>
                <span>Modifica</span>
            </a>

            <form action="admin_controller_corsi.php" method="POST">
                <input type="hidden" name="action" value="delete"/>
                <input type="hidden" name="idcorso" value="<?= $corso['idcorso']; ?>"/>
                <button type="submit"
                        class="btn btn-sm btn-unibo"
                        aria-label="Elimina corso"
                        onclick="return confirm('Eliminare il corso?');">
                    <span class="bi bi-trash-fill" aria-hidden="true"></span>
                </button>
            </form>

        </div>
    </div>

</div>
<?php endforeach; ?>

<div class="text-center mt-5">
    <a href="admin.php?action=crea_corso&idfacolta=<?= $templateParams['idfacolta']; ?>"
       class="btn btn-lg btn-unibo">
        + Crea
    </a>
</div>

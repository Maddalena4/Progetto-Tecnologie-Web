<h2 class="fw-bold mb-4">Corsi</h2>

<div class="dropdown mb-4">
    <button class="btn text-white dropdown-toggle"
            style="background-color: #00274D;"
            data-bs-toggle="dropdown">
        <?= isset($templateParams['facolta_selezionata'])
            ? htmlspecialchars($templateParams['facolta_selezionata']['nome'])
            : 'Seleziona Facoltà'; ?>
    </button>

    <ul class="dropdown-menu">
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

<div class="row gy-3 align-items-center">
<?php foreach ($templateParams['corsi'] as $corso): ?>

    <!-- Nome corso -->
    <div class="col-6 col-md-7">
        <a href="#"
           class="scelta d-block text-start text-decoration-none text-dark">
            <span class="bi bi-flower1 me-2" aria-hidden="true"></span>
            <?php echo $corso['nome']; ?>
        </a>
    </div>

    <!-- ID corso -->
    <div class="col-3 col-md-2 text-center">
        <strong>ID: <?php echo $corso['idcorso']; ?></strong>
    </div>

    <!-- Azioni -->
    <div class="col-3 col-md-3 text-end">
        <a href="admin.php?action=modifica_corso&idcorso=<?php echo $corso['idcorso']; ?>"
           class="btn btn-sm me-2 text-white"
           style="background-color: #00274D;">
            <span class="bi bi-pencil-fill" aria-hidden="true"></span>
            Modifica
        </a>

        <form action="admin_controller_corsi.php" method="POST" class="d-inline">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="idcorso" value="<?php echo $corso['idcorso']; ?>">
            <button type="submit"
                    class="btn btn-sm text-white"
                    style="background-color: #00274D;"
                    onclick="return confirm('Eliminare il corso?');">
                <span class="bi bi-trash-fill" aria-hidden="true"></span>
            </button>
        </form>
    </div>

    <hr>

<?php endforeach; ?>
</div>

<div class="text-center mt-4 py-5">
    <a href="admin.php?action=crea_corso&idfacolta=<?php echo $templateParams['idfacolta']; ?>"
       class="btn btn-lg text-white"
       style="background-color: #00274D;">
        + Crea
    </a>
</div>

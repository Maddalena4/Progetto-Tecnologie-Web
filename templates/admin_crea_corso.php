<form action="admin_controller_corsi.php" method="POST">

    <input type="hidden" name="action" value="create">

    <?php if (!empty($templateParams['idfacolta'])): ?>
        <input type="hidden" name="idfacolta"
               value="<?= $templateParams['idfacolta']; ?>">
    <?php endif; ?>

    <!-- NOME CORSO -->
    <div class="mb-3">
        <label class="form-label">Nome corso</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <!-- SELEZIONE FACOLTÀ -->
    <div class="dropdown mb-4">
        <button class="btn text-white dropdown-toggle"
                style="background-color:#00274D;"
                data-bs-toggle="dropdown">
            Seleziona Facoltà
        </button>

        <ul class="dropdown-menu">
            <?php foreach ($templateParams['lista_facolta'] as $facolta): ?>
                <li>
                    <a class="dropdown-item"
                       href="admin.php?action=crea_corso&idfacolta=<?= $facolta['idfacolta']; ?>">
                        <?= htmlspecialchars($facolta['nome']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- ANNO (solo se facoltà selezionata) -->
    <?php if (!empty($templateParams['facolta'])): ?>
        <div class="mb-3">
            <label class="form-label">Anno</label>

            <?php
                $maxAnno = ($templateParams['facolta']['tipologia'] === 'magistrale') ? 2 : 3;
            ?>

            <?php for ($i = 1; $i <= $maxAnno; $i++): ?>
                <div class="form-check">
                    <input class="form-check-input"
                           type="radio"
                           name="anno"
                           value="<?= $i; ?>"
                           required>
                    <label class="form-check-label">
                        <?= $i; ?>° anno
                    </label>
                </div>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

    <!-- CREA -->
    <button type="submit"
            class="btn text-white"
            style="background-color:#00274D;"
            <?= empty($templateParams['facolta']) ? 'disabled' : ''; ?>>
        Crea corso
    </button>

</form>


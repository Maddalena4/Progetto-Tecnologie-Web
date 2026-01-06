<form action="admin_controller_corsi.php" method="POST" class="mb-5 p-4">

    <input type="hidden" name="action" value="create">

    <?php if (!empty($templateParams['idfacolta'])): ?>
        <input type="hidden" name="idfacolta"
               value="<?= $templateParams['idfacolta']; ?>">
    <?php endif; ?>

    <div class="dropdown mb-4">
        <button class="btn text-white dropdown-toggle"
                style="background-color:#00274D;"
                id="dropdownFacolta"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                aria-label="Seleziona Facoltà">
            Seleziona Facoltà
        </button>

        <ul class="dropdown-menu" aria-labelledby="dropdownFacolta">
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

    <div class="mb-3">
        <label for="nome_corso" class="form-label fw-semibold">Nome corso</label>
        <input type="text"
               id="nome_corso"
               name="nome"
               class="form-control"
               required>
    </div>

    <?php if (!empty($templateParams['facolta'])): ?>
        <fieldset class="mb-3">
            <legend class="form-label fw-semibold">Anno</legend>

            <?php
                $maxAnno = ($templateParams['facolta']['tipologia'] === 'magistrale') ? 2 : 3;
            ?>

            <?php for ($i = 1; $i <= $maxAnno; $i++): ?>
                <div class="form-check">
                    <input class="form-check-input"
                           type="radio"
                           id="anno_<?= $i; ?>"
                           name="anno"
                           value="<?= $i; ?>"
                           required>
                    <label class="form-check-label" for="anno_<?= $i; ?>">
                        <?= $i; ?>° anno
                    </label>
                </div>
            <?php endfor; ?>
        </fieldset>
    <?php endif; ?>

    <div class="text-center mt-4">
        <button type="submit"
                class="btn text-white px-4 py-2"
                style="background-color:#00274D; min-width: 140px; font-size: 0.9rem;"
                <?= empty($templateParams['facolta']) ? 'disabled' : ''; ?>>
            Crea corso
        </button>
    </div>

</form>

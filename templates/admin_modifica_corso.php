<h2 class="fw-bold mb-4">Modifica Corso</h2>

<form action="admin_controller_corsi.php" method="POST">

    <input type="hidden" name="action" value="update">
    <input type="hidden" name="idcorso"
           value="<?= $templateParams['corso']['idcorso']; ?>">

    <!-- FACOLTÀ (solo visualizzata) -->
    <div class="mb-3">
        <label class="form-label">Facoltà</label>
        <input type="text"
               class="form-control"
               value="<?= htmlspecialchars($templateParams['facolta']['nome']); ?>"
               disabled>
    </div>

    <!-- NOME -->
    <div class="mb-3">
        <label class="form-label">Nome corso</label>
        <input type="text"
               name="nome"
               class="form-control"
               value="<?= htmlspecialchars($templateParams['corso']['nome']); ?>"
               required>
    </div>

    <!-- ANNO (dipende dal tipo facoltà) -->
    <div class="mb-3">
        <label class="form-label">Anno</label>

        <?php
            $maxAnno =
                ($templateParams['facolta']['tipologia'] === 'magistrale') ? 2 : 3;
        ?>

        <?php for ($i = 1; $i <= $maxAnno; $i++): ?>
            <div class="form-check">
                <input class="form-check-input"
                       type="radio"
                       name="anno"
                       value="<?= $i; ?>"
                       <?= ($templateParams['corso']['anno'] == $i) ? 'checked' : ''; ?>
                       required>
                <label class="form-check-label">
                    <?= $i; ?>° anno
                </label>
            </div>
        <?php endfor; ?>
    </div>

    <!-- SALVA -->
    <button type="submit"
            class="btn text-white"
            style="background-color:#00274D;">
        Salva modifiche
    </button>

</form>

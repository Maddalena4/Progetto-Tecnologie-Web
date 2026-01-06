<h2 class="fw-bold mb-4">Modifica Corso</h2>

<form action="admin_controller_corsi.php" method="POST" class="mb-5 p-4">

    <input type="hidden" name="action" value="update"/>
    <input type="hidden" name="idcorso"
           value="<?= $templateParams['corso']['idcorso']; ?>"/>

    <div class="mb-3">
        <label for="facolta_corso" class="form-label fw-semibold">Facoltà</label>
        <input type="text"
               id="facolta_corso"
               class="form-control"
               value="<?= htmlspecialchars($templateParams['facolta']['nome']); ?>"
               disabled/>
    </div>

    <div class="mb-3">
        <label for="nome_corso" class="form-label fw-semibold">Nome corso</label>
        <input type="text"
               id="nome_corso"
               name="nome"
               class="form-control"
               value="<?= htmlspecialchars($templateParams['corso']['nome']); ?>"
               required/>
    </div>

    <fieldset class="mb-3">
        <legend class="form-label fw-semibold">Anno</legend>

        <?php
            $maxAnno =
                ($templateParams['facolta']['tipologia'] === 'magistrale') ? 2 : 3;
        ?>

        <?php for ($i = 1; $i <= $maxAnno; $i++): ?>
            <div class="form-check">
                <input class="form-check-input"
                       type="radio"
                       name="anno"
                       id="anno_<?= $i; ?>"
                       value="<?= $i; ?>"
                       <?= ($templateParams['corso']['anno'] == $i) ? 'checked' : ''; ?>
                       required/>
                <label class="form-check-label" for="anno_<?= $i; ?>">
                    <?= $i; ?>° anno
                </label>
            </div>
        <?php endfor; ?>
    </fieldset>

    <div class="text-center mt-4">
        <button type="submit"
                class="btn text-white px-4 py-2"
                style="background-color:#00274D; min-width: 140px; font-size: 0.9rem;">
            Salva modifiche
        </button>
    </div>

</form>

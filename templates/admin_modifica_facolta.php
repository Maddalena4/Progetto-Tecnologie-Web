<form action="admin_facolta_controller.php" method="POST" class="mb-5 p-4">

    <div class="mb-3">
        <label for="nome_facolta" class="form-label fw-semibold">Nome Facoltà</label>
        <input type="text"
               name="nome_facolta"
               id="nome_facolta"
               class="form-control"
               value="<?= htmlspecialchars($templateParams['facolta']['nome']); ?>"
               required/>
    </div>

    <fieldset class="mb-3">
        <legend class="form-label fw-semibold">Tipologia</legend>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipologia" id="tip_triennale" value="triennale"
                <?= ($templateParams['facolta']['tipologia'] === 'triennale') ? 'checked' : ''; ?> required/>
            <label class="form-check-label" for="tip_triennale">Triennale</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipologia" id="tip_magistrale" value="magistrale"
                <?= ($templateParams['facolta']['tipologia'] === 'magistrale') ? 'checked' : ''; ?> required/>
            <label class="form-check-label" for="tip_magistrale">Magistrale</label>
        </div>
    </fieldset>

    <input type="hidden" name="action" value="update"/>
    <input type="hidden" name="idfacolta" value="<?= $templateParams['facolta']['idfacolta']; ?>"/>

    <div class="text-center mt-4">
        <button type="submit" class="btn text-white px-4 py-2" 
                style="background-color:#00274D; min-width: 140px; font-size: 0.9rem;">
            Modifica Facoltà
        </button>
    </div>

</form>

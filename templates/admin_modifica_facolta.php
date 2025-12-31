<form action="admin_facolta_controller.php" method="POST" class="mb-5 p-4">

    <div class="mb-3">
        <label for="nome_facolta" class="form-label fw-semibold">Nome Facoltà</label>
        <input type="text"
               name="nome_facolta"
               id="nome_facolta"
               class="form-control"
               value="<?= htmlspecialchars($templateParams['facolta']['nome']); ?>"
               required>
    </div>

    <div class="mb-3">
        <label for="tipologia" class="form-label fw-semibold">Tipologia</label>
        <select name="tipologia" id="tipologia" class="form-select" required>
            <option value="" disabled>-- Seleziona --</option>
            <option value="triennale"
                <?= ($templateParams['facolta']['tipologia'] === 'triennale') ? 'selected' : ''; ?>>
                Triennale
            </option>
            <option value="magistrale"
                <?= ($templateParams['facolta']['tipologia'] === 'magistrale') ? 'selected' : ''; ?>>
                Magistrale
            </option>
        </select>
    </div>

    <input type="hidden" name="action" value="update">
    <input type="hidden" name="idfacolta" value="<?= $templateParams['facolta']['idfacolta']; ?>">

    <div class="text-center">
        <button type="submit" class="btn btn-lg text-white" style="background-color:#00274D; min-width: 160px;">
            Modifica Facoltà
        </button>
    </div>

</form>

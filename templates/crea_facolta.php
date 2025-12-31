<form action="admin_facolta_controller.php" method="POST" class="mb-5 p-4">

    <div class="mb-3">
        <label for="nome_facolta" class="form-label fw-semibold">Nome Facoltà</label>
        <input type="text" name="nome_facolta" id="nome_facolta" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="tipologia" class="form-label fw-semibold">Tipologia</label>
        <select name="tipologia" id="tipologia" class="form-select" required>
            <option value="" selected disabled>-- Seleziona --</option>
            <option value="triennale">Triennale</option>
            <option value="magistrale">Magistrale</option>
        </select>
    </div>

    <input type="hidden" name="action" value="create">

    <div class="text-center">
        <button type="submit" class="btn btn-lg text-white" style="background-color:#00274D; min-width: 160px;">
            Crea Facoltà
        </button>
    </div>

</form>


<form action="admin_facolta_controller.php" method="POST">
    
    <div class="mb-3">
        <label for="nome_facolta">Nome Facoltà</label>
        <input type="text" name="nome_facolta" id="nome_facolta" required>
    </div>

    <div class="mb-3">
        <label for="tipologia">Tipologia</label>
        <select name="tipologia" id="tipologia" required>
            <option value="">--Seleziona--</option>
            <option value="triennale">Triennale</option>
            <option value="magistrale">Magistrale</option>
        </select>
    </div>

    <input type="hidden" name="action" value="create">

    <button type="submit" class="btn btn-primary">
        Modifica facolta
    </button>
</form>

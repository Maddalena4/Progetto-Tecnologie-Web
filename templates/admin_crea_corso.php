<form action="admin_corso_controller.php" method="POST">

    <input type="hidden" name="action" value="create">
    <input type="hidden" name="idfacolta" value="<?php echo $templateParams['idfacolta']; ?>">

    <div class="mb-3">
        <label>Nome corso</label>
        <input type="text" name="nome" required>
    </div>

    <div class="mb-3">
        <label>Codice</label>
        <input type="text" name="codice" required>
    </div>

    <div class="mb-3">
        <label>Anno</label>
        <select name="anno" required>
            <option value="1">1°</option>
            <option value="2">2°</option>
            <option value="3">3°</option>
        </select>
    </div>

    <button class="btn btn-primary">Crea corso</button>
</form>

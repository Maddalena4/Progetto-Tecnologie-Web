<form action="admin_facolta_controller.php" method="POST">

    <div class="mb-3">
        <label for="nome_facolta">Nome Facoltà</label>
        <input type="text"
               name="nome_facolta"
               id="nome_facolta"
               value="<?php echo $templateParams['facolta']['nome']; ?>"
               required>
    </div>

    <div class="mb-3">
        <label for="tipologia">Tipologia</label>
        <select name="tipologia" id="tipologia" required>
            <option value="">--Seleziona--</option>
            <option value="triennale"
                <?php if ($templateParams['facolta']['tipologia'] === 'triennale') echo 'selected'; ?>>
                Triennale
            </option>
            <option value="magistrale"
                <?php if ($templateParams['facolta']['tipologia'] === 'magistrale') echo 'selected'; ?>>
                Magistrale
            </option>
        </select>
    </div>

    <input type="hidden" name="action" value="update">
    <input type="hidden" name="idfacolta" value="<?php echo $templateParams['facolta']['idfacolta']; ?>">

    <button type="submit" class="btn btn-primary">
        Modifica Facoltà
    </button>
</form>

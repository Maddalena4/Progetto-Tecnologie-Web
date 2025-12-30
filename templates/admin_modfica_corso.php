<form action="admin_corso_controller.php" method="POST">

    <input type="hidden" name="action" value="update">
    <input type="hidden" name="idcorso" value="<?php echo $templateParams['corso']['idcorso']; ?>">

    <div class="mb-3">
        <label>Nome corso</label>
        <input type="text" name="nome"
               value="<?php echo $templateParams['corso']['nome']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Codice</label>
        <input type="text" name="codice"
               value="<?php echo $templateParams['corso']['codice']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Anno</label>
        <select name="anno">
            <?php for ($i=1; $i<=3; $i++): ?>
                <option value="<?php echo $i; ?>"
                    <?php if ($templateParams['corso']['anno'] == $i) echo 'selected'; ?>>
                    <?php echo $i; ?>°
                </option>
            <?php endfor; ?>
        </select>
    </div>

    <button class="btn btn-primary">Salva modifiche</button>
</form>

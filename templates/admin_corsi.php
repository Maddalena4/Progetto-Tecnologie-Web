<h2 class="fw-bold mb-4">Corsi</h2>

<div class="dropdown mb-4">
    <button class="btn btn-navy dropdown-toggle" data-bs-toggle="dropdown">
        <?php echo $templateParams['anno']; ?>° anno
    </button>
    <ul class="dropdown-menu">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <li>
                <a class="dropdown-item"
                   href="admin.php?action=corsi&idfacolta=<?php echo $templateParams['idfacolta']; ?>&anno=<?php echo $i; ?>">
                    <?php echo $i; ?>° anno
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</div>

<div class="row gy-3 align-items-center">
<?php foreach ($templateParams['corsi'] as $corso): ?>

    <div class="col-6 col-md-7">
        <?php echo $corso['nome']; ?>
    </div>

    <div class="col-3 col-md-2 text-center">
        <strong><?php echo $corso['codice']; ?></strong>
    </div>

    <div class="col-3 col-md-3 text-end">

        <a href="admin.php?action=modifica_corso&idcorso=<?php echo $corso['idcorso']; ?>"
           class="btn btn-sm btn-navy me-2">
            ✏️
        </a>

        <form action="admin_corso_controller.php" method="POST" class="d-inline">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="idcorso" value="<?php echo $corso['idcorso']; ?>">
            <button type="submit" class="btn btn-sm btn-navy"
                    onclick="return confirm('Eliminare il corso?');">
                🗑️
            </button>
        </form>
    </div>

<?php endforeach; ?>
</div>

<div class="text-center mt-4 py-5">
    <a href="admin.php?action=crea_corso&idfacolta=<?php echo $templateParams['idfacolta']; ?>"
       class="btn btn-crea-lg">
        + Crea
    </a>
</div>

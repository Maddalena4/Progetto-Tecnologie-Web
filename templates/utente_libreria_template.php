<div class="container py-4">

    <h2 class="fw-bold mb-4">Libreria PDF</h2>

    <!-- Barra di ricerca -->
    <form method="GET" class="mb-4">
        <div class="input-group">
            <input
                type="text"
                name="q"
                class="form-control"
                placeholder="Cerca PDF per nome..."
                value="<?= htmlspecialchars($_GET['q'] ?? '') ?>"
            >
            <button class="btn text-white" type="submit" style="background-color: #00274D; ">Cerca</button>
        </div>
    </form>

    <?php if (empty($templateParams["pdf_list"])): ?>
        <div class="alert alert-warning">
            Nessun PDF trovato.
        </div>
    <?php else: ?>
        <div class="list-group shadow-sm">
            <?php foreach ($templateParams["pdf_list"] as $pdf): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1"><?= htmlspecialchars($pdf["nomefile"]) ?></h6>
                        <small class="text-muted">
                            Corso: <?= htmlspecialchars($pdf["corso_nome"]) ?><br>
                            Caricato il: <?= date("d/m/Y", strtotime($pdf["data_upload"])) ?>
                        </small>
                    </div>

                    <a href="<?= htmlspecialchars($pdf["path"]) ?>"
                       target="_blank"
                       class="btn btn-sm text-white"
                       style="background-color: #00274D;">
                        Apri
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

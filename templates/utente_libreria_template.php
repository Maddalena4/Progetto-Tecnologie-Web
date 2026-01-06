<div class="container py-4">

    <h2 class="fw-bold mb-4">Libreria PDF</h2>

    <form method="GET" class="mb-4">
        <div class="input-group">
            <label for="search-pdf" class="visually-hidden">Cerca PDF per nome</label>
            <input
                type="text"
                id="search-pdf"
                name="q"
                class="form-control"
                placeholder="Cerca PDF per nome..."
                value="<?= htmlspecialchars($_GET['q'] ?? '') ?>"
            />
            <button class="btn text-white" type="submit" style="background-color: #00274D;">
                Cerca
            </button>
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
                        <h3 class="mb-1 h6"><?= htmlspecialchars($pdf["nomefile"]) ?></h3>
                        <small class="text-muted">
                            Corso: <?= htmlspecialchars($pdf["corso_nome"]) ?><br>
                            Caricato il: <?= date("d/m/Y", strtotime($pdf["data_upload"])) ?>
                        </small>
                    </div>

                    <a href="<?= 'uploads/pdf/' . rawurlencode($pdf["nomefile"]) ?>"
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

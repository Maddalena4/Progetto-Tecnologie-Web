<div class="container py-4">
    <h2 class="fw-bold mb-4">Nuovo Caricamento PDF</h2>

    <?php if(!empty($templateParams["errore"])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($templateParams["errore"]) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form action="utente_carica_pdf.php" method="POST" enctype="multipart/form-data" id="uploadForm">

                <div class="mb-4">
                    <label for="idfacolta" class="form-label fw-bold">1. Seleziona la Facoltà</label>
                    <select name="idfacolta" id="idfacolta" class="form-select" required>
                        <option value="" disabled selected>Scegli facoltà...</option>
                        <?php foreach($templateParams["facolta_list"] as $f): ?>
                            <option value="<?= $f["idfacolta"] ?>">
                                <?= htmlspecialchars($f["nome"]) ?> (<?= $f["tipologia"] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="idcorso" class="form-label fw-bold">2. Seleziona il Corso</label>
                    <select name="idcorso" id="idcorso" class="form-select" required>
                        <option value="" disabled selected>Scegli prima la facoltà...</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="filepdf" class="form-label fw-bold">3. Seleziona il File PDF</label>
                    <input type="file" name="filepdf" id="filepdf" class="form-control" accept=".pdf" required/>
                    <div class="form-text">Il file non deve superare i 5MB.</div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                    <a href="utente_upload.php" class="btn btn-light me-md-2">Annulla</a>
                    <button type="submit" name="conferma_upload" class="btn text-white px-5" style="background-color: #00274D;">
                        Pubblica PDF
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

document.getElementById('idfacolta').addEventListener('change', function() {
    const idfacolta = this.value;
    const selectCorsi = document.getElementById('idcorso');
    selectCorsi.innerHTML = '<option value="" disabled selected>Caricamento...</option>';

    fetch(`utente_carica_pdf.php?get_corsi=1&idfacolta=${idfacolta}`)
        .then(response => response.json())
        .then(data => {
            let options = '<option value="" disabled selected>Scegli il corso...</option>';
            data.forEach(c => {
                options += `<option value="${c.idcorso}">${c.nome} (Anno ${c.anno})</option>`;
            });
            selectCorsi.innerHTML = options;
        });
});
</script>

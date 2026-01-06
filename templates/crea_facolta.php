<form action="admin_facolta_controller.php" method="POST" class="mb-5 p-4">

    <div class="mb-3">
        <label for="nome_facolta" class="form-label fw-semibold">Nome Facoltà</label>
        <input type="text" name="nome_facolta" id="nome_facolta" class="form-control" required/>
    </div>

    <fieldset class="mb-3">
        <legend class="form-label fw-semibold">Tipologia</legend>
        
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipologia" id="tipo_triennale" value="triennale" required/>
            <label class="form-check-label" for="tipo_triennale">
                Triennale
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipologia" id="tipo_magistrale" value="magistrale" required/>
            <label class="form-check-label" for="tipo_magistrale">
                Magistrale
            </label>
        </div>
    </fieldset>

    <input type="hidden" name="action" value="create"/>

    <div class="text-center">
        <button type="submit" class="btn btn-lg text-white" style="background-color:#00274D; min-width: 160px;">
            Crea Facoltà
        </button>
    </div>

</form>

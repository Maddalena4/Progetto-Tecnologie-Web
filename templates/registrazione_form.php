<div class="row justify-content-center">
    <div class="col-md-6 bg-white p-5 rounded shadow">
        
        <h2 class="text-center mb-4" style="color: #00274D;">Accedi / Registrati</h2>

        <?php if(isset($templateParams["errore"]) && !empty($templateParams["errore"])): ?>
            <div class="alert alert-danger"><?php echo $templateParams["errore"]; ?></div>
        <?php endif; ?>

        <form action="registrazione.php" method="POST">
            
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <input type="hidden" name="azione" value="login"> 

            <button type="submit" class="btn btn-primary w-100 py-2" style="background-color: #00274D;">Entra</button>
            
            <hr>
            <p class="text-muted">Non hai un account? (Simulazione bottone registrazione)</p>
            </form>

    </div>
</div>
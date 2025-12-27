<div class="row justify-content-center">
    <div class="col-md-6 bg-white p-5 rounded shadow">

        <h2 class="text-center mb-4" style="color: #00274D;">Accedi</h2>

        <?php if (!empty($templateParams["errore_login"])): ?>
            <div class="alert alert-danger">
                <?php echo $templateParams["errore_login"]; ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3 text-start">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-lg w-100 gradient-btn">
                ACCEDI
            </button>
        </form>

    </div>
</div>

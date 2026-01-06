<div class="d-flex justify-content-center align-items-center min-vh-100 px-3">

    <div class="card form-card p-4 p-md-5">

        <h2 class="h1 text-center fw-bold mb-4">Accedi</h2>

        <?php if (!empty($templateParams["errore_login"])): ?>
            <div class="alert alert-danger">
                <?php echo $templateParams["errore_login"]; ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <!-- EMAIL -->
            <div class="mb-3">
                <label for="email" class="visually-hidden">Email</label>
                <input type="email"
                       id="email"
                       name="email"
                       class="form-control form-control-lg"
                       placeholder="Your Email"
                       required/>
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label for="password" class="visually-hidden">Password</label>
                <input type="password"
                       id="password"
                       name="password"
                       class="form-control form-control-lg"
                       placeholder="Password"
                       required/>
            </div>

            <button type="submit" class="btn btn-lg w-100 gradient-btn">
                ACCEDI
            </button>

        </form>

        <div class="text-center mt-4">
            Non hai un account?
            <a href="registrazione.php" class="fw-bold">Registrati</a>
        </div>

    </div>

</div>

<div class="d-flex justify-content-center align-items-center min-vh-100 px-3">

    <div class="card form-card p-4 p-md-5">

        <h1 class="text-center fw-bold mb-4">CREATE ACCOUNT</h1>

        <?php if (!empty($templateParams["errore"])): ?>
            <div class="alert alert-danger">
                <?php echo $templateParams["errore"]; ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <!-- EMAIL -->
            <div class="mb-3">
                <input type="email"
                       name="email"
                       class="form-control form-control-lg"
                       placeholder="Your Email"
                       required>
            </div>

            <!-- PASSWORD -->
            <div class="mb-3">
                <input type="password"
                       name="password"
                       class="form-control form-control-lg"
                       placeholder="Password"
                       required>
            </div>

            <!-- REPEAT PASSWORD -->
            <div class="mb-3">
                <input type="password"
                       name="repeat_password"
                       class="form-control form-control-lg"
                       placeholder="Repeat your password"
                       required>
            </div>

            <!-- TERMS -->
            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" required>
                <label class="form-check-label">
                    I agree all statements in <a href="#">Terms of service</a>
                </label>
            </div>

            <button type="submit" class="btn btn-lg w-100 gradient-btn">
                SIGN UP
            </button>

        </form>

        <div class="text-center mt-4">
            Hai già un account?
            <a href="login.php" class="fw-bold">Accedi</a>
        </div>

    </div>

</div>

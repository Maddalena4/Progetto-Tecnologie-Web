<div class="d-flex justify-content-center align-items-center min-vh-100 px-3">

    <div class="card form-card p-4 p-md-5">

        <h2 class="text-center fw-bold mb-4 h1">CREATE ACCOUNT</h2>

        <?php if (!empty($templateParams["errore"])): ?>
            <div class="alert alert-danger">
                <?php echo $templateParams["errore"]; ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email"
                    id="email"
                    name="email"
                    class="form-control form-control-lg"
                    placeholder="Your email"
                    required/>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                    id="password"
                    name="password"
                    class="form-control form-control-lg"
                    placeholder="Password"
                    required/>
            </div>

            <div class="mb-3">
                <label for="repeat_password" class="form-label">Repeat password</label>
                <input type="password"
                    id="repeat_password"
                    name="repeat_password"
                    class="form-control form-control-lg"
                    placeholder="Repeat your password"
                    required/>
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

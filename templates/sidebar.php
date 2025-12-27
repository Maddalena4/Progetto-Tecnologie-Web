<div class="offcanvas offcanvas-start sidebar-bg" tabindex="-1" id="sidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Chiudi"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column gap-3">
            <li class="nav-item">
                <a class="sidebar-link nav-link" href="#"><i class="bi bi-person-fill me-2"></i>
                    <?php
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }
                        ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link nav-link" href="admin.php?action=home"><i class="bi bi-house-fill me-2"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link nav-link" href="admin.php?action=corsi"><i class="bi bi-journal-bookmark-fill me-2"></i>Corsi</a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link nav-link" href="admin.php?action=facolta"><i class="bi bi-mortarboard-fill me-2"></i>Facoltà</a>
            </li>
            <li class="nav-item mt-5">
                <a class="sidebar-link nav-link text-danger" href="index.php?logout=1"><i class="bi bi-box-arrow-left me-2"></i>Esci</a>
            </li>
        </ul>
        <hr class="text-white my-3">
    </div>
</div>
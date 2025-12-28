<nav class="navbar navbar-light shadow-sm px-3">
    <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
        <i class="bi bi-list"></i>
    </button>
    <span class="fw-bold ms-2 text-white">Università di Bologna</span>
</nav>

<div class="offcanvas offcanvas-start sidebar-bg" tabindex="-1" id="sidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu Utente</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column gap-3">
            <li class="nav-item">
                <div class="sidebar-link nav-link d-flex align-items-center text-white">
                    <i class="bi bi-person-circle me-2"></i>
                    <span><?= htmlspecialchars($userEmail); ?></span>
                </div>
            </li>
            <li class="nav-item"><a class="sidebar-link nav-link" href="home_user.php"><i class="bi bi-house-fill me-2"></i>Home</a></li>
            <li class="nav-item"><a class="sidebar-link nav-link" href="#"><i class="bi bi-upload me-2"></i>Upload</a></li>
            <li class="nav-item"><a class="sidebar-link nav-link" href="#"><i class="bi bi-download me-2"></i>Download</a></li>
            <li class="nav-item"><a class="sidebar-link nav-link" href="#"><i class="bi bi-book-half me-2"></i>Libreria</a></li>
            <li class="nav-item"><a class="sidebar-link nav-link" href="#"><i class="bi bi-folder2-open me-2"></i>Scaricati</a></li>
        </ul>
        <hr class="text-white my-3">
        <ul class="nav flex-column mt-5">
            <li class="nav-item">
                <a class="sidebar-link nav-link text-white" href="index.php?logout=1">
                    <i class="bi bi-box-arrow-left me-2"></i>Esci
                </a>
            </li>
        </ul>
    </div>
</div>

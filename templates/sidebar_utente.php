<ul class="nav flex-column gap-3">

    <li class="nav-item">
        <div class="sidebar-link nav-link d-flex align-items-center text-white">
            <span class="bi bi-person-circle me-2" aria-hidden="true"></span>
            <span><?= htmlspecialchars($_SESSION['email']); ?></span>
        </div>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="user.php?action=facolta">
            <span class="bi bi-mortarboard-fill me-2" aria-hidden="true"></span>Facoltà
        </a>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="#">
            <span class="bi bi-upload me-2" aria-hidden="true"></span>Upload
        </a>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="#">
            <span class="bi bi-download me-2" aria-hidden="true"></span>Download
        </a>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="#">
            <span class="bi bi-star-half me-2" aria-hidden="true"></span>Valutati
        </a>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="#">
            <span class="bi bi-folder2-open me-2" aria-hidden="true"></span>Seguiti
        </a>
    </li>

    <li class="nav-item mt-5">
        <a class="sidebar-link nav-link text-white" href="index.php?logout=1">
            <span class="bi bi-box-arrow-left me-2" aria-hidden="true"></span>Esci
        </a>
    </li>

</ul>

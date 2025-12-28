<ul class="nav flex-column gap-3">

    <li class="nav-item">
        <div class="sidebar-link nav-link d-flex align-items-center text-white">
            <i class="bi bi-person-circle me-2"></i>
            <span><?= htmlspecialchars($_SESSION['email']); ?></span>
        </div>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="admin.php?action=home">
            <i class="bi bi-house-fill me-2"></i>Home
        </a>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="admin.php?action=corsi">
            <i class="bi bi-journal-bookmark-fill me-2"></i>Corsi
        </a>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="admin.php?action=facolta">
            <i class="bi bi-mortarboard-fill me-2"></i>Facoltà
        </a>
    </li>

    <li class="nav-item mt-5">
        <a class="sidebar-link nav-link text-white" href="index.php?logout=1">
            <i class="bi bi-box-arrow-left me-2"></i>Esci
        </a>
    </li>

</ul>

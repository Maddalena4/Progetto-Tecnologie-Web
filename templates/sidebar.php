<ul class="nav flex-column gap-3">

    <li class="nav-item">
        <div class="sidebar-link nav-link d-flex align-items-center text-white">
            <span class="bi bi-person-circle me-2"aria-hidden="true"></span>
            <span><?= htmlspecialchars($_SESSION['email']); ?></span>
        </div>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="admin.php?action=home">
            <span class="bi bi-house-fill me-2"aria-hidden="true"></span>Home
        </a>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="admin.php?action=corsi">
            <span class="bi bi-journal-bookmark-fill me-2"aria-hidden="true"></span>Corsi
        </a>
    </li>

    <li class="nav-item">
        <a class="sidebar-link nav-link" href="admin.php?action=facolta">
            <span class="bi bi-mortarboard-fill me-2"aria-hidden="true"></span>Facoltà
        </a>
    </li>

    <li class="nav-item mt-5">
        <a class="sidebar-link nav-link text-white" href="index.php?logout=1">
            <span class="bi bi-box-arrow-left me-2"aria-hidden="true"></span>Esci
        </a>
    </li>

</ul>

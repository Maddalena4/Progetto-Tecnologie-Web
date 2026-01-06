<div class="text-center d-flex flex-column justify-content-center align-items-center vh-100">
    <h1 class="fw-bold mb-4">BENVENUTO ADMIN!</h1>
    
    <h2 class="fs-5">numero utenti registrati: 
        <span id="numero-utenti" class="fw-bold"><?php echo $templateParams['stats']['utenti']; ?></span>
    </h2>
    <h2 class="fs-5">numero di facoltà: 
        <span id="numero-facolta" class="fw-bold"><?php echo $templateParams['stats']['facolta']; ?></span>
    </h2>
    <h2 class="fs-5">numero di corsi: 
        <span id="numero-corsi" class="fw-bold"><?php echo $templateParams['stats']['corsi']; ?></span>
    </h2>
</div>
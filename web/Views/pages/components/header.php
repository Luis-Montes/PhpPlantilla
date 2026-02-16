<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <?php if (isset($_SESSION["user"])): ?>
                        <a class="nav-link active" href="home">Home</a>
                    <?php endif; ?>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>

                <!-- Botones a la derecha -->
                <li class="nav-item ms-auto">
                    <div class="sign-in-box btn-group">
                        <?php if (isset($_SESSION["user"])): ?>
                            <a href="logout" class="btn btn-sign-up">Log out</a>
                        <?php else: ?>
                            <a href="login" class="btn btn-sign-in">Log in</a>
                            <a href="register" class="btn btn-sign-up">Sign up</a>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">Employee Management1</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="form_emp.php">Add Employee</a></li>
                <li class="nav-item"><a class="nav-link" href="show_data.php">Show Data</a></li>
                <li class="nav-item"><a class="nav-link" href="edit.php">Edit Data</a></li>
                <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item"><a class="nav-link" href="handelers/logout_user.php">Logout</a></li>
                <?php else:  ?>

                <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>


<?php
include "inc/header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (login_user($email, $password)) {
        set_messages('success', "Login successfully");
        header("location: form_emp.php");
        exit;
    }else{

        set_messages('danger', "fail Login try again !!");
        $_SESSION['old_email'] = $email;
        $_SESSION['old_password'] = $password;
            header("location: login.php");
        exit;
    }
}

?>


<h2>Register Form</h2>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">


    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" value="<?= isset($_SESSION['old_email']) ? $_SESSION['old_email'] : '' ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" value="<?= isset($_SESSION['old_password']) ? $_SESSION['old_password'] : '' ?>" class="form-control">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php include "inc/footer.php"; ?>
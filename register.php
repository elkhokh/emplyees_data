<?php 
include "inc/header.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if (valid_register($name , $email, $password , $password_confirm)) {
        set_messages('success', "Login successfully");
        if(register_user($name , $email, $password)){
            header("location: form_emp.php");
            exit;
        }
        return false;
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
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
        <label for="password_confirm" class="form-label">Confirm Password</label>
        <input type="password" id="password_confirm" name="password_confirm" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php include "inc/footer.php"; ?>
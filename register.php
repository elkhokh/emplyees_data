<?php include "inc/header.php";
// $var=base64_encode('mostafa');
// echo $var.'<br>'; 
//  echo base64_decode($var);

?>


<h2>Register Form</h2>
<form action="handelers/register_emps.php" method="POST">
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
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



<!-- 

<div class="content">
    <h1>Welcome to Employee Managment</h1>
</div>


<div class="container">
        <div class="row">
            <div class="col-4 mx-auto bg-light my-5 border border-dark border-3">
                <h1 class=" p-2 mt-2"> Login</h1>

                <form  method="post">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="submit"  class="form-control btn btn-success">
                    </div>

                </form>
            </div>
        </div>
    </div> -->
<?php include "inc/footer.php"; ?>
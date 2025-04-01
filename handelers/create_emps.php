<?php 
include __DIR__ . "/../core/validations.php";
include __DIR__ . "/../core/functions.php";

// include "../core/validations.php";
// include "../core/functions.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $salary=$_POST['salary'];
    $phone=$_POST['phone'];
    $type=$_POST['type'];

$type_of_error=valid_all_data($name,$email,$salary,$phone,$type);

if(!empty($type_of_error)){
set_messages('danger',$type_of_error);
header('location: ../form_emp.php');
exit;
}

if(add_data_in_json($name,$email,$salary,$phone,$type)){
    set_messages('success',"data added successfully");
    header("location: ../form_emp.php");
    exit;
}
else {
    set_messages('danger',"fail added data can you try again !!");
    header("location: ../form_emp.php");
    exit;
}
}










?>
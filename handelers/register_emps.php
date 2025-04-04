<?php 
session_start();
include __DIR__ . "/../core/validations.php";
include __DIR__ . "/../core/functions.php";

// include "../core/validations.php";
// include "../core/functions.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=trim($_POST['password']);
    $confirm_passowrd=trim($_POST['confirm_passowrd']);


$type_of_error=valid_register($name,$email,$password,$confirm_passowrd);

if(!empty($type_of_error)){
set_messages('danger',$type_of_error);
header("location: ../edit_emps.php?id=$id");
exit;
}

}
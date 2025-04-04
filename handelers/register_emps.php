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
    $confirm_passowrd=trim($_POST['confirm_password']);


$type_of_error=valid_register($name,$email,$password,$confirm_passowrd);

if(is_array($type_of_error)){
    
    if(register_user($name,$email,$password)){
        set_messages('success',"Registeration successfully");
        header("location: ../show_data.php");
        // echo "welldone";
        exit;
    }}
    if(!empty($type_of_error)){
    set_messages('danger',$type_of_error);
    header('location: ../register.php');
    exit;
    }
    
    else {
        set_messages('danger',"Fail Registeration can you try again !!");
        header("location: ../register.php");
        exit;
    }
}
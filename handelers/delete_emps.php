<?php
// include __DIR__ . "/../core/validations.php";
include __DIR__ . "/../core/functions.php";


if ($_SERVER['REQUEST_METHOD']!=="POST"||!isset($_POST['id'])||empty($_POST['id'])){
    set_messages('danger',"Invlid Requset !!");
    header('location : ../show_data.php');
    exit;
}


$value_id=$_POST['id'];
if(delete_data_in_json($value_id)){
    set_messages('success',"data delete successfully");
    header("location: ../show_data.php");
    exit;
}
else {
    set_messages('danger',"fail delete data can you try again !!");
    header("location: ../show_data.php");
    exit;
}
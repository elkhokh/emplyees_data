<?php 
session_start();

include __DIR__ . "/../core/validations.php";
include __DIR__ . "/../core/functions.php";

// include "../core/validations.php";
// include "../core/functions.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $value_id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $salary=$_POST['salary'];
    $phone=$_POST['phone'];
    $type=$_POST['type'];

    $data_update=valid_all_data($name,$email,$salary,$phone,$type);

if(!is_array($data_update)){
set_messages('danger',$data_update);
header("location: ../edit.php?id=$value_id");
exit;
}
$data_update['id']=$value_id;

if(update_data_in_json($data_update)){
    set_messages('success',"data updated successfully");
    header("location: ../show_data.php");
    exit;
}
else {
    set_messages('danger',"fail updated data can you try again !!");
    header("location: ../show_data.php");
    exit;
}
}












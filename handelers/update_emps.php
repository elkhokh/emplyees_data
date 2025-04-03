<?php 
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



    $type_of_error=valid_all_data($name,$email,$salary,$phone,$type);

if(!empty($type_of_error)){
set_messages('danger',$type_of_error);
header("location: ../edit_emps.php?id=$id");
exit;
}


$data_update =[
    'id'=>$value_id,
    'name'=>$name,
    'email'=>$email,
    'salary'=>$salary,
    'phone' => $phone,
    'type' => $type,
]; 


if(update_data_in_json($value_id,$data_update)){
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












<?php
//name(key_of_var)=> $name (var_input_data)
//check require input data 
function valid_data_require($var_input_data,$key_of_var){
    return empty($var_input_data)?"$key_of_var is required":null;}

function santize_data($name,$email,$salary,$phone){
    $email=filter_var($email, FILTER_SANITIZE_EMAIL);
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $salary = filter_var($salary,FILTER_SANITIZE_NUMBER_INT);
    $phone = filter_var($phone,FILTER_SANITIZE_NUMBER_INT);
    // echo $name;
    // exit;
    return [
        'name' => htmlspecialchars($name) ,
        'email' => $email,
        'salary' => $salary,
        'phone' => $phone
    ];

}
    // check validation email
function valid_email($email){
    return filter_var($email,FILTER_VALIDATE_EMAIL)?null:"valid email, you hack me man !!";}
// check validation salary
function valid_salary($salary){
    return (is_numeric($salary)&&$salary>0)?null:"can you enter your salary ture";}

function valid_phone($phone){
    return (is_numeric($phone))?null:"can you enter your phone ture";}

function valid_all_data($name,$email,$salary,$phone,$type){
    
    $sanitized = santize_data($name, $email, $salary, $phone);
    $sanitized['type']=$type;
    // print_r($sanitized);
    // exit;
  
    foreach($sanitized as $key =>$value){
        if($type_of_error=valid_data_require($value,$key)){
            return $type_of_error;}
    }

    if($type_of_error=valid_email($email)){
        return $type_of_error;}

    if($type_of_error=valid_salary($salary)){
        return $type_of_error;}

    if($type_of_error=valid_phone($phone)){
        return $type_of_error;}

        return $sanitized;
}


function valid_password($password){
    if(strlen($password)<6){
        return "password must be greater than 6";
    }
}
function valid_register(){

}




?>
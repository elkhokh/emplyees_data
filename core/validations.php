<?php
function valid_all_data($name,$email,$salary,$phone,$type){
    
    $sanitized = santize_data($name, $email, $salary, $phone);
    $sanitized['type']=$type;

    foreach($sanitized as $key =>$value)
    {
        if(valid_data_require($value,$key))
        {
            return  "$key is required";
        }
    }

    if(valid_email($email))
    {
        return  "$email is wrong email format";
    }

    if(valid_salary($salary))
    {
        return  "$salary is required";
    }

    if(valid_phone($phone))
    {
        return  "$phone is required";
    }

    return $sanitized;
}
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
    return filter_var($email,FILTER_VALIDATE_EMAIL)?null:"invalid email, you hack me man !!";}
// check validation salary
function valid_salary($salary){
    return (is_numeric($salary)&&$salary>0)?null:"can you enter your salary ture";}

function valid_phone($phone){
    return (is_numeric($phone))?null:"can you enter your phone ture";}

// function valid_all_data($name,$email,$salary,$phone,$type){
    
//     $sanitized = santize_data($name, $email, $salary, $phone);
//     $sanitized['type']=$type;
//     // print_r($sanitized);
//     // exit;
  
//     foreach($sanitized as $key =>$value){
//         if($type_of_error=valid_data_require($value,$key)){
//             return $type_of_error;}
//     }

//     if($type_of_error=valid_email($email)){
//         return $type_of_error;}

//     if($type_of_error=valid_salary($salary)){
//         return $type_of_error;}

//     if($type_of_error=valid_phone($phone)){
//         return $type_of_error;}

//         return $sanitized;
// }

  //testing check /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
  function valid_password($password) {
    $uppercase = preg_match('/[A-Z]/', $password);
    $lowercase = preg_match('/[a-z]/', $password);
    $number    = preg_match('/[0-9]/', $password);
    $length    = strlen($password) >= 8;

    switch ($password) {
        case !$uppercase:
            return "Password must contain at least one uppercase letter";
        case !$lowercase:
            return "Password must contain at least one lowercase letter";
        case !$number:
            return "Password must contain at least one number";
        case !$length:
            return "Password must be at least 8 characters long";
        default:
            return null;
    }
}

function check_confirm_password_valid($password,$confirm_password){
    return ($password===$confirm_password)? false :"Password is NOT the same confirm Password";
}
function valid_register($name,$email,$password,$confirm_passowrd){
$data_reg=[
    'name'=>$name,
    'email'=>$email,
    'password'=>$password,
    'confirm_password'=>$confirm_passowrd,
];
$type_of_error = [];
    foreach($data_reg as $key =>$value){


        if($type_of_error=valid_data_require($value,$key)){
            return $type_of_error[] = 'data is required';
        }
    }

if($type_of_error   =  valid_email($email)){
    return $type_of_error[] = 'valid email, you hack me man !!'; 
    ;}

if($type_of_error   =    valid_password($password)){
    return $type_of_error[] = 'Password must contain at least one uppercase letter';
    ;}

if($type_of_error  =  check_confirm_password_valid($password,$confirm_passowrd)){
    return $type_of_error[] = 'Password is NOT the same confirm Password'; 
    ;}

    return !$type_of_error ? $data_reg : $type_of_error; 

}


//  
function valid_login($email,$password){
    $data_reg=[
        'email'=>$email,
        'password'=>$password,
    ];
    $type_of_error = [];
    
    foreach($data_reg as $key =>$value){
        if($type_of_error==valid_data_require($value,$key)){
            return $type_of_error[] = 'data is required';}
    }
    
    if($type_of_error == valid_email($email)){
        return $type_of_error[] = 'valid email, you hack me man !!';
    }
    
        return !$type_of_error ? $data_reg : $type_of_error; 
}



?>
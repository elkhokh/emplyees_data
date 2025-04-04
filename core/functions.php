<?php
// session_start();
// in this function i have to parameter type of alert danger or success and type of empty data from type_of_error
function set_messages($type_of_alert,$message_of_error){
    // echo 'welcome';
    // exit;
$_SESSION['message']=[
    'type'=>$type_of_alert,
    'text'=>$message_of_error,
];
// print_r($_SESSION['message']);
}

function show_message(){
    if(isset($_SESSION['message'])){
        $type = $_SESSION['message']['type'];//success or danger
        $text = $_SESSION['message']['text'];// email or name etc 
        echo "<div class='alert alert-$type'>$text</div>";
        unset($_SESSION['message']);
    }   
}

    $json_file=realpath(__DIR__ . "/../data/emp.json");
    function add_data_in_json(array $elemnt){
        $user_data=file_exists($GLOBALS['json_file'])?json_decode(file_get_contents($GLOBALS['json_file']),true):[];
        
        if(!is_array($user_data)){
            $user_data=[];}
            $value_id=empty($user_data)?1:max(array_column($user_data,'id') )+1;
            
// var_dump($get_key);
// exit;
        
      $elemnt['id']=$value_id;

        $user_data[]=$elemnt;
        file_put_contents($GLOBALS['json_file'],json_encode($user_data,JSON_PRETTY_PRINT));
        return true;
    }
    function get_data_from_json()
    {
        // global $json_file;
        // $file = realpath(__DIR__ . "/../data/emp.json");
        $file=$GLOBALS['json_file'];
        return file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    }
    // print_r(get_data_from_json());

function update_data_in_json($value_id,$data_update){
    $file=$GLOBALS['json_file'];
    $data_emps =file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    if(!$data_emps) {
        return false;
    }

$flage=false;
    foreach($data_emps as &$emp){
        if($emp['id']==$value_id){
            $emp['name']=$data_update['name'];
            $emp['email']=$data_update['email'];
            $emp['salary']=$data_update['salary'];
            $emp['phone']=$data_update['phone'];
            $emp['type']=$data_update['type'];
            $flage=true;
            break;
        }
    }
    if(!$flage){
        return false;
    }
    file_put_contents($file,json_encode($data_emps,JSON_PRETTY_PRINT));
    return true;
}

function delete_data_in_json($value_id){
    $file=$GLOBALS['json_file'];
    if(!file_exists($file)) {
        return false;
}
    $data_emps = json_decode(file_get_contents($file), true) ;
    if(!$data_emps) {
        return false;
}

$flage=false;
    foreach($data_emps as $key => $emp){
        if($emp['id']==$value_id){
            unset($data_emps[$key]);
            $flage=true;
            break;
        }
    }
    if(!$flage){
        return false;
    }
    $data_emps=array_values($data_emps);
    file_put_contents($file,json_encode($data_emps,JSON_PRETTY_PRINT));
    return true;

}

$json_file_user=realpath(__DIR__ . "/../data/users.json");

function register_user($name,$email,$password){
    $user_data=file_exists($GLOBALS['json_file_user'])?json_decode(file_get_contents($GLOBALS['json_file_user']),true):[];
    
    if(!is_array($user_data)){
        $user_data=[];
    }
    // $var=base64_encode('mostafa');
// echo $var.'<br>'; 
//  echo base64_decode($var);
        $value_id=empty($user_data)?1:max(array_column($user_data,'id') )+1;
        $hashpassowrd=password_hash($password,PASSWORD_DEFAULT);
$data_of_register=[
    'id'=>$value_id,
    'name'=>$name,
    'email'=>$email,
    'password'=>$hashpassowrd
];
    $user_data[]=$data_of_register;
    file_put_contents($GLOBALS['json_file_user'],json_encode($user_data,JSON_PRETTY_PRINT));
    $_SESSION['user']=[
        'name'=>$name,
        'email'=>$email,
    ];
    
    return true;
}

function login_user($email,$password){
    $user_data=file_exists($GLOBALS['json_file_user'])?json_decode(file_get_contents($GLOBALS['json_file_user']),true):[];
    
    if(!is_array($user_data)){
        $user_data=[];
    }
    foreach($user_data as $user){
        if($user['email']==$email && password_verify($password,$user['password'])){
            $_SESSION['user']=[
                'email'=>$email,
                'name'=>$user['name']
            ];
            return true; 
        }
    }
    return false;
}
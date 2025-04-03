<?php
session_start();
// in this function i have to parameter type of alert danger or success and type of empty data from type_of_error
function set_messages($type_of_alert,$message_of_error){
$_SESSION['message']=[
    'type'=>$type_of_alert,
    'text'=>$message_of_error,
];}

function show_message(){
    if(isset($_SESSION['message'])){
        $type = $_SESSION['message']['type'];//success or danger
        $text = $_SESSION['message']['text'];// email or name etc 
echo "<div class='alert alert-$type'>$text</div>";
unset($_SESSION['message']);
    }   }

    $json_file=realpath(__DIR__ . "/../data/emp.json");
    function add_data_in_json($name,$email,$salary,$phone,$type){
        $user_data=file_exists($GLOBALS['json_file'])?json_decode(file_get_contents($GLOBALS['json_file']),true):[];
        
        if(!is_array($user_data)){
            $user_data=[];}
            $value_id=empty($user_data)?1:max(array_column($user_data,'id') )+1;
            
// var_dump($get_key);
// exit;
        
        $data_of_user =[
            'id'=>$value_id,
            'name'=>$name,
            'email'=>$email,
            'salary'=>$salary,
            'phone' => $phone,
            'type' => $type,
        ];
        $user_data[]=$data_of_user;
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

function update_data_in_json(){
    
}
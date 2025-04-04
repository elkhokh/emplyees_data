<?php

$json_file=realpath(__DIR__ . "/../data/emp.json");
$json_file_user=realpath(__DIR__ . "/../data/users.json");


function set_messages($type_of_alert,$message_of_error)
{
    $_SESSION['message']=[
        'type'=>$type_of_alert,
        'text'=>$message_of_error,
    ];

}
function show_message()
{
    if(isset($_SESSION['message'])){
        $type = $_SESSION['message']['type'];//success or danger
        $text = $_SESSION['message']['text'];// email or name etc 
        echo "<div class='alert alert-$type'>$text</div>";
        unset($_SESSION['message']);
    }   
}
//  git files from json
function get_data_from_json($file_name = '')
{
    if($file_name == '')
    {
        $file_name = $GLOBALS['json_file'];
    }

    if(!file_exists($file_name))
    {
        return false;
    }
    
    $file =  file_exists($file_name  ) ? json_decode(file_get_contents($file_name ), true) : [];

    if(!is_array($file))
    {
        set_data_in_json([] , $file);
    }
    return $file;
    
}

function set_data_in_json(array $data , $file = '')
{
    if(!$file)
    {
        $file = $GLOBALS['json_file'];
    }

    if(!file_exists($file))
    {
        return false;
    }
    file_put_contents($file,json_encode($data,JSON_PRETTY_PRINT));
    return true;
}



    
function add_data_in_json(array $data){
    $old_data= get_data_from_json();
    
    $old_data = is_array($old_data) ?   $old_data : [] ;
    
    $id=  empty($old_data)  ? 1 :  max(array_column($old_data,'id') ) + 1;
    
    $data['id']=$id;

    $old_data[]=$data;

    set_data_in_json($old_data);

    return true;
}
    

function update_data_in_json($data_update){
    $all_data = get_data_from_json();

    if(!$all_data) {
        return false;
    }


    foreach($all_data as &$emp){
        if( $emp['id']  ==  $data_update['id']){

            $emp['name']    =$data_update['name'];
            $emp['email']   =$data_update['email'];
            $emp['salary']  =$data_update['salary'];
            $emp['phone']   =$data_update['phone'];
            $emp['type']    =$data_update['type'];
            
            set_data_in_json($all_data);

            return true;
        }
    }
    
    return false;
}

function delete_data_in_json($id){
    $data = get_data_from_json();
    
    if(!$data)
    {
        return false;
    }

    foreach($data as $key => $emp){

        if($emp['id'] == $id)
        {
            unset($data[$key]);
            set_data_in_json(array_values($data));
            return true;
        }
    }
    
    return false;
}


function register_user($name,$email,$password){

    $data= get_data_from_json($GLOBALS['json_file_user']);

    $hashpassowrd=password_hash($password,PASSWORD_DEFAULT);

    $data = is_array($data) ? $data : [];
    
    $id = empty($data) ? 1 : (int) max(array_column($data,'id')) + 1 ;

    $data[] =
    [
        'id'=>$id , 
        'name'=>$name,
        'email'=>$email,
        'password'=>$hashpassowrd
    ];

        set_data_in_json($data , $GLOBALS['json_file_user']);

        create_user_session([
            'name'=>$name,
            'email'=>$email,
        ]);
    
    return true;
}

function login_user($email,$password){
    
    $data= get_data_from_json($GLOBALS['json_file_user']);

    $data = is_array($data) ? $data : [];

    foreach($data as $user){

        if($user['email']==$email && password_verify($password,$user['password'])){
            create_user_session([
                'email'=>$email,
                'name'=>$user['name']
            ]);
            return true; 
        }
    }
    return false;
}

function create_user_session($array):void
{
    if(isset($_SESSION['user']))
    {
        unset($_SESSION['user']);
    }
        $_SESSION['user']= $array;

}



<?php
session_start(); 

include_once 'dbconnect.php';
require_once 'class.Login.php';

if(!empty($_POST['type']) && $_POST['type']=='authenticate') {
    
    $current_login = Login::getLoggedInUser();
    if(!empty($current_login)){
        Login::logout();
    }

    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        
        $data = $_db->getDataFromTable(array(
            'username' => $_POST['username'],
            'password' => md5($_POST['password'])
        ), 'teacher');
        
        if(!empty($data[0])) {   
            $data = $data[0];
            unset($data['password']);
            $_SESSION['user'] = $data;
            echo json_encode($data);
        }
        else {
            echo '{"error":{"text":"Invalid credentials"}}';
        }
    }
    else {
        echo '{"error":{"text":"No credentials provided"}}';
    }

}

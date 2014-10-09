<?php
session_start(); 

include_once 'dbconnect.php';
require_once 'class.Login.php';

if(!empty(Login::getLoggedInUser())){
    Login::logout();
}

if(!empty($_POST['type']) && $_POST['type']=='authenticate') {

    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        
        $data = $_db->getDataFromTable(array(
            'username' => $_POST['username'],
            'password' => md5($_POST['password'])
        ), 'teacher');
        
        if(!empty($data)) {            
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

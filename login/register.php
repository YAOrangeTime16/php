<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

header('Location: ../partials/sign-up-form.php');
require 'class_register.php';

//--- connection -------------
require '../database/connection.php';
$mylocal = "localhost";
$pdo=db::connection($mylocal);
//-----------------------------

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['confirm_password'];
$message ="";
$exist;

//if all are filled in
if(empty($username)||empty($password)||empty($password2)):
    $_SESSION['reg_error'] = "Please fill in the form to register.";

else:
    //check username duplication
    $user = new Register($pdo);
    $exist = $user->check_user($username);

    if($exist):
        $_SESSION['duplication'] = "Sorry, this username already exists. Please use another name.";

    else:
        if($password !== $password2):
            $_SESSION['confirm'] = "Please confirm your password again";

        else:
            $user->set_hash($password);
            $user->add_user($username);
            header('Location: loggedin.php');
        endif;

    endif;

endif;


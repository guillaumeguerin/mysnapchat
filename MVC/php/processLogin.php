<?php
    
    include("connectdb.php");
    require_once("lib/recaptchalib.php");

    $link = mysql_connect($db_host, $db_username, $db_password);
    mysql_select_db("user", $link);

    $errors = array(); // array to hold validation errors
    $data = array(); // array to pass back data

    // validate the variables ======================================================

    if (empty($_POST['email']))
    $errors['email'] = 'An email address is required.';
    if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST['email']))
    $errors['email'] = 'Email address has an invalid format.';

    $selectEmail = "SELECT * FROM `user` WHERE `EMAIL` LIKE '" . $_POST['email'] . "'";
    $request = mysql_query($selectEmail, $link);
    $requestData = mysql_fetch_array($request);
    if (mysql_num_rows($request) == 0)
    $errors['email'] = 'Email address does not exist in the database.' . $selectEmail ;

    if (empty($_POST['password']))
    $errors['password'] = 'You need to enter a password.';
    if (strlen($_POST['password']) < 4)
    $errors['password'] = 'Password too short.';
    if (strlen($_POST['password']) > 20)
    $errors['password'] = 'Password too long.';
    if ($requestData['PASSWORD'] != md5($_POST['password']))
    $errors['password'] = 'Password does not match.';

    mysql_close($link);
    
    $privatekey = "6LddxO4SAAAAAFtuqo6yvNn7rUcfCf8fc5rFz6Ft";

    $resp = recaptcha_check_answer ($privatekey,
         $_SERVER['processLogin.php'],
         $_POST['recaptcha_challenge_field'],
         $_POST['recaptcha_response_field']);

    if (!$resp->is_valid) {
        $errors['captcha'] = 'The captcha is incorrect.';
    }


    // return a response ===========================================================

    // response if there are errors
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors'] = $errors;
    } 
    
    else {

        



        // if there are no errors, return a message
        $data['success'] = true;
        $data['message'] = 'Logged in as ' .$requestData['NAME'];
    }

    // return all our data to an AJAX call
    die(json_encode($data));

    
?>

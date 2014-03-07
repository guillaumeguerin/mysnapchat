<?php
    
    include("connectdb.php");
    require_once("lib/recaptchalib.php");

    $link = mysql_connect($db_host, $db_username, $db_password);
    mysql_select_db("user", $link);

    $errors = array(); // array to hold validation errors
    $data = array(); // array to pass back data

    // validate the variables ======================================================
    if (empty($_POST['name']))
    $errors['name'] = 'Name is required.';

    if (empty($_POST['email']))
    $errors['email'] = 'An email address is required.';
    if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST['email']))
    $errors['email'] = 'Email address has an invalid format.';

    $selectEmail = "SELECT NAME FROM `fees0_14337243_snapchat`.`user` WHERE `EMAIL` LIKE ".$_POST['email'];
    $request = mysql_query($selectEmail, $link);
    $dataEmail = mysql_fetch_array($request);
    if (mysql_num_rows($dataEmail) > 0)
    $errors['email'] = 'Email address already exists in the database.';


    if (empty($_POST['password']))
    $errors['password'] = 'You need to choose a password.';
    if (strlen($_POST['password']) < 4)
    $errors['password'] = 'Password too short.';
    if (strlen($_POST['password']) > 20)
    $errors['password'] = 'Password too long.';

    if (empty($_POST['confirm']))
    $errors['password'] = 'Please confirm your password.';
    if ($_POST['confirm'] != $_POST['password'])
    $errors['password'] = 'Passwords does not match.';


    /*
    $privatekey = "6LddxO4SAAAAAFtuqo6yvNn7rUcfCf8fc5rFz6Ft";

    $resp = recaptcha_check_answer ($privatekey,
         $_SERVER['process.php'],
         $_POST['recaptcha_challenge_field'],
         $_POST['recaptcha_response_field']);

    if (!$resp->is_valid) {
        $errors['captcha'] = 'The captcha is incorrect.';
    }
*/

    // return a response ===========================================================

    // response if there are errors
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors'] = $errors;
    } 
    
    else {

        $insertion = "INSERT INTO `fees0_14337243_snapchat`.`user` (`ID`, `EMAIL`, `PASSWORD`, `NAME`, `DESCRIPTION`, `PROFILE_PICTURE`, `DIRECTORY`) VALUES (NULL,'". $_POST['email'] ."', '". md5($_POST['password']) ."','". $_POST['name'] ."','" . $_POST['description'] . "','','');";
        mysql_query($insertion, $link);

        // if there are no errors, return a message
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);

    mysql_close($link);
?>

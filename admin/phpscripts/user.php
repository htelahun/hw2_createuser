<?php

function createUser($fname, $username, $password, $email, $userlvl){
  include('connect.php');

  $userString = "INSERT INTO tbl_user VALUES (NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NULL, '{$userlvl}', 'no')";
  //echo $userString;

  $userQuery = mysqli_query($link, $userString);

  if($userQuery){

    $to      = $email;
    $subject = 'Login Information';
    $message = " Hi {$fname} your user name is: {$username} and your password is: {$password}. Click the link to login: <a>index.php</a>" ;

    mail($to, $subject, $message);

    redirect_to("admin_index.php?");

  }else{
    $message = "there was a problem setting up this user.";

    return $message;
  }


  mysqli_close($link);
}




 ?>

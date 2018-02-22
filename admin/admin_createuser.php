<?php
//init_set('display_errors', 1);//mac
//error_reporting(E_All); //mac

require_once('phpscripts/config.php');
 confirm_logged_in();

if(isset($_POST['submit'])){
  $fname = trim($_POST ['fname']);
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $email = trim($_POST['email']);
  $userlvl = $_POST['userlvl'];

if(empty($userlvl)){
  $message = "Please select user level";
}else {
  $result = createUser($fname, $username, $password, $email, $userlvl);
  $message = $result;
}
}

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS Portal</title>
      <link rel="stylesheet" href="../css/main.css">
  </head>
  <body>
    <div class="title1">
        <?php
        echo "<h1> Welcome {$_SESSION['user_name']} to your create user page!</h1>";
        ?>
    </div>
<div class="mid">
<?php if(!empty($message)){echo $message;} ?>

</div>

    <form class="mid" action="admin_createuser.php" method="post">
      <label>First name:</label>
      <input type="text" name="fname" value="" <?php if(!empty($fname)){echo $fname;} ?>><br><br>

      <label>Username :</label>
      <input type="text" name="username" value="" <?php if(!empty($username)){echo $username;} ?>><br><br>

      <label>Password :</label>
      <input type="text" name="password" value="" <?php if(!empty($password)){echo $password;} ?>><br><br>

      <label class="last">Email :</label>
      <input type="text" name="email" value="" <?php if(!empty($email)){echo $email;} ?>><br><br>

      <label>User Level :</label>
      <select name="userlvl">
        <option value="">Please select user level</option>
        <option value="2">Web Admin</option>
        <option value="1">Web master</option>
      </select><br><br>

      <input class="click2" type="submit" name="submit" value="Create User">

    </form>


  </body>
</html>

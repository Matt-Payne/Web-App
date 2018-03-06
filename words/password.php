<?php
  session_start();
  $error='';
  if (isset($_POST["login"])) {
    if (empty($_POST['password'])) {
      $error = "Username cannot be empty";
    }
    else {
      // Define $username and $password
      $password=$_POST['password'];

      $connection = new mysqli('localhost','wordsroot','password','words');

      $query = "select * from wordstable where password='$password';";
      $result = $connection->query( $query );
      $rows   = $result->num_rows;
      if ($rows == 1) {
        $_SESSION['login_user']='password';

        header("Location: uploadpage.php");
        exit();
      } else {
        echo "<script>alert('Password is invalid');</script>";
        header("Location: passwordIncorrectPage.php");
      }
      $connection->close(); // Closing Connection
    }
  }
?>

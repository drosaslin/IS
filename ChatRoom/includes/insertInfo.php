<?php
  include_once ("dbms.php");

  if(isset($_POST['submit']) && !empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['email']) && !empty($_POST['uid']) && !empty($_POST['pwd']))
  {
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $hash = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
    $password = mysqli_real_escape_string($conn, $hash);


    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
            VALUES ('$first', '$last', '$email', '$uid', '$password');";

    mysqli_query($conn, $sql);
    header("location: ../../index.php?signup=success");
  }
  else
    header("location: ../signup.php?signup=unsuccessful");

  mysqli_close($conn);
 ?>

<?php
  include_once ("dbms.php");

  if(isset($_POST['submit']) && !empty($_POST['first']) && !empty($_POST['last']) &&
  !empty($_POST['email']) && !empty($_POST['uid']) && !empty($_POST['pwd']) && isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response'])
  {
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $password = mysqli_real_escape_string($conn, md5($_POST['pwd']));

    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
            VALUES ('$first', '$last', '$email', '$uid', '$password');";

    mysqli_query($conn, $sql);
    header("location: ../../index.php?signup=success");
  }
  else{
    $message = "Sign up error. Check if all the fields are filled and the captcha is solved.";
    echo "<script type='text/javascript'>
            alert('$message')
            location='../signup.php?signup=unsuccessful'</script>";
  }
  mysqli_close($conn);
 ?>

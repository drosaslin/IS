<?php
  include_once ("dbms.php");
  include_once ("loginFunctions.php");

  if(isset($_POST["submit"]) && isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] && !empty($_POST["uid"]) && !empty($_POST["pwd"]))
  {
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pass = mysqli_real_escape_string($conn, $_POST["pwd"]);
    $flag = false;
    $secret = '6LfXUD0UAAAAAGJcwCp_pmSCG8RyPz6bruv-M-7u';
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");

    while($row = mysqli_fetch_assoc($result))
    {
      if($row['user_uid'] == $uid && password_verify($pass, $row['user_pwd']))
      {
        if(userBlocked($uid, $conn) == 1)
           if(canUnblock($uid, $conn) == 0) break;

        clearFails($uid, $conn);

        session_start();
        setSessionVariables($secret, $ip, $captcha, $rsp, $uid);
        header("location: ../ChatRoom.php");
      }
      else if($row['user_uid'] == $uid && !password_verify($pass, $row['user_pwd']))
      {
        updateFails($uid, $conn);
        if(userBlocked($uid, $conn) == 1)
        {
          $blocked = "User blocked. Please try again later.";
          echo "<script type='text/javascript'>
                  alert('$blocked')
                  location='../../index.php?login=unsuccessful'</script>";
        }

        checkFailedLogins($uid, $conn);
        break;
      }
    }

    if($flag == false)
    {$message = "Connection unsuccessful!";
    echo "<script type='text/javascript'>
            alert('$message')
            location='../../index.php?login=unsuccessful'</script>";}
  }

  else
    {$message = "Sign in error. Check if all the fields are filled and the captcha is solved.";
    echo "<script type='text/javascript'>
            alert('$message')
            location='../../index.php?login=unsuccessful'</script>";}

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Connection Unsuccessful</title>
    <style type="text/css">
            body {
              background-color: #fff;
              text-align: center;
            }

            html{
              margin: auto;
            }

            p{
              font-family: helvetica;
              font-size: 10px;
            }

            a:link, a:visited{
              font-size: 15px;
              color:#74B496;
              font-weight: bold;
              text-decoration: none;
            }

          </style>
  </head>
  <body>
    <center>
    <a href = "..\..\index.php"><p style="font-size:20px">Click to go back</p></a>
  </center>
  </body>
</html>

<?php
  include_once ("dbms.php");
  include_once ("loginFunctions.php");

  if(isset($_POST["submit"]) && isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] && !empty($_POST["uid"]) && !empty($_POST["pwd"]))
  {
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pass = md5($_POST["pwd"]);
    $flag = false;

    while($row = mysqli_fetch_assoc($result))
    {
      if($row['user_uid'] == $uid && $row['user_pwd'] == $pass)
      {
        if(userBlocked($uid, $conn) == 1)
           if(canUnblock($uid, $conn) == 0) break;

        clearFails($uid, $conn);

        session_start();
        setSessionVariables($secret, $ip, $captcha, $rsp, $uid);
        header("location: ../ChatRoom.php");
      }
      else if($row['user_uid'] == $uid && $row['user_pwd'] != $pass)
      {
        updateFails($uid, $conn);
        if(userBlocked($uid, $conn) == 1)
          echo "User blocked. Please try again later.";

        checkFailedLogins($uid, $conn);
        break;
      }
    }

    if($flag == false)
      echo "<p style='color: #E196A2;
      font-size: 30px;
      font-family: Helvetica;
      font-weight: bold;
      margin: 20px;'> Connection unsuccessful :(</p>";
  }

  else
    echo "<p style='color: #E196A2;
    font-size: 30px;
    font-family: Helvetica;
    font-weight: bold;
    margin: 20px;'> Information not provided!</p>";

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

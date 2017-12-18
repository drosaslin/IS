<?php
  include_once ("dbms.php");

  if(isset($_POST["submit"]) && !empty($_POST["uid"]) && !empty($_POST["pwd"]))
  {
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    $uid = $_POST["uid"];
    $pass = md5($_POST["pwd"]);
    $flag = false;

    if($check > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        //echo $row['user_uid'] . "<br>";
        if($row['user_uid'] == $uid && $row['user_pwd'] == $pass && isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response'])
        {
          session_start();
          $secret = "6LfXUD0UAAAAAGJcwCp_pmSCG8RyPz6bruv-M-7u";
          $ip = $_SERVER['REMOTE_ADDR'];
          $_SESSION["uid"] = $_POST["uid"];
          $captcha = $_POST['g-recaptcha-response'];
          $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");

          header("location: ../ChatRoom.php");
          $flag = true;
        }
        if($flag == true) break;
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

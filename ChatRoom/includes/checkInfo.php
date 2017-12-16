<?php
  include_once ("dbms.php");

  if(isset($_POST["uid"]) && isset($_POST["pwd"]))
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
        if($row['user_uid'] == $uid && $row['user_pwd'] == $pass)
        {
          session_start();
          $_SESSION["uid"] = $_POST["uid"];
          header("location: ../ChatRoom.php");
          $flag = true;
        }
        if($flag == true) break;
      }
    }
    if($flag == false)
      echo "Connection unsuccessful =(";
  }
  else
    echo "Information not provided!";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href = "..\..\index.php"><p style="font-size:20px">Go back</p></a>
  </body>
</html>

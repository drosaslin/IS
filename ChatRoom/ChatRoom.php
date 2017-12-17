<?php
  session_start();

  if(isset($_POST['signout']))
  {
    session_destroy();
    unset($_SESSION['uid']);
    echo "<script>window.top.location.href = '../index.php';</script>";
  }

echo'<html>

<head>
  <title>~ Chat Room ~</title>
  <style type="text/css">
    .side-bar{
      background-color: #E196A2;
      border: none;
    }
    .error-msg{
      color: #74B496;
      font-size: 30px;
      font-family: Helvetica;
      font-weight: bold;
      font-style: oblique;
    }

  </style>
</head>';

if(isset($_SESSION['uid']))
{
  echo'
<FRAMESET cols="200,*">
  <FRAME class ="side-bar" src="SideBar.php">
  <FRAMESET rows="*,200">
    <FRAME src="Messages.php">
    <FRAME src="NewMessages.php">
  </FRAMESET>
</FRAMESET>
</html>';
}
else
{
echo '<p class="error-msg">Connection not established!!! :(</p>';
}
?>

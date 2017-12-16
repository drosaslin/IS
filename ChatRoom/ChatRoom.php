<?php
  session_start();
  //echo $_SESSION["uid"];
?>

<html>

<head>
  <title>Chat Room</title>
</head>

<FRAMESET cols="200,*">
  <FRAME src="SideBar.php">
  <FRAMESET rows="*,200">
    <FRAME src="Messages.php">
    <FRAME src="NewMessages.php">
  </FRAMESET>
</FRAMESET>
</html>

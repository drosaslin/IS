<?php
  session_start();
  //echo $_SESSION["uid"];
?>

<html>

<head>
  <title>~ Chat Room ~</title>
  <style type="text/css">
    .side-bar{
      background-color: #E196A2;
      border: none;
    }
  </style>
</head>

<FRAMESET cols="200,*">
  <FRAME class ="side-bar" src="SideBar.php">
  <FRAMESET rows="*,200">
    <FRAME src="Messages.php">
    <FRAME src="NewMessages.php">
  </FRAMESET>
</FRAMESET>
</html>

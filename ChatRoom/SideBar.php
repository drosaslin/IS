<?php
  session_start();
  echo "<p style='color: #74B496;
  font-size: 20px;
  font-family: Helvetica;
  margin: 0;'>Welcome! Your username is: </p>";
  echo "<p style='color: #B6D270;
  font-size: 15px;
  font-family: Helvetica;
  font-weight: bold;
  margin:0;'>" .$_SESSION['uid']. "</p>";
?>

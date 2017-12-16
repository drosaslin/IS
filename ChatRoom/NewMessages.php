<?php
session_start();
if(ISSET($_POST['message']))
{
  //connect to database
  $dbServerName = 'localhost';
  $dbUserName = 'root';
  $dbPassword = '';
  $dbName = 'loginsystem';
  $link = mysqli_connect($dbServerName, $dbUserName, $dbPassword,$dbName);

  /*$link = mysql_connect('localhost', 'IMuser', 'IMuser');*/
  if (!$link) { die('Could not connect: ' . mysql_error()); }
  else {/*echo 'AAA';*/}

  $message=mysqli_real_escape_string($link,$_POST['message']);
  $username=mysqli_real_escape_string($link,$_SESSION["uid"]);

  $sql="INSERT INTO messages(message,username)
        VALUES('$message','$username')";

  $result=mysqli_query($link,$sql);

  // sql to delete a record
  //$sql_del = "DELETE FROM messages(message,username);

  /*close connection*/
  mysqli_close($link);

}

echo '<html>';
echo '<head></head><body>';
echo '<form action="NewMessages.php" method="POST">';
echo '<input type="text" name="message"/><br><br>';
//echo '<textarea name="message" row="3" cols"50"></textarea>';
echo '<input type="submit" value="Send"/>';
echo '<input type="reset" value="Reset"/>';
//echo '<input type="button" value="Delete" onclick=/>';
echo '</form>';
echo '</body></html>';
?>

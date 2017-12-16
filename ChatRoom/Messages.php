<html>
<head>
  <meta http-equiv="refresh" content="2"/>
</head>
<body>
  <?php
  //this is where the messages from the server will go!

  //connect to database
  $dbServerName = 'localhost';
  $dbUserName = 'root';
  $dbPassword = '';
  $dbName = 'loginsystem';
  $link = mysqli_connect($dbServerName, $dbUserName, $dbPassword,$dbName);

  /*$link = mysql_connect('localhost', 'IMuser', 'IMuser');*/
  if (!$link) { die('Could not connect: ' . mysql_error()); }
  else {/*echo 'AAA';*/}

  //query the database
  $query = "SELECT * FROM messages";

  if($result=mysqli_query($link,$query)){

    /*fetch associative array*/
    while($row =mysqli_fetch_row($result)){
      echo $row[3]." says: ".$row[1].'</br>';
    }

    /*free result set*/
    mysqli_free_result($result);
  }

  /*close connection*/
  mysqli_close($link);

  ?>
</body>
</html>

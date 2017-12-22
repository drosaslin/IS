<html>
<head>
  <meta http-equiv="refresh" content="2"/>
</head>
<body>
  <?php
  //this is where the messages from the server will go!

  //connect to database
  include_once ("includes/dbms.php");
  include_once ("upload.php");

  /*$link = mysql_connect('localhost', 'IMuser', 'IMuser');*/
  if (!$conn)
    die('Could not connect: ' . mysql_error());

  //query the database
  $query = "SELECT * FROM messages";

  if($result=mysqli_query($conn,$query))
  {
    /*fetch associative array*/
    while($row =mysqli_fetch_row($result))
    {
        if(is_null($row[2]) && !is_null($row[1]))
        {
            echo "<p style='color: #E196A2;
            font-size: 15px;
            font-family: Helvetica;
            font-weight: bold;
            margin:0;'>".$row[4]." says: ".$row[1]."</p>";
        }
        else
        {
            echo "<p style='color: #E196A2;
            font-size: 15px;
            font-family: Helvetica;
            font-weight: bold;
            margin:0;'>".$row[4]." sent:<br>";
            showImage($row[2], $conn);
        }
    }
    /*free result set*/
    mysqli_free_result($result);
  }
  /*close connection*/
  mysqli_close($conn);

  ?>
</body>
</html>

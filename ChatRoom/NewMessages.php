<?php
session_start();
if(ISSET($_POST['message']))
{
  //connect to database
  include_once ("includes/dbms.php");

  /*$link = mysql_connect('localhost', 'IMuser', 'IMuser');*/
  if (!$conn) { die('Could not connect: ' . mysql_error()); }
  else {/*echo 'AAA';*/}

  $message=mysqli_real_escape_string($conn,$_POST['message']);
  $username=mysqli_real_escape_string($conn,$_SESSION["uid"]);

  $sql="INSERT INTO messages(message,username)
        VALUES('$message','$username')";

  $result=mysqli_query($conn,$sql);

  // sql to delete a record
  //$sql_del = "DELETE FROM messages(message,username);

  /*close connection*/
  mysqli_close($conn);

}

echo '<html><head>
<style type="text/css">
  html{
    margin:0;
    padding:0;
  }

  button{
    margin: 5px 10px;
    background: #C8E77B;
    background-image: linear-gradient(to bottom, #B6D270, #74B496);
    border-radius: 9px;
    font-family: Helvetica;
    color: #ffffff;
    font-size: 15px;
    padding: 11px 15px;
    border: none;
    float: right;
    width: 150px;
  }

  button:hover{
    background: #74B496;
    background-image: linear-gradient(to bottom, #74B496, #B6D270);
  }

  body{
    margin:0;
    width:100%;
  }

  form{
    margin:0;
  }

  input{
    margin: 10px 5px 10px 5px;
    width: 98%;
    height: 60%;
    border-radius: 4px;
    border: 2px solid #74B496;
  }

  input:focus{
    outline:none;
  }

</style>
</head><body>
<form action="NewMessages.php" method="POST">
<input type="text"autocomplete="off" name="message"/>
<button type="reset" value="Reset"/>Reset</button>
<button type="submit" value="Send"/>Send</button>
</form>
</body></html>';
?>

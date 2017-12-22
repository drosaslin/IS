<?php
session_start();
if(isset($_POST['message']))
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
    float: left;
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

  .msg{
    margin: 10px 5px 10px 5px;
    width: 98%;
    height: 60%;
    border-radius: 4px;
    border: 2px solid #74B496;
  }

  input:focus{
    outline:none;
  }

  .img::focus{
      outline:none;
  }

  input{
      float:right;
  }

</style>
</head><body>
<form action="NewMessages.php" method="POST">
<input class="msg" type="text"autocomplete="off" name="message"/>
<button type="reset" value="Reset"/>Reset</button>
<button type="submit" value="Send"/>Send</button>
</form>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit" name="upload">Upload Picture</button>
</form>
</body></html>';
?>

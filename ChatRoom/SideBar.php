<?php
  session_start();
  echo "<p style='color: #fff;
  font-size: 20px;
  font-weight:bold;
  font-family: Helvetica;
  margin: 10px;'>Welcome! Your username is: </p>";
  echo "<p style='color: #fff;
  font-size: 17px;
  text-align:center;
  font-family: Helvetica;
  font-style:italic
  margin:0;'>" .$_SESSION['uid']. "</p>";
?>

<html>
  <head>
      <style type="text/css">
      button{
        margin: 20px auto;
        background: #C8E77B;
        background-image: linear-gradient(to bottom, #B6D270, #74B496);
        border-radius: 9px;
        font-family: Helvetica;
        color: #ffffff;
        font-size: 15px;
        padding: 11px 15px;
        border: none;
      }

      button:hover{
        background: #74B496;
        background-image: linear-gradient(to bottom, #74B496, #B6D270);
      }

      .wrapper{
        text-align: center;
      }
      </style>
  </head>
  <body>
      <div class="wrapper">
        <form action="ChatRoom.php" method="POST">
          <button type="submit" name="signout">Sign out</button>
        </form>
    </div>
  </body>
</html>

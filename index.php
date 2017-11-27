<!DOCTYPE html>
<html>

  <head>
    <title>ChatRoom</title>
    <meta charset="UTF-16"/>
  </head>

  <body>
    <center>
      <form action="ChatRoom/includes/checkInfo.php" method="POST">
        <input type="text" name="uid" placeholder="Username"><br>
        <input type="password" name="pwd" placeholder="Password"><br>
        <button type="submit" name="submit">Sign in</button>
      </form>
      <a href = "ChatRoom/signup.php"><p style="font-size:15px">signup</p></a>
    </center>
  </body>

</html>

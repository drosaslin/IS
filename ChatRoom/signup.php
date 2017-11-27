<!DOCTYPE html>
<html>

  <head>
    <title>SignUp</title>
    <meta charset="UTF-16"/>
  </head>

  <body>
    <center>
      <form action="includes/insertInfo.php" method="POST">
        <input type="text" name="first" placeholder="Firstname"><br>
        <input type="text" name="last" placeholder="Lastname"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="uid" placeholder="Username"><br>
        <input type="password" name="pwd" placeholder="Password"><br>
        <button type="submit" name="submit">Submit</button>
      </form>
    </center>
  </body>

</html>

<!DOCTYPE html>
<?php
/*if (!(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' ||
   $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
   $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))
   {
     $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
     header('HTTP/1.1 301 Moved Permanently');
     header('Location: ' . $redirect);
     exit();
   }*/
?>

<html>

  <head>
    <title>~Chat Room~</title>
    <meta charset="UTF-16"/>
      <style type="text/css">
        body {
          background-color: #fff;
          text-align: center;
        }

        html{
          margin: auto;
        }

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

        p{
          font-family: helvetica;
          font-size: 13px;
        }

        .welcome-msg{
          color: #74B496;
          font-size: 30px;
          font-family: Helvetica;
          font-weight: bold;
          font-style: oblique;
        }

        input{
          margin-bottom: 10px;
          border: none;
          border-bottom: 2px solid #E196A2;
          width: auto;
        }

        input:focus{
          outline: none;
        }

        a:link, a:visited{
          color:#74B496;
          font-weight: bold;
          text-decoration: none;
        }

      </style>
        <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
    <center>
      <p class= "welcome-msg"> Welcome to our chat room! </p>
      <form action="ChatRoom/includes/checkInfo.php" method="POST">
        <input type="text" name="uid" placeholder="Username"><br>
        <input type="password" name="pwd" placeholder="Password"><br><br>
        <div class="g-recaptcha" data-sitekey="6LfXUD0UAAAAAPW6lAXFnn-owca962PSDrBnRsAA"></div>
        <button type="submit" name="submit">Sign in</button>
      </form>
      <p>Don't have an account?
      <a href = "ChatRoom/signup.php">Sign Up</a></p>
    </center>
  </body>

</html>

<!DOCTYPE html>
<html>

  <head>
    <title>SignUp</title>
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

            .signup-msg{
              color: #74B496;
              font-size: 30px;
              font-family: Helvetica;
              font-weight: bold;
            }

            input{
              margin-bottom: 20px;
              border: none;
              border-bottom: 2px solid #E196A2;
              width: auto;
            }

          </style>

  </head>

  <body>
    <center>
      <p class= "signup-msg"> Sign up! </p>
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

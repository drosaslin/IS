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

            input:focus{
              outline: none;
            }

            .pwd{
                margin-bottom: 0;
            }

            progress{
              margin: 20px auto;
            }

          </style>
          <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
    <center>
      <p class= "signup-msg"> Sign up! </p>
      <form action="includes/insertInfo.php" method="POST">
        <input type="text" name="first" id="name" placeholder="Firstname"><br>
        <input type="text" name="last" placeholder="Lastname"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="uid" placeholder="Username"><br>
        <input type="password" class = "pwd" name="pwd" id="pwd" placeholder="Password"><br>
        <progress max="100" value="0" id="strength" style="width: 160px; height: 10px"></progress><br>
        <div class="g-recaptcha" data-sitekey="6LfXUD0UAAAAAPW6lAXFnn-owca962PSDrBnRsAA" style="transform:scale(0.60);"></div>
        <button type="submit" name="submit">Submit</button>
      </form>
    </center>
  </body>

  <script type="text/javascript">
    var pass = document.getElementById("pwd");
    pass.addEventListener('keyup', function(){
      checkPassword(pass.value);
    });

    function checkPassword(pwd)
    {
      //alert("I've been called");
      var strengthBar = document.getElementById("strength");
      var strength = 0;

      if(pwd.match(/[a-z0-9]+/))
        strength += 1;
      if(pwd.match(/[A-Z0-9]+/))
        strength += 1;
      if(pwd.match(/[~<>?]+/))
        strength += 1;
      if(pwd.match(/[!@#$%^&*()]+/))
        strength += 1;
      if(pwd.length > 5)
        strength += 1;

      if(strength == 0)
        strengthBar.value = 0;
      else if(strength == 1)
        strengthBar.value = 20;
      else if(strength == 2)
        strengthBar.value = 40;
      else if(strength == 3)
        strengthBar.value = 60;
      else if(strength == 4)
        strengthBar.value = 80;
      else if(strength == 5)
        strengthBar.value = 100;
    }
    </script>

</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>user page</title>
    <!--custom css file link -->
    <link rel="stylesheet" href="registration_style.css" />
  </head>

  <body>
  <?php
    require_once ('../header/header.php');
?>
    <div class="container">
      <div class="content">
        <h3>hi, <span>user</span></h3>
        <h1>welcome <span></span></h1>
        <p>this is a user page</p>
        <a href="./login_form.html" class="btn">login</a>
        <a href="./register_form.html" class="btn">register</a>
        <a href="./logout.html" class="btn">logout</a>
      </div>
    </div>
  </body>
</html>
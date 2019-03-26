<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    session_start();
    if(empty($_SESSION['id'])){
     header("location:denglu.html");
    }

     ?>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>

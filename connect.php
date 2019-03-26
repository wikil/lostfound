<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $dbhost = 'localhost';  // mysql服务器主机地址
    $dbuser = 'root';            // mysql用户名
    $dbpass = 'root';          // mysql用户名密码
    $dbname = 'lostdata';
    // $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass);

    if(! $conn )
    {
        die('Could not connect: ' . mysqli_error());
    }
  //echo '数据库连接成功!';

    mysqli_select_db($conn,$dbname);//选择数据库（我的是test）
    ?>

  </body>
</html>

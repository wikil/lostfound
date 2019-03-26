<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <script type="text/javascript" src="js/popups.js"></script>
    <script type="text/javascript">
      // $('#demo5').click(function () {
        function test(){
        jqalert({
          title:'提示',
          content:'注销成功',
          yeslink:'denglu.html'
        })
      })
       </script> -->
    <title>注销</title>
    <?php

    session_start();
    session_destroy();


    // echo "<script type='text/javascript'>test();</script>";
          echo '<script language="JavaScript">;alert("注销成功！");location.href="denglu.html";</script>;';
  //  header("refresh:2;url = index.php");
     ?>
  </head>
  <body>


  </body>
</html>

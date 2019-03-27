<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?PHP
        header("Content-Type: text/html; charset=utf-8");
        if(!isset($_POST["ag"])){
            echo '<script language="JavaScript">;alert("必须勾选用户协议");location.href="login.php";</script>;';}
            // exit("必须勾选用户协议");}
        //检测是否有submit操作
        include('connect.php');//链接数据库

        $name = $_POST['name'];//post获得用户名表单值
        $password = $_POST['password'];//post获得用户密码单值
        $idnew = $_POST['id'];
        $tel = $_POST['tel'];
        $repeat_password = $_POST['repeat_password'];
        $school = $_POST['school'];
        $txt_hyan = $_POST['txt_hyan'];
        $txt_yan = $_POST['txt_yan'];
        $vcode = $_POST['vcode'];

        //读取手机验证码
        $code_sql = "select vcode,date from vcode where tel = '$tel' order by date desc'";
        $code_res = $conn->query($code_sql);
        $row= $code_res->fetch_array();
        $new_vcode = $row['vcode'];
        $code_time = $row['date'];

        $sql="select * from register where id='$idnew'";
        $rs=mysqli_query($conn,$sql);

        $arr = mysqli_fetch_array($rs,MYSQL_ASSOC);
         echo mysql_error();
        if ($name && $password && $idnew && $tel && $repeat_password && $school && $txt_yan && $vcode){
          //如果用户名和密码都不为空

          if (!($new_vcode==$vcode)){
              echo '<script language="JavaScript">;
                   alert("手机验证码输入错误");
                   location.href="login.php";</script>;';
          } else if(date("Y/m/d G:i:s")-$code_time>1800) {
              echo '<script language="JavaScript">;
                   alert("手机验证码超时");
                   location.href="login.php";</script>;';
          } else if (!($txt_hyan==$txt_yan))
          {
            echo '<script language="JavaScript">;
                   alert("验证码输入错误");
                   location.href="login.php";</script>;';
          }else{


            if($arr['id']==$idnew)
            {
              echo '<script language="JavaScript">;alert("用户名已存在，请重新注册！");location.href="login.php";</script>;';


            }
          // header("Location: login.html");
            else
            {
              if (!($password==$repeat_password))
            {

              echo '<script language="JavaScript">;
                    alert("两次输入密码必须相同");
                    location.href="login.php";</script>;';

            }
              else {

              $q="insert into register (id,name,password,tel,school) values ('$idnew','$name','$password','$tel','$school')";//向数据库插入表单传来的值的sql
              $reslut=mysqli_query($conn,$q);//执行sql
              if (!$reslut) {
                die('Error: ' . mysqli_error());//如果sql执行失败输出错误

              }else{
                  echo '<script language="JavaScript">;alert("注册成功!");location.href="denglu.html";</script>;';
              //  echo "注册成功";//成功输出注册成功
              //  header("Location: tiaozhuang.html");//跳转到登陆界面
              }



            mysqli_close($conn);//关闭数据库

                // 面向对象
                // if ($conn->query($q) === TRUE) {
                //     echo "注册成功";
                //
                //     header("Location: tiaozhuang.html");
                // } else {
                //     echo "Error: " . $sql . "<br>" . $conn->error;
                // }
                //
                // $conn->close();
          }
          }
          }

          }else{//如果用户名或密码有空
                    // echo "表单填写不完整";
                    echo '<script language="JavaScript">;alert("注册信息填写不完整，请重新填写");location.href="login.php";</script>;';
                    // echo "
                    //       <script>
                    //             setTimeout(function(){window.location.href='login.html';},1000);
                    //       </script>";

                            //如果错误使用js 1秒后跳转到登录页面重试;
              mysql_close($conn);//关闭数据库
        }


    ?>

  </body>
</html>

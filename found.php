<?PHP
    header("Content-Type: text/html; charset=utf-8");
    session_start();
    include('connect.php');//链接数据库
    date_default_timezone_set("PRC");


    $name = $_POST['name'];//post获得用户名表单值
    $found_id = (isset($_POST['found_id']) ? $_POST['found_id'] : null);
    $id = $_POST['id'];
    $date = date("Y/m/d G:i:s");
    $school = $_POST['school'];
    $founder_id = $_SESSION['id'];
    $info = $_POST['info'];
    if ($name && $found_id && $id && $school)//如果用户名和密码都不为空
      {
        $sql="select * from register where id='$id'";
        $rs=mysqli_query($conn,$sql);
        $arr = mysqli_fetch_array($rs,MYSQL_ASSOC) ;

        //查找found_id电话号
        $sql_found_id="select * from register where id='$founder_id'";
        $rs_found_id=mysqli_query($conn,$sql_found_id);
        $arr_found_id = mysqli_fetch_array($rs_found_id,MYSQL_ASSOC) ;

        $sql_lost="select * from lost where id='$id'";
        $rs_lost=mysqli_query($conn,$sql_lost);
        $arr_lost = mysqli_fetch_array($rs_lost,MYSQL_ASSOC) ;

        if($arr_lost['id']==$id){
          $q_lost = "DELETE from lost where id ='$id' ";
          $reslut_lost=mysqli_query($conn,$q_lost);
          if (!$reslut_lost)
          {
            echo $arr_lost['id'];
            die('Error: ' . mysqli_error($conn));//如果sql执行失败输出错误

            }
        }
        if($arr['id']==$id){

          $q="insert into success (id,date,success_id) values ('$id','$date','1')";//向数据库插入表单传来的值的sql
          $reslut=mysqli_query($conn,$q);//执行sql

          if (!$reslut)
          {
            die('Error: ' . mysqli_error());//如果sql执行失败输出错误

            }else{
            include('qcloudsms_php-master/demo/simple/app.php');
            echo '<script language="JavaScript">;alert("已找到失主，成功发送短信！");location.href="index.php";</script>;';
              //header("Location: index.php");//跳转到登陆界面
            }
        }
        else{
          $q="insert into found (id,name,found_id,school,date,founder_id,info) values ('$id','$name','$found_id','$school','$date','$founder_id','$info')";//向数据库插入表单传来的值的sql
          $reslut=mysqli_query($conn,$q);//执行sql
          if (!$reslut)
          {
            die('Error: ' . mysqli_error());//如果sql执行失败输出错误

            }else{
              echo '<script language="JavaScript">;alert("提交成功！");location.href="index.php";</script>;';
            
            }
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



    else{
                echo '<script language="JavaScript">;alert("提交信息填写不完整，请重新填写");location.href="index.php";</script>;';
                // echo "
                //       <script>
                //             setTimeout(function(){window.location.href='found.php';},1000);
                //       </script>";

                        //如果错误使用js 1秒后跳转到登录页面重试;
          mysqli_close($conn);//关闭数据库
    }


?>

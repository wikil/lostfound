<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php

    include('connect.php');//链接数据库
    date_default_timezone_set("PRC");
    $name = $_POST['name'];//post获得用户名表单值
    $id = $_POST['id'];//post获得用户密码单值
    $tel = $_POST['tel'];
    $school = $_POST['school'];
    $date = date("Y/m/d G:i:s");

    $sql="select * from found where id='$id'";
    $rs=mysqli_query($conn,$sql);
    $arr = mysqli_fetch_array($rs,MYSQL_ASSOC) ;
    $founder_id = $arr['founder_id'];

    if ($name && $tel && $id && $school)//如果用户名和密码都不为空
      {
        if($arr['id']==$id){
          echo '已找到证件';

          $q="insert into success (id,date,success_id) values ('$id','$date','0')";//向数据库插入表单传来的值的sql
          $q_found="DELETE from found where id ='$id' ";

          $result_found = mysqli_query($conn,$q_found);
          if (!$result_found)
          {
            echo $arr['id'];
            die('Error: ' . mysqli_error($conn));//如果sql执行失败输出错误

            }


          $result_success=mysqli_query($conn,$q);//执行sql
          if (!$result_success)
          {
            die('Error: ' . mysqli_error());//如果sql执行失败输出错误

            }else{
              $sql_founder="select * from register where id='$founder_id'";
              $rs_founder=mysqli_query($conn,$sql_founder);
              $arr_founder = mysqli_fetch_array($rs_founder,MYSQL_ASSOC);
              $tel_founder = $arr_founder['tel'];
              $name_founder = $arr_founder['name'];
              echo $tel_founder,$name_founder;
            // echo '<script language="JavaScript">;alert(\"您的证件已被$name_founder找到，请联系:$tel_founder.\");location.href="index.php";</script>;';
            }

        }
        else{
          $q_lost="insert into lost (id,name,tel,school,date) values ('$id','$name','$tel','$school','$date')";//向数据库插入表单传来的值的sql
          $result_lost=mysqli_query($conn,$q_lost);//执行sql
          if (!$result_lost)
          {
            die('Error: ' . mysqli_error());//如果sql执行失败输出错误

            }else{
                echo '<script language="JavaScript">;alert("提交成功！");location.href="sign.php";</script>;';
            }


        }


        mysqli_close($conn);//关闭数据库
      }



        else{
                //如果用户名或密码有空
                echo '<script language="JavaScript">;alert("提交信息填写不完整，请重新填写   ");location.href="index.php";</script>;';

          mysqli_close($conn);//关闭数据库
    }

     ?>
  </head>
  <body>

  </body>
</html>

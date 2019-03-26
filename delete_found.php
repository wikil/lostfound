<?php
include("connect.php");
session_start();
if(empty($_SESSION['id'])){
 header("location:denglu.html");
}
$id = $_SESSION['id'];
$q_found="DELETE from found where id ='$id' ";

$result_found = mysqli_query($conn,$q_found);
if (!$result_found)
{

  die('Error: ' . mysqli_error($conn));//如果sql执行失败输出错误

}else{
  echo '<script language="JavaScript">;alert("删除成功！");location.href="sign.php";</script>;';
}
mysqli_close($conn);
?>

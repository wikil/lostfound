<?php

//在lost表中检索是否丢失
$id = $_SESSION['id'];
$sql_lost="select * from lost where id='$id'";
$rs_lost=mysqli_query($conn,$sql_lost);
$arr_lost = mysqli_fetch_array($rs_lost,MYSQL_ASSOC) ;

//在found表中检索是否找到
$sql_found="select * from found where id='$id'";
$rs_found=mysqli_query($conn,$sql_found);
$arr_found = mysqli_fetch_array($rs_found,MYSQL_ASSOC) ;







// if($arr_lost['id']){
//     echo "<button class='btn btn-primary btn-current' onclick='location.href='index.php'' type='button' hidden >已找到 </button>";
//     echo "已丢失";
//     echo "<p> aaaa <p/>";
// } else if($arr_found['id']) {
//     echo "<button class='btn btn-primary btn-current' onclick='location.href='index.php'' type='button'>已领取 </button>";
//     echo "被拾取";
// }else{
//     echo "正常";
// }

 ?>

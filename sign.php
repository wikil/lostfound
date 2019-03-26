


<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>个人信息</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <script src="js/rem.js"></script>
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="css/base.css"/>
  <link rel="stylesheet" type="text/css" href="css/page.css"/>
  <link rel="stylesheet" type="text/css" href="css/all.css"/>
  <link rel="stylesheet" type="text/css" href="css/mui.min.css"/>
  <link rel="stylesheet" type="text/css" href="css/loaders.min.css"/>
  <link rel="stylesheet" type="text/css" href="css/loading.css"/>
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<script type="text/javascript">
  $(window).load(function(){
    $(".loading").addClass("loader-chanage")
    $(".loading").fadeOut(300)
  })
</script>

 <style type="text/css">
   #box1{
     position: relative;
     background: url("card.png");
     z-index: 1;
     top:-120px;
   }
 </style>


  <?php
   session_start();
   if(empty($_SESSION['id'])){
    header("location:denglu.html");
   }
   $id = $_SESSION['id'];
   include('connect.php');

   include('button.php');

   $sql = "SELECT name,id,school,tel FROM register WHERE id = '$id'";
   $retval = mysqli_query($conn, $sql );
if(! $retval )
{
   die('无法读取数据: ' . mysqli_error($conn));
}

$row = mysqli_fetch_array($retval);

mysqli_close($conn);
  ?>



</head>
<!--loading页开始-->
<div class="loading">
	<div class="loader">
        <div class="loader-inner pacman">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
	</div>
</div>
<!--loading页结束-->
	<body>

    <footer class="page-footer fixed-footer" id="footer">
            <ul>
              <li>
                <a href="index.php">
                  <i class="iconfont icon-shouyev1"></i>
                  <p>首页</p>
                </a>
              </li>
              <li>
                <a href="xuqiu.html">
                  <i class="iconfont icon-gerenzhongxin"></i>
                  <p>拾到证件</p>
                </a>
              </li>
              <li>
                <a href="lost.php">
                  <i class="iconfont icon-gerenzhongxin"></i>
                  <p>一键丢失</p>
                </a>
              </li>
              <li  class="active">
                <a href="sign.php">
                  <i class="iconfont icon-gerenzhongxin"></i>
                  <p>个人信息</p>
                </a>
              </li>
            </ul>
      </footer>

      <div class="headertwo clearfloat" id="header">
        <a href="javascript:history.go(-1)" class="fl box-s"><i class="iconfont icon-arrow-l fl"></i></a>
        <p class="fl">个人信息</p>
      </div>

      <div class="sign clearfloat" id="main">
        <ul>
   <div  align="center">

     <div style="position:relative; width:375px;" >
       <img src="card.png"  width="375px"/>
      　　<div style="position:absolute; z-index:2; left:140px; top:82px;">
              <span class = 'wawa'>姓名：<?php echo $row['name']; ?></span>

      </div>
      <div style="position:absolute; z-index:2; left:140px; top:113px;">

              <span class = 'wawa'>学号：<?php echo $row['id'];?></span>
      </div>
              <div style="position:absolute; z-index:2; left:140px; top:144px;">

                      <span class = 'wawa'>学院：<?php echo $row['school']; ?></span>
              </div>

              <div style="position:absolute; z-index:2; left:50px; top:200px;" <?php if($arr_lost['id']||$arr_found['id']){echo "hidden";} ?>>
                      <img src="green.png" alt="绿灯" width="18px">
                      <span class = 'wawa' style="color:white">正常</span>
              </div>
              <div style="position:absolute; z-index:2; left:50px; top:200px;" <?php if(!($arr_lost['id'])){echo "hidden";}?>>
                      <img src="red.png" alt="红灯" width="18px" >
                      <span class = 'wawa' style="color:white" >已丢失</span>
              </div>
              <div style="position:absolute; z-index:2; left:50px; top:200px;" <?php if(!($arr_found['id'])){echo "hidden";}?>>
                      <img src="red.png" alt="红灯" width="18px">
                      <span class = 'wawa' style="color:white">已被拾取</span>
              </div>
     </div>
     <div class="land-ctent land-ctenttwo clearfloat">

               <!-- <button type="submit" id="submit_button" class="btn btn-primary btn-current">确认发布</button> -->

              <button  class='btn btn-primary btn-current' onclick="location.href='delete_lost.php'" type="button" <?php if(!$arr_lost['id']){echo "hidden";} ?> > 已找到 </button>
              <button  class='btn btn-primary btn-current' onclick="location.href='delete_found.php'" type="button" <?php if(!$arr_found['id']){echo "hidden";} ?> > 已领取 </button>
             </div>

             <div class="land-ctent land-ctenttwo clearfloat">

               <div class="" id="footer">
                 <!-- <button type="submit" id="submit_button" class="btn btn-primary btn-current">确认发布</button> -->
                 <button  class='btn btn-primary btn-current' onclick="location.href='logout.php'" type="button" > 注销登陆 </button>
               </div>
             </div>

   </div>

　　

          <!-- <li class="clearfloat">
            <i class="iconfont icon-phone fl"></i>
            <p type="text" id="" value="" class="fl phone" >姓名:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php //echo $row['name']; ?></p>
          </li>
          <li class="clearfloat">
            <i class="iconfont icon-lock fl"></i>
            <p type="text" id="" value=""  class="fl phone" >学号:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php //echo $row['id'];?></p>
          </li>

          <li class="clearfloat">
            <i class="iconfont icon-lock fl"></i>
            <p type="text" id="" value=""  class="fl phone" >学院:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php //echo $row['school']; ?></p>
          </li> -->
               <!-- <div align="center"><img src="card.png" width="100%"alt="" ></div> -->



        <!-- </ul>
      </div> -->



      <!-- </div> -->



<!-- <br>
<br>
<br>
<br>
<br>
  <footer class="page-footer fixed-footer" id="footer">
    <ul>
      <li>
        <a href="index.php">
          <i class="iconfont icon-shouyev1"></i>
          <p>首页</p>
        </a>
      </li>
      <li>
        <a href="xuqiu.html">
          <i class="iconfont icon-gerenzhongxin"></i>
          <p>拾到证件</p>
        </a>
      </li>
      <li>
        <a href="yibang.html">
          <i class="iconfont icon-gerenzhongxin"></i>
          <p>一键丢失</p>
        </a>
      </li>
      <li class="active">
        <a href="sign.php">
          <i class="iconfont icon-gerenzhongxin"></i>
          <p>个人信息</p>
        </a>
      </li>
    </ul>
  </footer> -->

	</body>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	<script type="text/javascript" src="js/jquery.SuperSlide.2.1.js" ></script>
	<script type="text/javascript" src="slick/slick.min.js" ></script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<script type="text/javascript" src="js/tchuang.js" ></script>
	<script type="text/javascript" src="js/hmt.js" ></script>
	<script type="text/javascript">

		jQuery(".notice").slide({ titCell:".tab-hd li", mainCell:".tab-bd",trigger: "click",delayTime:0 });
	</script>
</html>

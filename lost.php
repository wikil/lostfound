<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php
    session_start();

    if(empty($_SESSION['id'])){
     header("location:denglu.html");
    }
    $id = $_SESSION['id'];
    include('connect.php');
    $sql = "SELECT name,id,school,tel FROM register WHERE id = '$id'";
    $retval = mysqli_query($conn, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($conn));
}

$row = mysqli_fetch_array($retval);

mysqli_close($conn);
include('connect.php');
include('button.php');

     ?>
     <!-- <script type="text/javascript">
      document.getElementById("name").value="Joshua";
     </script> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>确认发布</title>
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
		<div class="headertwo clearfloat" id="header">
			<a href="javascript:history.go(-1)" class="fl box-s"><i class="iconfont icon-arrow-l fl"></i></a>
			<p class="fl">确认信息</p>

		</div>
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
              <li  class="active">
                <a href="lost.php">
                  <i class="iconfont icon-gerenzhongxin"></i>
                  <p>一键丢失</p>
                </a>
              </li>
              <li>
                <a href="sign.php">
                  <i class="iconfont icon-gerenzhongxin"></i>
                  <p>个人信息</p>
                </a>
              </li>
            </ul>
      </footer>

    <div class="recom-tit clearfloat box-s">
        <p>我的信息</p>
      </div>
        <form class="" name='lost' action="lost_1.php" method="post">
<div class="land-ctent land-ctenttwo clearfloat">
  <ul>
    <li class="box-s clearfloat">
      <p class="tit fl">姓名</p>
      <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>"  class="fl" />
    </li>
    <li class="box-s clearfloat">
      <p class="tit fl">学号</p>
      <input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" class="fl" />
    </li>
    <li class="box-s clearfloat">
      <p class="tit fl">学院</p>
      <input type="text" name="school" id="school" value="<?php echo $row['school']; ?>" class="fl" />
    </li>
    <li class="box-s clearfloat">
      <p class="tit fl">联系方式</p>
      <input type="text" name="tel" id="tel" value="<?php echo $row['tel']; ?>"  class="fl" />
    </li>
  </ul>
  <div class="" id="footer">
    <!-- <button type="submit" id="submit_button" class="btn btn-primary btn-current">确认发布</button> -->
    <button  class="btn btn-primary btn-current"  type="submit" <?php if($arr_lost['id']){echo "hidden";} ?> > 确认发布 </button>
  </div>
  </form>
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

<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <?php

     session_start();
     if(empty($_SESSION['id'])){
      header("location:denglu.html");
     }
     include("connect.php");
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		} else {
			$page = 0; //若没有page参数则默认为0
		}

		//lostpage为lost页的页数，由0开始
		if(isset($_GET['lost_page'])){
		    $lost_page = $_GET['lost_page'];
        } else {
		    $lost_page = 0;
        }

        if(isset($_GET['lp'])){
            $lp = 1;
        } else {
            $lp = 0;
        }

		//查询找到的卡
		$down=5*$page;
		$up=$down+5;
		$sql = "select name,id,date,school from found order by date desc limit $down,$up";
		$count_sql = "select count(*) from found";
		$res=mysqli_query($conn,$count_sql);
		$row=mysqli_fetch_array($res)[0];
		$max_page = $row/5;//最大页数
        $cards = $conn->query($sql);

        //查询丢失的卡
        $down=5*$lost_page;
        $up=$down+5;
        $sql = "select name,id,date,school from lost order by date desc limit $down,$up";
        $count_sql = "select count(*) from lost";
        $res=mysqli_query($conn,$count_sql);
        $row=mysqli_fetch_array($res)[0];
        $max_lost_page = $row/5;//最大页数
        $lost_cards = $conn->query($sql);

    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>东大证件失物招领</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="js/rem.js"></script>
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			function getQueryVariable(variable){
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
			}
		</script>
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
			<p class="fl">东大证件失物招领</p>
		</div>
		<div class="clearfloat" id="main">
			<div class="schedule clearfloat">
				<div class="notice">
					<div class="tab-hd clearfloat">
						<ul class="tab-nav clearfloat">
						  <li><a href="#">found</a></li>
						  <li><a href="#">lost</a></li>
						</ul>
					</div>
					<div class="tab-bd clearfloat">
						<div class="tab-pal">

                        <?php
					        while ($row = $cards->fetch_array()) {
                      $rand = rand(1,5);
					            $name = $row['name'];
					            $id = $row['id'];
					            $school = $row['school'];
                                echo "<div class=\"content clearfloat box-s\" >";
								echo "<div class=\"topsche-top box-s clearfloat\" >";
								echo "<p class=\"fl time\" >";
								echo "<i class=\"iconfont icon-time\" ></i >";
                                echo $row['date'];
								echo "</p >";
								echo "</div >";
                echo "<div  align='center'";
					    	echo  "<div class=\"list clearfloat fl box-s\" >";
                  echo "<div style='position:relative; width:375px;' >";
					    		echo  "<div align = \"center\" ><img src = \"img/$rand.png\" width = \"100%\"alt = \"\" ></div >";
                  echo "<div style='position:absolute; z-index:2; left:140px; top:82px;'>";
                  echo "  <span class = 'wawa'>姓名：$name </span>";
                              //  echo  $name, $id, $school;
					    		echo "</div >";
                  echo "<div style='position:absolute; z-index:2; left:140px; top:113px;'>";
                  echo "  <span class = 'wawa'>学号：$id </span>";
                              //  echo  $name, $id, $school;
					    		echo "</div >";
                  echo "<div style='position:absolute; z-index:2; left:140px; top:144px;'>";
                  echo "  <span class = 'wawa'>学院：$school</span>";
                              //  echo  $name, $id, $school;
					    		echo "</div >";


                  echo "</div >";
                  echo "</div >";
                  echo "</div >";

					    	}

                        $next_page=$page+1;
                        $up_page=$page-1;
                        if($page!=0){
                            echo "<a href=\"index.php?page=$up_page&lost_page=$lost_page\">上一页</a>";

                        }
                        if($next_page<$max_page){
                            echo "<a href=\"index.php?page=$next_page&lost_page=$lost_page\">下一页</a>";
                        }
                        ?>

						</div>

						<div class="tab-pal">

                            <?php
                            while ($row = $lost_cards->fetch_array()) {
                                $rand2 = rand(1,5);
                                $name = $row['name'];
                                $id = $row['id'];
                                $school = $row['school'];
                                echo "<div class=\"content clearfloat box-s\" >";
                                echo "<div class=\"topsche-top box-s clearfloat\" >";
                                echo "<p class=\"fl time\" >";
                                echo "<i class=\"iconfont icon-time\" ></i >";
                                echo $row['date'];
                                echo "</p >";
                                echo "</div >";
                                echo "<div  align='center'";
                                echo  "<div class=\"list clearfloat fl box-s\" >";
                                echo "<div style='position:relative; width:375px;' >";
                                echo  "<div align = \"center\" ><img src = \"img/$rand2.png\" width = \"100%\"alt = \"\" ></div >";
                                echo "<div style='position:absolute; z-index:2; left:140px; top:82px;'>";
                                echo "  <span class = 'wawa'>姓名：$name </span>";
                                            //  echo  $name, $id, $school;
                                echo "</div >";
                                echo "<div style='position:absolute; z-index:2; left:140px; top:113px;'>";
                                echo "  <span class = 'wawa'>学号：$id </span>";
                                            //  echo  $name, $id, $school;
                                echo "</div >";
                                echo "<div style='position:absolute; z-index:2; left:140px; top:144px;'>";
                                echo "  <span class = 'wawa'>学院：$school</span>";
                                            //  echo  $name, $id, $school;

                                //echo "<div style='position:absolute; z-index:2; left:140px; top:82px;'>";
                                //echo  $name, $id, $school;
                                echo "</div >";
                                echo "</div >";
                                echo "</div >";
                                echo "</div >";
                            }
                            $next_lost_page=$lost_page+1;
                            $up_lost_page=$lost_page-1;
                            if($lost_page!=0){
                                echo "<a href=\"index.php?lp=1&page=$page&lost_page=$up_lost_page\">上一页</a>";

                            }
                            if($next_lost_page<$max_lost_page){
                                echo "<a href=\"index.php?lp=1&page=$page&lost_page=$next_lost_page\">下一页</a>";
                            }
                            mysqli_close($conn);
                            ?>

						</div>

					</div>
				</div>
			</div>
		</div>
		<footer style="z-index:4" class="page-footer fixed-footer" id="footer">
			<ul>
				<li class="active">
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
				<li>
					<a href="sign.php">
						<i class="iconfont icon-gerenzhongxin"></i>
						<p>个人信息</p>
					</a>
				</li>
			</ul>
		</footer>
  	</body>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
	<script type="text/javascript" src="js/jquery.SuperSlide.2.1.js" ></script>
	<script type="text/javascript" src="slick/slick.min.js" ></script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<script type="text/javascript" src="js/tchuang.js" ></script>
	<script type="text/javascript" src="js/hmt.js" ></script>
	<script type="text/javascript">
		jQuery(".notice").slide({ titCell:".tab-hd li", mainCell:".tab-bd",trigger: "click",defaultIndex:<?php echo $lp?>,delayTime:0 });
	</script>
</html>

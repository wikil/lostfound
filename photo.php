
 <!DOCTYPE html>
 <html lang="zh-CN">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
   <title>拾到招领</title>
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


  <?php
  $file = $_FILES['file'];//得到传输的数据
  //得到文件名称

  $name = $file['name'];
  if($name==NULL){
  echo '<script language="JavaScript">;alert("请选择图片");location.href="xuqiu.html";</script>;';
  }
  $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
  $allow_type = array('jpg','jpeg','gif','png');  //定义允许上传的类型
  //判断文件类型是否被允许上传
  if(!in_array($type, $allow_type)){
     //如果不被允许，则直接停止程序运行
     return ;
  }
  //判断是否是通过HTTP POST上传的
  if(!is_uploaded_file($file['tmp_name'])){
    //如果不是通过HTTP POST上传的
    return ;
  }
  $upload_path = "photo/";  //上传文件的存放路径
  //开始移动文件到相应的文件夹
  if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
     echo "Successfully!";
  }else{
     echo "Failed!";
  }
  include("pic/pic.php");

  $image = file_get_contents($upload_path.$file['name']);
  $templateSign = "efd8d010083581a1ac82ebf67e278830";
  //echo $image;
  // 调用自定义模板文字识别
  $result=$client->custom($image, $templateSign);

  //  $data =file_get_contents('https://aip.baidubce.com/rest/2.0/solution/v1/iocr/recognise');
  //  $data_new = json_decode($data);
  //  var_dump($data_new );

  //  $arr = json_decode($result);
  // echo '姓名：'. $data_new['0']['word'];
  //echo $data_new;
  if(!($result['error_code']==0)){
    echo '<script language="JavaScript">;alert("识别失败，请选择清晰图片！");location.href="xuqiu.html";</script>;';
  }

   $result_name = $result['data']['ret']['0']['word']; //接收图片姓名
   $result_id =$result['data']['ret']['2']['word'];//接收图片学号
   $result_school =$result['data']['ret']['1']['word'];//接收图片性别
unlink($upload_path.$file['name']);
  //echo '<pre>';
  //print_r($result);
//  print($result_name);print($result_id);print($result_sex);
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
         <div class="headertwo clearfloat" id="header">
 			<a href="javascript:history.go(-1)" class="fl box-s"><i class="iconfont icon-arrow-l fl"></i></a>
 			<p class="fl">拾到招领</p>
 		</div>

 	<div class="clearfloat" id="main">
 		<div class="service-ctent clearfloat">
 			<!--<div class="top clearfloat box-s">
 					<i class="iconfont icon-gonggao fl"></i>
 					<span class="fl box-s">请填认证写您的学期分类！</span>
 				</div>-->
         <footer class="page-footer fixed-footer" id="footer">
                 <ul>
                   <li >
                     <a href="index.php">
                       <i class="iconfont icon-shouyev1"></i>
                       <p>首页</p>
                     </a>
                   </li>
                   <li class="active">
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
                 <div class="recom-tit clearfloat box-s">
 		    		<p>招领分类</p>
 		    	</div>

 <form method="post" id="found-form" autocomplete="off" action="found.php" class="nice-validator n-default" novalidate>
 	    	<div class="service-ties clearfloat box-s">
 	    		<ul>
 	    			<li style="font-size:1.2em"><i class=""></i>学生证&nbsp;&nbsp;<label><input type="radio" name="found_id" value= '1' align="center" style="width: 20px;height: 20px; vertical-align:middle;" ></label></li>
 	    			<li style="font-size:1.2em"><i class=""></i>研究生证&nbsp;&nbsp;<label><input type="radio" name="found_id" value= '2' align="center" style="width: 20px;height: 20px; vertical-align:middle;"></label></li>
 	    			<li style="font-size:1.2em"><i class=""></i>教工证&nbsp;&nbsp;<label><input type="radio" name="found_id" value= '3'  align="center" style="width: 20px;height: 20px; vertical-align:middle;"></label></li>
 	    			<li style="font-size:1.2em"><i class=""></i>身份证&nbsp;&nbsp;<label><input type="radio" name="found_id" value= '4'  align="center" style="width: 20px;height: 20px; vertical-align:middle;"></label></li>
 	    		</ul>
 	    	</div>
 		</div>
         <div class="recom-tit clearfloat box-s">
 		    		<p>失主信息</p>
 		    	</div>
 		<div class="land-ctent land-ctenttwo clearfloat">
 			<ul>
 				<li class="box-s clearfloat">
 					<p class="tit fl">姓名</p>
 					<input type="text" name="name" id="" value="<?php echo $result_name; ?>"  class="fl" />
 				</li>
 				<li class="box-s clearfloat">
 					<p class="tit fl">学号</p>
 					<input type="text" name="id" id="" value="<?php echo $result_id; ?>"  class="fl" />
 				</li>
         <li class="box-s clearfloat">
           <p class="tit fl">学院</p>
           <input type="text" name="school" id="" value="<?php echo $result_school; ?>"  class="fl" />
         </li>
         <li class="box-s clearfloat1" >
           <p class="tit fl">描述信息</p>
           <input type="text" name="info" id="" value=""  class="fl" />
         </li>

 			</ul>

   <div class="" id="footer">

       <button type="submit" id="submit_button" class="btn btn-primary btn-current">发布</button>

   </div>
 </form>

 <form method="post" enctype="multipart/form-data" name="form" id="-form" autocomplete="off" action="photo.php" class="nice-validator n-default" novalidate>

 		</div>
         <div class="recom-tit clearfloat box-s">
 		    		<p>图片上传</p>
 		    	</div>
 		<div class="land-ctent land-ctenttwo clearfloat">
 			<ul>
 				<li class="box-s clearfloat">
 					<p class="tit fl"></p>
 					<input type="file" name="file" id="" value=""  class="fl" />
 				</li>


 			</ul>

   <div class="" id="footer">

       <button type="submit" id="submit_button" class="btn btn-primary btn-current">上传</button>

   </div>
 </form>

 			<!-- <textarea name="" rows="4" cols="" class="tarea fr box-s" placeholder="录入需求" style="font-size:1.5em"></textarea>
 		<div align="center" >
     			<label ><input type="checkbox" name="check" align="center"  style="width: 20px;height: 20px; "><font size="4" >匿名</font></label>
     	</div>
 		</div>
 	</div>	 -->




 	</body>
 	<script type="text/javascript" src="js/jquery-1.8.3.min.js" ></script>
 	<script type="text/javascript" src="slick/slick.min.js" ></script>
 	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
 	<script type="text/javascript" src="js/tchuang.js" ></script>
 	<script type="text/javascript" src="js/hmt.js" ></script>
 	<script type="text/javascript">
 		$('.one-time').slick({
 		  dots: true,
 		  infinite: false,
 		  speed: 300,
 		  slidesToShow: 1,
 		  touchMove: false,
 		  slidesToScroll: 1
 		});
 	</script>
 	<!--分享js-->
 	<script type="text/javascript">
 		function toshare(){
 			$(".am-share").addClass("am-modal-active");
 			if($(".sharebg").length>0){
 				$(".sharebg").addClass("sharebg-active");
 			}else{
 				$("body").append('<div class="sharebg"></div>');
 				$(".sharebg").addClass("sharebg-active");
 			}
 			$(".sharebg-active,.share_btn").click(function(){
 				$(".am-share").removeClass("am-modal-active");
 				setTimeout(function(){
 					$(".sharebg-active").removeClass("sharebg-active");
 					$(".sharebg").remove();
 				},300);
 			})
 		}
 	</script>
 </html>

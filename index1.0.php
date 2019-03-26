<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();
  if(empty($_SESSION['id'])){
    header("location:denglu.html");
  }




  ?>
  <meta charset="utf-8">
  <title>layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="layui/css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

  <ul class="layui-nav layui-bg-cyan">
    <!-- <li class="layui-nav-item"><a href="">藏青导航</a></li>
    <li class="layui-nav-item"><a href="">产品</a></li> -->
   <li class="layui-nav-item"><a href="">                                     </a></li>
   <li class="layui-nav-item"><a href="">             寻回校卡                    </a></li>
   <li class="layui-nav-item"><a href="upload.html">          寻找失主                    </a></li>


    <li class="layui-nav-item">

 <li class="layui-nav-item" lay-unselect="">
   <a href="javascript:;"><img class="layui-nav-img" src="001.jpg">我</a>
   <li class="layui-nav-item"><a href="logout.php">           注销                           </a></li>

   <dl class="layui-nav-child">
     <dd><a href="javascript:;">修改信息</a></dd>
     <dd><a href="javascript:;">安全管理</a></dd>
     <dd><a href="javascript:;">退了</a></dd>
   </dl>
 </li>


  </ul>

  <br>
  <!-- <div style="text-align:center">

         <button class="layui-btn layui-btn-radius" style="border-style:solid">默认按钮</button>
     </div> -->




<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">

         <legend style="text-align:center">失物招领广场</legend>

</fieldset>

<div style="padding: 20px; background-color: #F2F2F2;">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md6">
      <div class="layui-card">
        <div class="layui-card-header">丢失求助</div>
        <div class="layui-card-body">
          XXX  2016XXXX 1864038xxxx<br>
        </div>
      </div>
    </div>
    <div class="layui-col-md6">
      <div class="layui-card">
        <div class="layui-card-header">拾到招领</div>
        <div class="layui-card-body">
          XXX  2016XXXX 1864038xxxx<br>
        </div>
      </div>
    <div class="layui-col-md6">
        <div class="layui-card">
          <div class="layui-card-header">拾到招领</div>
          <div class="layui-card-body">
            XXX  2016XXXX 1864038xxxx<br>
        </div>
    </div>
    <div class="layui-col-md6">
      <div class="layui-card">
        <div class="layui-card-header">拾到招领</div>
        <div class="layui-card-body">
          XXX  2016XXXX 1864038xxxx<br>
      </div>
  </div>
    <div class="layui-col-md6">
    <div class="layui-card">
      <div class="layui-card-header">拾到招领</div>
      <div class="layui-card-body">
        XXX  2016XXXX 1864038xxxx<br>
    </div>
    </div>
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md6">
        <div class="layui-card">
          <div class="layui-card-header">丢失求助</div>
          <div class="layui-card-body">
            XXX  2016XXXX 1864038xxxx<br>
          </div>
        </div>
  </div>
</div>


</body>
</html>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>欢迎注册</title>
<!--<meta name="Keywords" content="www.021news.cn">
<meta name="Description" content="www.021news.cn">

Bootstrap -->
<link href="images/bootstrap.min.css" rel="stylesheet">
<link href="images/main.css" rel="stylesheet">
<link href="images/enter.css" rel="stylesheet">
<script src="images/jquery.min.js"></script>
<script src="images/bootstrap.min.js"></script>
<script src="images/jquery.particleground.min.js"></script>
<script language="javascript">
	function check(myform){

		if(myform.txt_yan.value==""){
			alert("请输入验证码!");myform.txt_yan.focus();return false;
		}
		if(myform.txt_yan.value!=myform.txt_hyan.value){
			alert("对不起，您输入的验证码不正确!");myform.txt_yan.focus();return false;
		}
	}
</script>
</head>
<body>
<div id="particles">
  <canvas class="pg-canvas" width="1920" height="911" style="display: block;"></canvas>
  <div class="intro" style="margin-top: -256.5px;">
    <div class="container">
      <div class="row" style="padding:30px 0;">
        <div class="col-md-3 col-centered tac"> <img src="images/logo2.png" alt="logo"> </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-8 col-centered">
          <form method="post" id="register-form" autocomplete="off" action="submit.php" class="nice-validator n-default" novalidate>
            <div class="form-group">
              <input type="text" class="form-control" id="account" name="name" placeholder="姓名" autocomplete="off" aria-required="true" data-tip="英文字母数字或下划线">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="account" name="id"  placeholder="学号" autocomplete="off" aria-required="true" data-tip="英文字母数字或下划线">
            </div>
            <div class="form-group">
              <select  class="form-control" id="school" name="school" >
                <option value="文法学院">文法学院</option>
                <option value="马克思主义学院">马克思主义学院</option>
                <option value="外国语学院">外国语学院</option>
                <option value="艺术学院">艺术学院</option>
                <option value="工商管理学院">工商管理学院</option>
                <option value="理学院">理学院</option>
                <option value="资源与土木工程学院">资源与土木工程学院</option>
                <option value="冶金学院">冶金学院</option>
                <option value="材料科学与工程学院">材料科学与工程学院</option>
                <option value="机械工程与自动化学院">机械工程与自动化学院</option>
                <option value="信息科学与工程学院">信息科学与工程学院</option>
                <option value="计算机科学与工程学院">计算机科学与工程学院</option>
                <option value="软件学院">软件学院</option>
                <option value="中荷生物医学与信息工程学院">中荷生物医学与信息工程学院</option>
                <option value="生命健康与科学学院">生命健康与科学学院</option>
                <option value="江河建筑学院">江河建筑学院</option>
                <option value="机器人科学与工程学院">机器人科学与工程学院</option>
                <option value="国防教育学院">国防教育学院</option>
                <option value="体育部">体育部</option>

              </select>
            </div>

            <div class="form-group">
              <input type="text" class="form-control tel" id="account" name="tel"  placeholder="手机号" autocomplete="off" aria-required="true" data-tip="英文字母数字或下划线">
              <a  href="#" id="send_code" class="codelink">发送验证码</a>
            </div>
            <div class="form-group">
                  <input type="text" class="form-control" id="vcode" name="vcode" placeholder="验证码" autocomplete="off" aria-required="true" data-tip="您收到的验证码">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="密码" aria-required="true" data-tip="请设置您的密码（6-16个字符）">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="再次输入密码" aria-required="true" data-tip="请再输入一次密码">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="repeat_password" name="txt_yan" placeholder="请输入验证码" aria-required="true" data-tip="请再输入一次密码">
            </div>
              <a href="login.php"><?php
               $num=intval(mt_rand(1000,9999));
               for($i=0;$i<4;$i++){
               echo "<img src=images/checkcode/".substr(strval($num),$i,1).".gif>";   //输出随机的数字图形
                }
               ?></a>
              <input type="hidden" name="txt_hyan" id="txt_hyan" value="<?php echo $num;?>" >
            <div id="validator-tips" class="validator-tips"></div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="ag">
                同意 </label>
              <a href="http://www.baidu.com" id="userAgreement" style="text-decoration:none">用户协议</a> </div>
            <div class="form-center-button">
              <button type="submit" id="submit_button" class="btn btn-primary btn-current">注册</button>
              <!--<a href="#" class="btn btn-default">取消</a> </div>-->
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" style="text-align: left" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <h4 class="modal-title">用户协议</h4>
          </div>
          <div class="modal-body" id="agreementContent"></div>
        </div>
      </div>
    </div>
    <link rel="stylesheet" href="images/jquery.validator.css">
    <script src="images/zh-CN.js"></script><script src="images/jquery.validator.min.js"></script>
  </div>
</div>
<script>
    $(document).ready(function () {
        var intro = $('.intro');
        $('#particles').particleground({
            dotColor: 'rgba(52, 152, 219, 0.36)',
            lineColor: 'rgba(52, 152, 219, 0.86)',
            density: 130000,
            proximity: 500,
            lineWidth: 0.2
        });
        intro.css({
            'margin-top': -(intro.height() / 2 + 100)
        });
    });
    var count=45;
    $("#send_code").click(
        function () {
            var phone_number = document.getElementsByClassName("tel")[0].value;
            if(document.getElementById("send_code").innerText==="发送验证码"){
                $.post("message.php",
                    {tel:phone_number},
                    function (data) {
                        if(data){
                            var countdown = setInterval(CountDown, 1000);
                            function CountDown() {
                                var e = document.getElementById("send_code");
                                e.innerText = count+"秒后重新发送";
                                if (count === 0) {
                                    e.innerText = "发送验证码";
                                    count = 45;
                                    clearInterval(countdown);
                                }
                                count--;
                            }
                        }
                    }
                )
            }
        }
    );
</script>
<div style="text-align:center;">
<p>来源:<a href="http://down.admin5.com/" target="_blank">A5源码</a></p>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php session_start();

if(isset($_REQUEST['Submit'])){
    // 服务器端验证的代码
    if(empty($_SESSION['6_letters_code'] ) ||
        strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
    {
        $msg="验证失败！";
    }else{
        //验证码验证正确，这里放验证成功后的代码
    }
}
?>
<style type="text/css">
.table {
    font-family:Arial, Helvetica, sans-serif;
    font-size:12px;
    color:#333;
    background-color:#E4E4E4;
}
.table td {
    background-color:#F8F8F8;
}
</style>

<form action="" method="post" name="form1" id="form1" >
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td align="right" valign="top"> 验证码:</td>
      <td><img src="captcha_code_file.php?rand=<?php echo rand();?>" id='captchaimg'><br>
        <label for='message'>请输入上面的验证码 :</label>
        <br>
        <input id="6_letters_code" name="6_letters_code" type="text">
        <br>
        无法读图片吗？点击 <a href='javascript: refreshCaptcha();'>here</a> 刷新
        </p></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" onclick="return validate();" value="提交"></td>
    </tr>
  </table>
</form>
<script type='text/javascript'>
function refreshCaptcha()
{
    var img = document.images['captchaimg'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
  </body>
</html>

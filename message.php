<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 2019/3/26
 * Time: 11:42
 */
require __DIR__ . "/qcloudsms_php-master/src/index.php";

use Qcloud\Sms\SmsSingleSender;
use Qcloud\Sms\SmsMultiSender;
use Qcloud\Sms\SmsVoiceVerifyCodeSender;
use Qcloud\Sms\SmsVoicePromptSender;
use Qcloud\Sms\SmsStatusPuller;
use Qcloud\Sms\SmsMobileStatusPuller;

use Qcloud\Sms\VoiceFileUploader;
use Qcloud\Sms\FileVoiceSender;
use Qcloud\Sms\TtsVoiceSender;






function send_message($phonenumber,$vcode){
    // 短信应用SDK AppID
    $appid = 1400169960; // 1400开头

// 短信应用SDK AppKey
    $appkey = "b47f3bc9f8243396308f6179c00b3deb";

// 需要发送短信的手机号码
    $phoneNumbers = "$phonenumber";

// 短信模板ID，需要在短信应用中申请
    $templateId = 302392;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请

// 签名
    $smsSign = "白桦树"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`

//指定模板ID单发短信
    try {
        $ssender = new SmsSingleSender($appid, $appkey);
        $params = ["$vcode"];
        $result = $ssender->sendWithParam("86", $phoneNumbers, $templateId,
            $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
//        $rsp = json_decode($result);
//        //echo $result;
    } catch(\Exception $e) {
        echo var_dump($e);
    }

}

if(isset($_POST["tel"])){
    include ("connect.php");
    $phone = $_POST["tel"];
    $vcode = mt_rand(10000,99999);
    $create_date = date("Y/m/d G:i:s");
    if(filter_var($phone, FILTER_VALIDATE_INT)){
        $sql = "select create_date from vcode where tel = $phone";
        $res = $conn->query($sql);
        if($res){
            $dtime = $create_date - $res->fetch_array()[0];
            if($dtime<40){
                echo "WAIT FOR SECONDS";
                exit;
            }
        }
        $sql = "insert into vcode (tel,vcode,date) values(\"$phone\", $vcode, \"$create_date\")";
        $conn->query($sql);
        send_message($phone,$vcode);
    } else {
        echo "UNCORRECT PHONE NUMBER";
    }
} else {
    echo "NO PHONE NUMBER";
}


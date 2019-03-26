<?php
session_start();
//设置: 你可以在这里修改验证码图片的参数
$image_width = 120;
$image_height = 40;
$characters_on_image = 6;
$font = './monofont.ttf';

//以下字符将用于验证码中的字符
//为了避免混淆去掉了数字1和字母i
$possible_letters = '23456789bcdfghjkmnpqrstvwxyz';
$random_dots = 10;
$random_lines = 30;
$captcha_text_color="0x142864";
$captcha_noice_color = "0x142864";

$code = '';

$i = 0;
while ($i < $characters_on_image) {
    $code .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);
    $i++;
}

$font_size = $image_height * 0.75;
$image = @imagecreate($image_width, $image_height);

/* 设置背景、文本和干扰的噪点 */
$background_color = imagecolorallocate($image, 255, 255, 255);

$arr_text_color = hexrgb($captcha_text_color);
$text_color = imagecolorallocate($image, $arr_text_color['red'],
$arr_text_color['green'], $arr_text_color['blue']);

$arr_noice_color = hexrgb($captcha_noice_color);
$image_noise_color = imagecolorallocate($image, $arr_noice_color['red'],
$arr_noice_color['green'], $arr_noice_color['blue']);

/* 在背景上随机的生成干扰噪点 */
for( $i=0; $i<$random_dots; $i++ ) {
    imagefilledellipse($image, mt_rand(0,$image_width),
    mt_rand(0,$image_height), 2, 3, $image_noise_color);
}

/* 在背景图片上，随机生成线条 */
for( $i=0; $i<$random_lines; $i++ ) {
    imageline($image, mt_rand(0,$image_width), mt_rand(0,$image_height),
    mt_rand(0,$image_width), mt_rand(0,$image_height), $image_noise_color);
}

/* 生成一个文本框，然后在里面写生6个字符 */
$textbox = imagettfbbox($font_size, 0, $font, $code);
$x = ($image_width - $textbox[4])/2;
$y = ($image_height - $textbox[5])/2;
imagettftext($image, $font_size, 0, $x, $y, $text_color, $font , $code);

/* 将验证码图片在HTML页面上显示出来 */
header('Content-Type: image/jpeg');// 设定图片输出的类型
imagejpeg($image);//显示图片
imagedestroy($image);//销毁图片实例
$_SESSION['6_letters_code'] = $code;

function hexrgb ($hexstr) {
    $int = hexdec($hexstr);

    return array( "red" => 0xFF & ($int >> 0x10),
                "green" => 0xFF & ($int >> 0x8),
                "blue" => 0xFF & $int
    );
}
?>

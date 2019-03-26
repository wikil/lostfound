<?php
// $file = $_FILES['file'];//得到传输的数据
// //得到文件名称
// $name = $file['name'];
// $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
// $allow_type = array('jpg','jpeg','gif','png');  //定义允许上传的类型
// //判断文件类型是否被允许上传
// if(!in_array($type, $allow_type)){
//     //如果不被允许，则直接停止程序运行
//     return ;
// }
// //判断是否是通过HTTP POST上传的
// if(!is_uploaded_file($file['tmp_name'])){
//    //如果不是通过HTTP POST上传的
//    return ;
// }
// $upload_path = "/pictures";  //上传文件的存放路径
// //开始移动文件到相应的文件夹
// if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
//     echo "Successfully!";
// }else{
//     echo "Failed!";
// }

 if(isset($_POST['submit'])){
    $name       = $_FILES['file']['name'];
    $temp_name  = $_FILES['file']['tmp_name'];
    if(isset($name)){
        if(!empty($name)){
            $location = 'pictures/';
            if(move_uploaded_file($temp_name, $location.$name)){
                echo 'File uploaded successfully';
            }
        }
    }  else {
        echo 'You should select a file to upload !!';
    }
}

?>

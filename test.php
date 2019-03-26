// if ($_SERVER["REQUEST_METHOD"] == "POST")
// {
//   if (empty($name))
//   {
//     $nameErr = "姓名是必需的";
//   }
//
//
//   if (empty($id))
//   {
//     $idErr = "学号是必需的";
//   }
//   else
//   {
//     $id = test_input($id);
//       // 检测作者填写格式是否合法
//     if (!preg_match("/^[0-9]*$/",$id))
//     {
//       $idErr = "必须是纯数字";
//     }
//   }
//
//   if (empty($tel))
//   {
//     $telErr = "电话号码是必需的";
//   }
//   else
//   {
//     $tel = test_input($tel);
//       // 检测作者填写格式是否合法
//     if (!preg_match("/^[0-9]*$/",$tel))
//     {
//       $telErr = "必须是纯数字";
//     }
//   }
//   if (empty($password))
//   {
//     $passwordErr = "密码是必需的";
//   }
//
// }
// echo $name;
// echo $id;
// echo $tel;
// echo $password;

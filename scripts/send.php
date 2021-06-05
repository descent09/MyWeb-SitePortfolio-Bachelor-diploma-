<?php
//$name = $_POST['fullName'];
//$email = $_POST['email'];
//$message = $_POST['message'];
if (isset($_POST['fullName'])) {
    $name = $_POST['fullName'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['message'])) {
    $message = $_POST['message'];
}
$myadress = "daneel.noor26@gmail.com";
$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$name = urldecode($name);
$email = urldecode($email);
$name = trim($name);
$email = trim($email);
$sub = "Обращение с сайта Portfolio от $email";
$mes = "$message";
$send = mail($myadress,$sub,$mes);

if($send){    
    header("Location:/index.html");   
}
//else {
    //echo "при отправке сообщения возникли ошибки";}
/*echo $name;
echo '<br>';
echo $email;
echo '<br>';
echo $message;
ini_set('display_errors','On');
error_reporting('E_ALL');*/
?>
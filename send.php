<?php
/*$name = $_POST['fullName'];
$email = $_POST['email'];
$message = $_POST['message'];
$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$name = urldecode($name);
$email = urldecode($email);
$name = trim($name);
$email = trim($email);
mail("daneel.noor26@gmail.com", "Обращение с сайта Portfolio", "Здравсвуйте, вам пишет " .$name . $message . ". Почта отправителя: ".$email);
echo $name;
echo '<br>';
echo $email;
echo '<br>';
echo $message;
ini_set('display_errors','On');
error_reporting('E_ALL');
?>*/
$post = (!empty($_POST)) ? true : false;

if($post)
{
$email = trim($_POST['email']);
$name = htmlspecialchars($_POST['fullName']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);
//$tel = htmlspecialchars($_POST["tel"]);
$error = '';

if(!$name)
{
$error .= 'Пожалуйста введите ваше имя<br />';
}

// Проверка телефона
function ValidateTel($valueTel){
    $regexTel = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
    if($valueTel == "") {
    return false;
    } 
    else {
        $string = preg_replace($regexTel, "", $valueTel);
    }
    return empty($string) ? true : false;
}
if(!$email){
    $error .= "Пожалуйста введите email<br />";
}
if($email && !ValidateTel($email)){
    $error .= "Введите корректный email<br />";
}

if(!$message || strlen($message) < 1){
    $error .= "Введите ваше сообщение<br />";
}
if(!$error){
$name_tema = "=?utf-8?b?". base64_encode($name) ."?=";

$subject ="Новая заявка";
$subject1 = "=?utf-8?b?". base64_encode($subject) ."?=";
/*
$message ="\n\nСообщение: ".$message."\n\nИмя: " .$name."\n\nТелефон: ".$tel."\n\n";
*/
$message1 ="\n\nИмя: ".$name."\n\nE-mail: " .$email."\n\nСообщение: ".$message."\n\n";	


$header = "Content-Type: text/plain; charset=utf-8\n";

$header .= "From: Новая заявка <example@gmail.com>\n\n";	
$mail = mail("daneel.noor26@gmail.com", $subject1, iconv ('utf-8', 'windows-1251', $message1), iconv ('utf-8', 'windows-1251', $header));
}
if($mail)
{
    echo 'OK';
}
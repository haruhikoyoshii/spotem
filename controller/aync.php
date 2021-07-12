<?php
require_once('autoload.php');

$func = $_POST['func'];
$value = $_POST['value'];
echo $func($value); //可変関数

function sendAuthCode($value)
{
    $mail = new Mail($value);
    $code = "";
    for ($i = 0; $i < 6; $i++) {
        $code .= mt_rand(0, 9);
    }
    $mail->sendMail("認証コードのご案内", "認証コード：" . $code);
    return $code;
}

function getUserParam($userid)
{
    $user = User::get($userid);
    $userparams = ["userid" => $user->getUserId(), "name" => $user->getName()];
    return json_encode($userparams);
}

<?php 
header("content-type:text/html;charset=utf-8");
$message = $_POST["message"] ;
require_once "connet.php";
require_once 'mysqlconfig.php';
$ma1=new DB();
$link=$ma1->connect();
$id = $_GET['id'];
date_default_timezone_set("Asia/Taipei");
$datetime = date("H:i:sa");
$sql="update comment set liuyan = '{$message}' , time = '{$datetime}' where id = $id ";
if($message!=null){
    $res = $ma1 -> edit1($link,$sql);
};
if($message==null){
   echo "<script>alert('請輸入修改留言！');location.href='edit.php?id=$id';</script>";
};   

?>
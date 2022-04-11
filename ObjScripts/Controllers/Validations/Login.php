<?php
//登录
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$email = htmlspecialchars($_POST['email']);
$mot_de_passe = MD5($_POST['password']);
 
//包含数据库连接文件
require('../../Models/conn.php');
//检测用户名及密码是否正确
$check_query = mysqli_query("select userid from user_list where username='$username' and password='$password' limit 1");
if($result = mysqli_fetch_array($check_query)){
    //登录成功
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['userid'] = $result['userid'];
    echo $username,' 欢迎，进入<a href="my.php">用户中心</a><br />';
    echo '点击此处<a href="../Visuelles/Login.php">注销</a><br />';
    exit;
} else {
    exit('登录失败!点击此处 <a href="../../Views/Login.php">重试</a> ');
}
//注销登录
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['email']);
    echo '注销成功!点击此处回到主页<a href="../../index.html"></a>';
    exit;
}

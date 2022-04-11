<?php
$totalError = 0;
// $path=dirname(dirname(__FILE__));
require("../Controllers/Convert/Encrypt.php");//这个地方要非常注意！！，因为本文件Rigister.php已经在Scripts/Views/Register引用了，因此在此文件Register.php使用相对路径时就相当于在Scripts/Views/Register中使用相对路径！！而且还需要在最前面加./
require("Validations.php");
require("Image.php");
//初始化变量
$name = $email = $password_01 = $password_02 = $gender = $comment = $website = '';
$nameErr = $emailErr = $password_01Err = $password_02Err = $passwordErr = $genderErr = $commentErr = $websiteErr = '';
// function CustomStrCmp($str1,$str2){
// 	if(!strcmp($str1,$str2)){
// 	}
// 	return $cmpErr;
// }
//验证表单
// function formValidate()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "姓名不能为空！";
		$totalError += 1;
	} else {
		$name = test_input($_POST["name"]);
		if (!ValidateName($name)) {
			$nameErr = "只允许字母和下划线";
			$totalError += 1;
		}
	}
	if (empty($_POST["email"])) {
		$emailErr = "邮件不能为空！";
		$totalError += 1;
	} else {
		$email = test_input($_POST["email"]);
		if (!ValidateEmail($email)) {
			$emailErr = "邮箱格式错误！";
			$totalError += 1;
		}
	}
	if (empty($_POST["password_01"])) {
		$password_01Err = "密码不能为空";
		$totalError += 1;
	} else {
		$password_01 = test_input($_POST["password_01"]);
		if (!ValidatePwd($password_01)) {
			$password_01Err = '格式错误!</br>请检查是否选择大写字母、小写字母、数字以及特殊字符中选择三者且共至少八位';
			$totalError += 1;
		}
	}
	if (empty($_POST["password_02"])) {
		$password_02Err = "密码不能为空";
		$totalError += 1;
	} else {
		$password_02 = test_input($_POST["password_02"]);
		if (!ValidatePwd($password_02)) {
			$password_02Err = '格式错误!</br>请检查是否选择大写字母、小写字母、数字以及特殊字符中选择三者且共至少八位';
			$totalError += 1;
		}
	}
	if(!empty($_POST["password_01"])&&!empty($_POST["password_02"])){
		if(strcmp($password_01,$password_02)!=0){
			$password_01Err=$password_02Err="两次输入密码不一致！";
			$totalError+=1;
		}
	}
	if (empty($_POST["gender"])) {
		$genderErr = "请选择性别";
		$totalError += 1;
	} else {
		$gender = test_input($_POST["gender"]);
	}
	// if (empty($_POST["website"])) {
	// 	$website = "";
	// }else{
	// 	$website = test_input($_POST["website"]);
	// 	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
	// 		$websiteErr = "非法的 URL 的地址";
	// 	}
	// }
	// if (empty($_POST["comment"])) {
	// 	$comment = "";
	// } else {
	// 	$comment = test_input($_POST["comment"]);
	// }

	if ($totalError > 0) {
		echo "</br>errorSum" . $totalError;
		echo "注册失败</br>";
		// header("location:../../Views/Register.php");
	} else {
		session_start();

		echo "注册成功";
		// header("location:../../index.html");
	}
}

		// echo uniqid();//创建唯一id
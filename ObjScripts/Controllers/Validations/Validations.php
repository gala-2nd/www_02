<?php
function test_input(string $str)
{
	$data = trim($str);
	$data = stripslashes($str);
	$data = htmlspecialchars($str);
	return $str;
}
function ValidateName(string $str)
{
	//检测名字是否只包含字母和空格
	if (!preg_match("/^[a-zA-Z_]*$/", $str)) {
		return false;
	}
	return true;
}
function ValidateEmail(string $str)
{
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $str)) {
		return false;
	}
	return true;
}
function ValidatePwd(string $str)
{
	if (!preg_match("/^(?![a-zA-Z]+$)(?![A-Z0-9]+$)(?![A-Z\W_]+$)(?![a-z0-9]+$)(?![a-z\W_]+$)(?![0-9\W_]+$)[a-zA-Z0-9\W_]{8,}$/", $str)) {
		return false;
	}
	return true;
}



<?php

namespace Models;

class FormInfosErrors extends Errors
{
    protected array $infos = array(
        "nameErr" => null, "emailErr" => null, "password_01Err" => null,
        "password_02Err" => null, "passwordFormatErr" => null, "genderErr" => null
    );
    function AddNullError(string $key)
    {
            $this->vaildSum += 1;
            // echo "key:" . $key;
            // echo $this->errSum;
            switch ($key) {
                case "name":
                    $this->infos[$key . "Err"] = "姓名不能为空！";
                    break;
                case "email":
                    $this->infos[$key . "Err"] = "邮件不能为空！";
                    break;
                case "password_01":
                case "password_02":
                    $this->infos[$key . "Err"] = "密码不能为空！";
                    break;
                case "gender":
                    $this->infos[$key . "Err"] = "请选择性别！";
                    break;
                case "password":
                case "website":
                case "comment":
                default:
                    $this->vaildSum -= 1;
                    break;
            }
    }
    function AddValidateError(string $key)
    {
        // if (in_array($key . 'Err', array_keys($this->infos))){
        $this->vaildSum += 1;
        switch ($key) {
            case "name":
                $this->infos[$key . "Err"] = "只允许字母和下划线！";
                break;
            case "email":
                $this->infos[$key . "Err"] = "邮箱格式错误！";
                break;
            case "email":
                $this->infos[$key . "Err"] = "邮件不能为空！";
                break;
            case "password_01":
            case "password_02":
                $this->infos[$key . "Err"] = "格式错误!</br>请检查是否选择大写字母、小写字母、数字以及特殊字符中选择三者且共至少八位";
                break;
            case "passwordFormat":
                $this->infos[$key . "Err"] = $this->infos["password_01Err"] = $this->infos["password_02Err"] = "两次密码输入不一致！";
                break;
            case "gender":
            case "website":
            case "comment":
            default:
                $this->vaildSum -= 1;
                break;
        }
    }
}

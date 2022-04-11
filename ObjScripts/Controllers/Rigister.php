<?php
use Validations\InfosValidator;
use Validations\ImageUploadValidator;
use Models\FormInfos; //表单信息类
use Models\FormInfosErrors; //表单信息错误类
use Models\FileUploadErrors; //文件上传错误类
// use Models\Infos;
// require("../Controllers/Validations/Validator.php");
// include("fileupload/FileUpload.php");
// require("./../Controllers/Validations/Register.php");

//初始化变量
$name = $email = $password_01 = $password_02 = $gender = $comment = $website = '';
$nameErr = $emailErr = $password_01Err = $password_02Err = $passwordErr = $genderErr = $commentErr = $websiteErr = '';
$imageUploadErr = '';
$imagePath = DEAFAULT_PORTAIT_PATH;

$infosValidator = new InfosValidator();
$imageUploadValidator = new ImageUploadValidator();
$formInfos = new FormInfos();
$formInfosErrors = new FormInfosErrors();
$fileUploadErrors = new FileUploadErrors();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // var_dump($_POST);
    $infosValidator->Validate($_POST); //验证表单信息
    $formInfos = $infosValidator->GetInfos(); //取出验证后的信息对象
    $formInfosErrors = $infosValidator->GetErrors(); //取出验证后的信息错误对象
    $submittedInfos = $formInfos->GetInfos(); //取出数据数组

    $imageUploadValidator->Validate($_FILES);
    $fileUploadErrors = $imageUploadValidator->GetErrors();
    var_dump($imageUploadValidator);
    echo "</br>error<br>" . var_dump($fileUploadErrors);
    $imagePath = $imageUploadValidator->GetPath();
    // echo $imagePath;
    // $errorsArray=$formInfosErrors->GetInfos();//取出错误，暂时不用取出错误数据，在下方判断完成后再进行取值
    //赋值给表单页面显示
    foreach ($submittedInfos as $key => $value) {
        if (!empty($value)) {
            switch ($key) {
                case "name":
                    $name = $value;
                    break;
                case "email":
                    $email = $value;
                    break;
                case "password_01":
                    $password_01 = $value;
                    break;
                case "password_02":
                    $password_02 = $value;
                    break;
                case "gender":
                    $gender = $value;
                    break;
                case "password":
                case "website":
                case "comment":
                default:
                    break;
            }
        }
    }
    if (($formInfosErrors->GetErrorSum() > 0 || $fileUploadErrors->GetErrorSum() > 0)) {
        $errorsArray = '';
        if ($formInfosErrors->GetErrorSum() > 0) { //若表单信息类中的错误数大于0，则取出错误信息
            // echo "</br>errorSum<br>" . $formInfosErrors->GetErrorSum();
            $errorsArray = $formInfosErrors->GetInfos();
            // echo '取出errorInfos';
            // var_dump($errorsArray);
            // echo $errorInfos;
            foreach ($errorsArray as $key => $value) {
                if (!empty($value)) {
                    switch ($key) {
                        case "nameErr":
                            $nameErr = $value;
                            break;
                        case "emailErr":
                            $emailErr = $value;
                            break;
                        case "password_01Err":
                            $password_01Err = $value;
                            break;
                        case "password_02Err":
                            $password_02Err = $value;
                            break;
                        case "genderErr":
                            $genderErr = $value;
                            break;
                        case "passwordFormatErr":
                        case "websiteErr":
                        case "commentErr":
                        default:
                            break;
                    }
                }
            }
        }
        if ($fileUploadErrors->GetErrorSum() > 0) { //若表单文件上传类中的错误数大于0，则取出错误信息
            // echo "</br>errorSum<br>" . $fileUploadErrors->GetErrorSum();
            $errorsArray = $fileUploadErrors->GetInfos();
            // echo '取出errorInfos';
            // var_dump($errorsArray);
            // echo $errorInfos;
            foreach ($errorsArray as $key => $value) {
                if (!empty($value)) {
                    switch ($key) {
                        case "imageErr":
                            $imageUploadErr = $value;
                            break;
                        default:
                            break;
                    }
                }
            }
        }else{
            $imagePath=$imageUploadValidator->GetPath();
            // echo $imagePath;
        }
        echo "注册失败</br>";
    } else {
        session_start();
        $_SESSION['admin']=true;
        echo "注册成功";
        header("location:index.html");
    }
}


<?php

namespace Models;

class FileUploadErrors extends Errors
{
    protected array $infos = array("imageErr" => null);
    function AddNullError(string $key)
    {
        $this->vaildSum += 1;
        switch ($key) {
            case "image"://默认头像可以不用上传头像
                // $this->infos[$key]="请选择文件！";
            default:
                $this->vaildSum -= 1;
                break;
        }
    }
    function AddValidateError(string $key)
    {
        $this->vaildSum += 1;
        echo $this->GetErrorSum();
        switch ($key) {
            case "image":
                $this->infos[$key . "Err"] = "";
                break;
            default:
                $this->vaildSum -= 1;
                break;
        }
    }
    function AddSizeError($key)
    {
        $this->vaildSum += 1;
        switch ($key) {
            case "image":
                $this->infos[$key . "Err"] = "文件大小请不要超过8M!";
                break;
            default:
                $this->vaildSum -= 1;
                break;
        }
    }
    function AddFormatError($key)
    {
        $this->vaildSum += 1;
        switch ($key) {
            case "image":
                $this->infos[$key . "Err"] = "非法的文件格式";
                break;
            default:
                $this->vaildSum -= 1;
                break;
        }
    }
    function AddLoadedError($key)
    {
        $this->vaildSum += 1;
        switch ($key) {
            case "image":
                $this->infos[$key . "Err"] = "文件已经存在。";
                break;
            default:
                $this->vaildSum -= 1;
                break;
        }
    }
    function AddSystemError(string $key, string $value)
    {
        $this->vaildSum += 1;
        switch ($key) {
            case "image":
                $this->infos[$key . "Err"] = $value;
                break;
            default:
                $this->vaildSum -= 1;
                break;
        }
    }
}

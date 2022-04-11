<?php
namespace Models;
class ImageUploadErrors extends FileUploadErrors
{
    protected array $infos=array("image"=>null);
    function AddNullError(string $key)
    {
        $this->infos[$key]=""
    }
    function AddValidateError(string $key)
    {
        $a='';
    }
    function AddFormatError()
    {
        $a='';
    }
    function AddSizeError()
    {
        $a='';
    }
    function AddSystemError()
    {
        $a='';
    }
}

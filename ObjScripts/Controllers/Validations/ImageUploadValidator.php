<?php

namespace Validations;

use Models\FileUploadErrors;
use Models\Upload\FileUploader;

class ImageUploadValidator extends FileUploadValidator
{
	protected string $fileUploadPath = DEAFAULT_UPLOAD_PATH;
	protected string $fileName=DEAFAULT_PORTAIT_NAME;
	protected string $loadedPath=DEAFAULT_PORTAIT_PATH;
	function __construct()
	{
		// $this->errors=new FileUploadErrors();
		parent::__construct();
		$this->maxUploadSize = 8 * 1024 * 1024;
		// $this->imagePath = "../../Resources/Default/Images/Default.png";
		// $this->fileUploadPath = DEAFAULT_UPLOAD_PATH;
	}
	function Validate(array $imageFile)
	{
		if (is_uploaded_file($imageFile['image']['tmp_name'])) {
			// if(!empty($_POST["image"])){
			// echo $imageFile;
			$this->fileName=$imageFile["image"]["name"];
			$this->fileType=$imageFile["image"]["type"];
			$this->fileSize=$imageFile["image"]["size"];
			$this->fileTempName=$imageFile["image"]["tmp_name"];
			$allowedExts = array("gif", "jpeg", "jpg", "png", "pjpeg", "x-png");
			$temp = explode(".",$this->fileName);
			$extension = end($temp);     // 获取文件后缀名
			if (
				($this->ValidateFormat($this->fileType)) //检测类型
				&& ($this->ValidateSize($this->fileSize))   // 小于 8M
				&& in_array($extension, $allowedExts) //检测后缀，注意：因为类型和后缀有可能不同？
			) {
				if ($imageFile["image"]["error"] > 0) {
					$this->errors->AddSystemError("image", "错误：: " . $imageFile["image"]["error"] . "<br>");
				} else {
					echo "上传文件名: " . $this->fileName . "<br>";
					echo "文件类型: " . $this->fileType . "<br>";
					echo "文件大小: " . ($this->fileSize / 1024) . " kB<br>";
					echo "文件临时存储的位置: " . $this->fileTempName . "<br>";
					// 判断当期目录下的 upload 目录是否存在该文件
					// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
					if (file_exists($this->fileUploadPath . $this->fileName) ){
						// $this->loadedPath=$this->fileTempName;
						$this->errors->AddLoadedError("image");
					} else {
						// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
						$uploader = new FileUploader();
						echo  $this->fileUploadPath . $this->fileName;
						if ($uploader->FileUpload($this->fileTempName, $this->fileUploadPath . $this->fileName)) {
							$this->loadedPath = $this->fileUploadPath .$this->fileName;
							echo "文件存储在: " . $this->loadedPath;
						} else {//如果没能上传到upload文件夹，则存储错误
							$this->errors->AddSystemError("image", "上传失败，系统错误，请刷新或稍后重试！");
						}
					}
				}
			} else {
				$this->errors->AddFormatError('image');
			}
		} else {
			$this->errors->AddNullError('image');
		}
	}
	function ValidateFormat(string $type)
	{
		switch ($type) {
			case "image/gif":
			case "image/jpg":
			case "image/pjpeg":
			case "image/x-png":
			case "image/png":
			case "image/jpeg":
				return true;
			default:
				return false;
		}
	}
	function ValidateSize(float $size)
	{
		if ($size < $this->maxUploadSize) {
			return true;
		}
		return false;
	}
}

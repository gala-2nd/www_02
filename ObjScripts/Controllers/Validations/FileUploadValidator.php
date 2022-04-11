<?php

namespace Validations;

use Models\FileUploadErrors;

abstract class FileUploadValidator extends FormValidator
{
	protected int $maxUploadSize; //已在php.ini中更改upload_max_filesize为8M（默认为2M）
	protected string $fileUploadPath;
	protected string $loadedPath;

	protected string $fileName;
	protected string $fileType;
	protected string $fileSize;
	protected string $fileTempName;

	protected FileUploadErrors $errors;
	function GetPath()
	{
		if (empty($this->loadedPath)) {
			if (empty($this->fileTempName)) {
				return $this->loadedPath = DEAFAULT_PORTAIT_PATH;
			} else {
				return $this->fileTempName;
			}
		} else {
		// echo "here";
		// echo "loadedpath".$this->loadedPath;
			return $this->loadedPath;
		}
	}
	function __construct()
	{
		$this->errors = new FileUploadErrors();
	}
	function GetErrors()
	{
		return $this->errors;
	}
	abstract function ValidateFormat(string $type);
	abstract function ValidateSize(float $size);
}

<?php

namespace Validations;
use Models\FormInfos;
use Models\FormInfosErrors;
class InfosValidator Extends FormValidator
{
	private array $results;
	private array $originInfos;
	private array $pwds;

	// protected FormInfos $infos;
	// protected FormInfosErrors $errors;
	function Getinfos()
	{
		return $this->infos;
	}
	function GetErrors()
	{
		return $this->errors;
	}function __construct()
	{
		$this->infos = new FormInfos();
		$this->errors = new FormInfosErrors();
		$this->results = array("infos" => null, "errors" => null);
		$this->pwds = array();
	}
	function Validate(array $originInfos)
	{
		// echo "originInfos:";
		// var_dump($originInfos);
		$this->originInfos = $originInfos;
		$infos=$this->infos->Initial($originInfos);
		// echo "Forminfos";
		// var_dump($infos);
		$pwds = array();
		foreach ($infos as $key => $value) {
			if (empty($value)) { //若$value为空
				$this->errors->AddNullError($key);
			} else {
				$temp = test_input($value); //先处理一下$value
				$this->infos->AddInfos($key, $temp);
				switch ($key) {
					case "name":
						if (!ValidateName($temp)) {
							$this->errors->AddValidateError($key);
						}
						break;
					case "email":
						if (!ValidateEmail($temp)) {
							$this->errors->AddValidateError($key);
						}
						break;
					case "password_01":
					case "password_02":
						if (!ValidatePwd($temp)) {
							$this->errors->AddValidateError($key);
						}
						array_push($pwds, $temp);
						break;
					case "gender":
					case "password":
					case "website":
					case "comment":
					default:
						break;
				}
			}
		}
		$this->CmpPwdFormat($pwds);
	}
	function CmpPwdFormat(array $pwds)
	{
		if (empty($pwds) || count($pwds) < 1 || count($pwds) > 2 || empty($pwds[0]) || empty($pwds[1])) return;
		if (strcmp($pwds[0], $pwds[1]) != 0) {
			$this->errors->AddValidateError("passwordFormat");
		}
	}
}

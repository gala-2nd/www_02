<?php
class Errors
{
        protected $errors = array(
        "nameErr" => null, "emailErr" => null, "password_01Err" => null,
        "password_02Err" => null, "genderErr" => null, "commentErr" => null,
        "websiteErr" => null
    );
    protected $errSum=0;
    function GetInfos(){
        return $this->errors;
    }
    function GetErrorSum(){
        return $this->errSum;
    }
    function __construct(Array $errors=null)
    {
        if(!empty($errors)){
            $this->Initial($errors);
        }
    }
    function Initial(Array $infos)
    {
        if (empty($infos)) return;
        foreach ($infos as $key => $value) {
            if (!empty($value) && in_array($key, array_keys($this->errors))) {
                $this->errors[$key] = $value;
                $this->errSum+=1;
            }
        }
    }
}
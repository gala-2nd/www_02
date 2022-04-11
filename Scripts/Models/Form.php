<?php
class Form
{
    // var $name,$email,$password_01,$password_02,$gender,$comment,$website;
    var $infos = array(
        "name" => null, "email" => null, "password_01" => null,
        "password_02" => null, "gender" => null, "comment" => null,
        "website" => null
    );
    function GetInfos(){
        return $this->infos;
    }
    // function
    function __construct(Array $infos=null)
    {
        if(!empty($infos)){
            $this->Initial($infos);
        }
    }
    function Initial(Array $infos)
    {
        if (empty($infos)) return;
        foreach ($infos as $key => $value) {
            if (!empty($value) && in_array($key, array_keys($this->infos))) {
                $this->infos[$key] = $value;
            }
        }
    }
}

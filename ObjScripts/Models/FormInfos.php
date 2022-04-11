<?php
namespace Models;
// require("Errors.php");
class FormInfos extends Infos
{
    // private $infos ;
    protected array $infos=array(
        "name" => null, "email" => null, "password_01" => null,
        "password_02" => null, "password"=>null,"gender" => null, "comment" => null,
        "website" => null
    );
    function AddInfos(string $key,$value){//处理单个键值对
        switch($key){
            case "name":$this->infos[$key]=$value;break;
            case "email":$this->infos[$key]=$value;break;
            case "email":$this->infos[$key]=$value;break;
            case "password_01":$this->infos[$key]=$value;break;
            case "password_02":$this->infos[$key]=$value;break;
            case "gender":$this->infos[$key]=$value;break;
            case "password":
            case "website":
            case "comment":
            default:
                break;
        }
    }
}

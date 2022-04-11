<?php

namespace Models;

abstract class Infos
{
    protected array $infos;
    protected int $vaildSum=0;
    function GetInfos(){
        return $this->infos;
    }
    function GetVailSum()
    {
        return $this->vaildSum;
    }
    function __construct(array $infos = null)
    {
        if (!empty($infos)&&!empty($this->infos)) {
            $this->Initial($infos);
        }
    }
    function Initial(array $infos)
    {
        if (empty($infos)) return;
        foreach ($infos as $key => $value) {
            if (!empty($value) && in_array($key, array_keys($this->infos))) {
                $this->infos[$key] = $value;
                $this->vaildSum += 1;
            }
        }
        return $this->infos;
    }
}

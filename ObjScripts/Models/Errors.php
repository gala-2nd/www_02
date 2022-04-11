<?php

namespace Models;
// use Models\Infos;
abstract class Errors extends Infos
{
    protected int $errSum = 0;
    function GetErrorSum()
    {
        return $this->errSum=parent::GetVailSum();
    }
    abstract function AddNullError(string $key);
    abstract function AddValidateError(string $key);
    }
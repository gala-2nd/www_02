<?php

namespace Validations {
    // require("../Models/Errors.php");
    // require("../Models/Form.php");
    abstract class FormValidator
    {
        abstract function Validate(array $originForm);
    }
}

<?php
    $a=password_hash($pwd,PASSWORD_DEFAULT);
    if(password_verify('12346',$a)){
        echo "confirm";
    }
?>
<?php
function input($value){
    $newvalue=trim($value);
    $newvalue=htmlspecialchars($newvalue);
    $newvalue=stripslashes($newvalue);
    return $newvalue;
}
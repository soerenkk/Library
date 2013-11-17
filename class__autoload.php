<?php

// Require our OOP class
// When whiting "new {and a class name here}({maybe some parameters here});"
// Then PHP will automaticly require(_once) the class file, from the "class" directory
// Note: filename have to be writen in lower case, and also the name of the class
function __autoload($classname)
{
    $file = strtolower($classname).".php";
    require_once("class/".$file);
}

?>

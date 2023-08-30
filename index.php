<?php

use Jemer\EventDispatcher\Manager;

require 'vendor/autoload.php';


$manager = new Manager(
        [
            "load", 
            "before",
            "after",
            "onlogin",
            "onlogout",
            "beforerender",
            "afterrender"
]);

$manager->RegisterNamespace("Jemer\EventDispatcher");

$manager->Register('load', "Tester");

$manager->Register('load', function()
{
    echo " function baby!!!" . PHP_EOL;
});


$manager->FireEvent('load');

?>
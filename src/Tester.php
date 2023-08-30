<?php 

namespace Jemer\EventDispatcher;

class Tester extends ObserverBase
{
    public function Load() : void
    {
        //todo: load any resources this observer needs
        echo "---Load()" . PHP_EOL;
    }
    public function Run(): void
    {
        //todo: run the observer code here
        echo "---Run()" . PHP_EOL;
    }
}


?>
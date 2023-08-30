<?php 

namespace Jemer\EventDispatcher;

abstract class ObserverBase
{
    public abstract function Load() : void;
    public abstract function Run() : void;
}

?>
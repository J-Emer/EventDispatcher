<?php 

namespace Jemer\EventDispatcher;

use Exception;

class Manager
{
    private $events;
    private $classNamespace;

    public function __construct(array $avaliableevents)
    {
        foreach ($avaliableevents as $item) 
        {
            $this->events[$item] = array();
        }
    }
    public function RegisterNamespace(string $namespace) : void
    {
        $this->classNamespace = $namespace;
    }
    public function Register(string $name, $callback)
    {
        if(!array_key_exists($name, $this->events))
        {
            return;            
        }

        $this->events[$name][] = $callback;
    }
    public function FireEvent(string $event)
    {
        if(!array_key_exists($event, $this->events))
        {
            throw new Exception("Could not find event: " . $event);
            return;
        }

        foreach ($this->events[$event] as $event) 
        {
            if(is_string($event))
            {
                $className = $this->classNamespace . '\\' . $event;
                $class = new $className();
                $class->Load();
                $class->Run();
            }
            else
            {
                call_user_func($event);
            }
        }
    }
    public function ToString()
    {
        echo "<pre>";
        var_dump($this->events);
        echo "</pre>";
    }
}

?>
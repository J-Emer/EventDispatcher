# EventDispatcher
Creates, Manages, and Fires events during your project runtime

```
composer require jemer/event-dispatcher dev-main
```

## Adding Events
Events are added on creation. 

```php
$manger = new Manager([
    'load',
    'unload',
    'before_render',
    'after_render'
]);
```
This will add ```load``` ```unlodad``` ```before_render``` ```after_render``` events that you can hook into. *Note you can add your own events and call them whatever you want.*

## Handling Events
Events can either be handled by a Closure, or a Class. 

### Closure
```php
$manger->Register('load', function()
{
    echo "this will run when the Load event get triggered";
});
```
### Class
```php
<?php 

namespace Jemer\Test;

use Jemer\EventDispatcher\ObserverBase;

class TestObserver extends ObserverBase
{
    public function Load() : void
    {
        // use this to load in any resources this observer will need
        // Load() will be called immediately before Run()
        echo "Load()";
    }

    public function Run() : void
    {
        // run your code here
        echo "Run()";
    }
}

?>
```
When using a class to handle your events you must use the ```Load()``` and ```Run()```. Use ```Load()``` to load in any resources you will need, and use ```Run()``` to handle your event. Load is called immediately before Run . When using a Closure there is no ```Load()```. 

## Firing an Event
In your project when you need to fire off an event such as ```load``` simply 

```php
$manger->FireEvent('load');
```

This will fire off the ```load``` event.


<?php

require_once("vendor/autoload.php");

$f3 = Base::instance();
$f3->config('config.ini');
$f3->config('routes.ini');

// $f3-> set('message', 'Hello, World!!!!');       // Setting a global variable called 'message' with the content of 'Hello, World!!!!'
// $f3->route('GET /', function($f3) {
//     echo $f3->get('message');                   // Calling the global variable we created on line 7. 
// });

class AppController
{
    function beforeroute()
    {
        echo 'Before routing - ';                   // Having a method that runs before routing would be good for instances like checking for valid browsing sessions. Improves security.
    }                                               // Overwrites 'beforeroute()' that exists in the Base run.

    function afterroute()
    {
        echo '- After routing -';                   // Same concept as above, but works when after routing the page. Does not directly need to be called. 
    }
}

class Main extends AppController
{
    function render()
    {
        echo 'Hello, world!';                       // Creating a class, with nested methods that can be called. 
    }

    function spooky()
    {
        echo 'Boo!';
    }
}

class AboutPage extends AppController
{
    function render()
    {
        echo 'This is the about page!';
    }
}

// $f3->route('GET /', 'Main->render');
// $f3->route('GET /spooky', 'Main->spooky');          // Call the class and the method using -> in the second parameter of the render function. 
// $f3->route('GET /about', 'AboutPage->render');


$f3->run();

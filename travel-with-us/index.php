 <?php  
require __DIR__ . '/vendor/autoload.php';


 // Use this namespace
use MiladRahimi\PHPRouter\Router;

// Create brand new Router instance
$router = new Router();

// Map this function to home page
$router->get("/php/travel-with-us/", function () {
    return "This is home page!";
});

// Dispatch all matched routes and run!
$router->dispatch();

?>
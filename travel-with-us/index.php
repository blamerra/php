 <?php  
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controller.php';


 // Use this namespace
use MiladRahimi\PHPRouter\Router;



try{
	// Create brand new Router instance
	$router = new Router();

	// Home page
	$router->get("/php/travel-with-us/", "Controller@home"); 

	// Travel detail page
	$router->get("/php/travel-with-us/travel/{id}", "Controller@travel");

	//test
	$router->get("/php/travel-with-us/test/{id}", "Controller@test");

	// Dispatch all matched routes and run!
	$router->dispatch();
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

?>
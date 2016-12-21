<?php  

use MiladRahimi\PHPTemplate\TemplateEngineFactory;

class Controller
{
		var $templateEngine;
		
		function __construct() {		
			$this->templateEngine = TemplateEngineFactory::create();
			$this->templateEngine->setBaseDirectory("views");
		}		


    function home()
    {
				$data = array(
				    "name"     => "Bon",
				    "surname"  => "Jovi"
				);

				echo $this->templateEngine->render("header.html", $data);
				echo $this->templateEngine->render("menu.html", $data);				
				echo $this->templateEngine->render("banner.html", $data);
				echo $this->templateEngine->render("last_travel.html", $data);				
				echo $this->templateEngine->render("timeline.html", $data);								
				echo $this->templateEngine->render("footer.html", $data);
    }


    function travel($id)
    {
 				$data = array(
				    "travelId" => $id				  
				);

				echo $this->templateEngine->render("header.html", $data);
				echo $this->templateEngine->render("travel.html", $data);        
				echo $this->templateEngine->render("footer.html", $data);				
    }
}

?>
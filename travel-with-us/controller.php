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
			  "travelId" => $id,				  
			);
			echo $this->templateEngine->render("header.html", $data);
			echo $this->templateEngine->render("menu.html", $data);       
			echo $this->templateEngine->render("travel.html", $data);        
			echo $this->templateEngine->render("footer.html", $data);							
    }

    function travel_3($id)
    {


				//echo $this->templateEngine->render("header_travel.html", $data);
				//echo $this->templateEngine->render("travel.html", $data);        
				//echo $this->templateEngine->render("footer.html", $data);				
		
			$img_list=array();
			for ($img_id = 100; $img_id < 135; $img_id++){

				array_push($img_list, $img_id);	
			}




 				$data = array(
				    "travelId" => $id,				  
						"xxximages"  => array("colombia-100", "colombia-101", "colombia-102"),
						"images" => $img_list
				);

				echo $this->templateEngine->render("bootstrap-navbar-fixed-top.html", $data);		
/*
				echo $this->templateEngine->render("header_travel.html", $data);
				echo $this->templateEngine->render("menu_travel.html", $data);		
				echo $this->templateEngine->render("tiles_nested.html", $data);			
*/
			

				//echo $this->templateEngine->render("travel.html", $data);        
				//echo $this->templateEngine->render("footer.html", $data);				
    }

    function test($id)    {

			$data = array(
		    "name"    => "David",
		    "surname" => "Gilmour",
		    "genres"  => array("Progressive Rock", "Art Rock", "Blues Rock"),
		    "images"  => array("colombia-100", "colombia-101", "colombia-102")
				);    

			echo $this->templateEngine->render("singer.html", $data);
		}
}

?>
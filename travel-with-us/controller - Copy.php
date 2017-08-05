<?php  

use MiladRahimi\PHPTemplate\TemplateEngineFactory;
 


//here ItemType is encapsulated into an object
$GLOBALS['travels'] = array(
  0 => new Travel('cuba', 'Cuba', 'sud-america','2016','11','72157686736328755'),
  1 => new Travel('japo', 'Japo', 'asia','2016','08','72157686736328755')
);

class Controller
{
		var $templateEngine;
		var $view;
		
		function __construct() {		
			$this->view = new View();
			//$this->templateEngine = TemplateEngineFactory::create();
			//$this->templateEngine->setBaseDirectory("views");
		}		


    function home()
    {
			$data = array();
			$this->view->ShowHeader();			
			//echo $this->templateEngine->render("banner.html", $data);
			//echo $this->templateEngine->render("last_travel.html", $data);				
			//echo $this->templateEngine->render("timeline.html", $data);								
			$this->view->ShowFooter();			
    }

    function travel($id)
    {
			$data = array(
			  "travelId" => $id,				  
			);
			
			$this->view->ShowHeader();				   
			//echo $this->templateEngine->render("travel.html", $data);        
			$this->view->ShowFooter();								
    }
/*

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
			echo $this->templateEngine->render("@test_array.html", $data);
		}

    function test2($id){

			$data = array(
		    "travels"    => $GLOBALS['travels']
			);    		
			
			$this->ShowHeader();			

			echo $this->templateEngine->render("@test_array.html", $data);

			echo $this->templateEngine->render("@test_array.html", $data);
			$this->ShowFooter();				
		}		

		private function ShowHeader()		
		{
			$data = array();
			echo $this->templateEngine->render("header.html", $data);
			echo $this->templateEngine->render("menu.html", $data);		
		}

		private function ShowFooter()		
		{
			$data = array();			
			echo $this->templateEngine->render("footer.html", $data);		
		}		
		*/
}

?>
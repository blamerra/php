<?php  
use MiladRahimi\PHPTemplate\TemplateEngineFactory;


class View
{
		var $templateEngine;
		
		function __construct() {		
			$this->templateEngine = TemplateEngineFactory::create();
			$this->templateEngine->setBaseDirectory("views");
		}		
 
		function ShowHeader($continentList, $travelList)		
		{
			$data = array(
				'menu_items'  =>  $this->getMenuItemsHTML($continentList, $travelList)
			);

			echo $this->templateEngine->render("header.html", $data);
			echo $this->templateEngine->render("menu.html", $data);		
			//echo $this->templateEngine->render("menu - Copy.html", $data);		
		}

		function ShowFooter()		
		{
			$data = array();			
			echo $this->templateEngine->render("footer.html", $data);		
		}		

    function ShowTravel($id)
    {
			$data = array(
			  "travelId" => $id,				  
			);						 
			echo $this->templateEngine->render("travel.html", $data);        			
    }		


    private function getMenuItemsHTML($continentList, $travelsList){
			$output = '';
			foreach ($continentList->findAll() as $continent) {
				$output .= '<li class="dropdown menu__item">';
    		$output .= '<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown">';
    		$output .= $continent->name;
    		$output .= '<b class="caret"></b></a>';

    		$output .= '<ul class="dropdown-menu agile_short_dropdown"> ';
    		foreach ($travelsList->findByContinentId($continent->id) as $travel) {
					$output .= '<li><a class="scroll" href="#services">'.$travel->name.'</a></li>';
    		}
				$output .= '</ul>';
                                                                 		    		
    		$output .= '</li>';
			}
			return $output;
		}


}

?>
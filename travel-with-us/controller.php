<?php  

use Models\Travel;
use Models\TravelList;
use Models\Continent;
use Models\ContinentList;

//here ItemType is encapsulated into an object
/*
$GLOBALS['travels'] = array(
  0 => new Travel('cuba', 'Cuba', 'sud-america','2016','11','72157686736328755'),
  1 => new Travel('japo', 'Japo', 'asia','2016','08','72157686736328755')
);
*/
class Controller
{		
		var $view;
		var $travelList;
		var $continentList;
		
		function __construct() {		
			$this->view = new View();
			$this->travelList = new TravelList();
			$this->continentList = new ContinentList();			
		}		


    function home()
    {
			$this->view->ShowHeader($this->continentList, $this->travelList);	
			$this->view->ShowFooter();						

/*		
			foreach ($this->travelList->findAll() as $item) {
    		echo $item->name;
    		echo '<br>';
			}

			echo 'xxxx<br>';

			foreach ($this->continentList->findAll() as $item) {
    		echo $item->name;
    		echo '<br>';
			}
			
			echo 'xxxx<br>';
			foreach ($this->travelList->findByContinent('asia') as $item) {
    		echo $item->name;
    		echo '<br>';
			}

			//echo $this->templateEngine->render("banner.html", $data);
			//echo $this->templateEngine->render("last_travel.html", $data);				
			//echo $this->templateEngine->render("timeline.html", $data);		
			*/						

    }

    function travel($id)
    {			
			$this->view->ShowHeader();				   
			$this->view->ShowTravel($id);
			//echo $this->templateEngine->render("travel.html", $data);        
			$this->view->ShowFooter();								
    }
}

?>

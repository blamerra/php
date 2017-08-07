<?php  

use Models\Config;
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
		var $config;
		
		function __construct() {		
			$this->view = new View();
			$this->travelList = new TravelList();
			$this->continentList = new ContinentList();			
			$this->config = new Config();			
		}		


    function home()
    {
			$this->view->ShowHeader($this->continentList, $this->travelList, $this->config);	
			$this->view->ShowHome($this->config);	
			$this->view->ShowFooter();						
    }
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



    function travel($id)
    {			
			$travel = $this->travelList->getTravelById($id);

			$this->view->ShowHeader($this->continentList, $this->travelList, $this->config);			   
			if (isset($travel->name)) $this->view->ShowTravel($travel, $this->config);
			else ($this->view->ShowError("Aquesta galeria de fotografies encara no existeix"));			       
			$this->view->ShowFooter();								
    }
}

?>

<?php  

use Models\Config;
use Models\Travel;
use Models\TravelList;
use Models\Continent;
use Models\ContinentList;

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
		$this->view->ShowFooter($this->config);								
    }


    function travel($id)
    {			
			$travel = $this->travelList->getTravelById($id);

			$this->view->ShowHeader($this->continentList, $this->travelList, $this->config);			   
			if (isset($travel->name)) $this->view->ShowTravel($travel, $this->config);
			else ($this->view->ShowError("Aquesta galeria de fotografies encara no existeix"));			       
			$this->view->ShowFooter($this->config);								
    }
}

?>

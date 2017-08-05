<?php  
namespace Models;

class Travel
{
		public $id;
		public $name;
		public $continent_id;
    public $year;
    public $month;
    public $flickrAlbumId;

    function __construct($id, $name, $continent_id, $year, $month, $flickrAlbumId) {
			$this->id = $id;
			$this->name = $name;
			$this->continent_id = $continent_id;
    	$this->year = $year;
    	$this->month = $month;
    	$this->flickrAlbumId = $flickrAlbumId;    	
    }
}

class TravelList extends GenericList
{
    
    function __construct() {
  		$listItems =	array(  			
  			11 => new Travel('japo', 'Japo', 'asia','2016','08','72157686736328755'),
  			12 => new Travel('india', 'India', 'asia','2016','08','72157686736328755'),
  			13 => new Travel('vietnam', 'Vietnam', 'asia','2016','08','72157686736328755'),
  			14 => new Travel('cambotja', 'Cambotja', 'asia','2016','08','72157686736328755'),
  			15 => new Travel('tailandia', 'Tailandia', 'asia','2016','08','72157686736328755'),

				20 => new Travel('etiopia', 'Etiopia', 'africa','2016','11','72157686736328755'),
				21 => new Travel('senegal', 'Senegal', 'africa','2016','11','72157686736328755'),
				22 => new Travel('sud-africa', 'Sud Africa', 'africa','2016','11','72157686736328755'),				
				23 => new Travel('botswana', 'Botswana', 'africa','2016','11','72157686736328755'),
				24 => new Travel('zimbawe', 'Zimbawe', 'africa','2016','11','72157686736328755'),

				30 => new Travel('barcelona', 'Barcelona', 'europa','2016','11','72157686736328755'),
				31 => new Travel('paris', 'Paris', 'europa','2016','11','72157686736328755'),
				32 => new Travel('dublin', 'Dublin', 'europa','2016','11','72157686736328755'),

  			40 => new Travel('cuba', 'Cuba', 'sud-america','2016','11','72157686736328755'),
  			41 => new Travel('bolivia', 'Bolivia', 'sud-america','2016','11','72157686736328755'),
  			42 => new Travel('peru', 'Peru', 'sud-america','2016','11','72157686736328755'),
  			43 => new Travel('ecuador-illes-galapagos', 'Illes Galapagos', 'sud-america','2016','11','72157686736328755'),
  			44 => new Travel('brasil', 'Brasil', 'sud-america','2016','11','72157686736328755'),

  			50 => new Travel('las-vegas', 'Las Vegas', 'nord-america','2016','11','72157686736328755'),
  			51 => new Travel('nova-york', 'Nova York', 'nord-america','2016','11','72157686736328755'),
  			52 => new Travel('washington-dc', 'Washington DC', 'nord-america','2016','11','72157686736328755'),  			
			);

			parent::__construct($listItems);
    }

		public function findByContinentId($continent_id){

			$new_array = array_filter($this->findAll(), function($element) use ($continent_id){
			  if (isset($element->continent_id) && $element->continent_id == $continent_id) {
			    return TRUE;
			  }
			  return FALSE;
			});
			return $new_array;
		}
}

class Continent
{
		public $id;
		public $name;

    function __construct($id, $name) {
			$this->id = $id;
			$this->name = $name;  	
    }
}

class ContinentList extends GenericList
{    
    function __construct() {
  		$listItems =	array(
				0 => new Continent('asia', 'Asia'),
  			1 => new Continent('africa', 'Africa'),
  			2 => new Continent('europa', 'Europa'),
  			3 => new Continent('sud-america', 'Sud America'),
  			4 => new Continent('nord-america', 'Nord America'),  			
			);

			parent::__construct($listItems);    
		}
}


class GenericList {
	private $listItems;
  
  public function __construct($listItems) {
  	$this->listItems = $listItems;
  }

  public function findAll (){
  	return $this->listItems;
  }
}



// General singleton class.
//use $object1 = Singleton::getInstance();
class SingletonList {
  // Hold the class instance.
  private static $instance = null;
  private $listItems;

  // The constructor is private
  // to prevent initiation with outer code.
  private function __construct()
  {
    // The expensive process (e.g.,db connection) goes here.    
  }
 
  // The object is created from within the class itself
  // only if the class has no instance.
  public static function getInstance()
  {
    if (self::$instance == null)
    {
      self::$instance = new SingletonList();
    } 
    return self::$instance;
  }

  public function findAll (){
  	return $this->listItems;
  }  
}
 

?>

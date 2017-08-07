<?php  
namespace Models;

class Config
{
		public $home_url;
		public $flickr_user;
		
    function __construct() {
			$this->home_url = "http://localhost/php/travel-with-us/";
			$this->flickr_user = "151159910@N02";
    }
}


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
  			new Travel('japo', 'Japo', 'asia','2016','08','72157686736328755'),
  			new Travel('india', 'India', 'asia','2016','08','72157686736328755'),
  			new Travel('vietnam', 'Vietnam', 'asia','2016','08','72157686736328755'),
  			new Travel('cambotja', 'Cambotja', 'asia','2016','08','72157686736328755'),
  			new Travel('tailandia', 'Tailandia', 'asia','2016','08','72157686736328755'),

				new Travel('etiopia', 'Etiopia', 'africa','2016','11','72157686736328755'),
				new Travel('senegal', 'Senegal', 'africa','2016','11','72157686736328755'),
				new Travel('sud-africa', 'Sud Africa', 'africa','2016','11','72157686736328755'),				
				new Travel('botswana', 'Botswana', 'africa','2016','11','72157686736328755'),
				new Travel('zimbawe', 'Zimbawe', 'africa','2016','11','72157686736328755'),

				new Travel('barcelona', 'Barcelona', 'europa','2016','11','72157686736328755'),
				new Travel('paris', 'Paris', 'europa','2016','11','72157686736328755'),
				'dinamarca' => new Travel('dinamarca', 'Dinamarca', 'europa','2016','11','72157686736328755'),
				'alemanya' => new Travel('alemanya', 'Alemanya', 'europa','2016','11','72157683990057444'),

  			new Travel('cuba', 'Cuba', 'sud-america','2016','11','72157686736328755'),
  			new Travel('bolivia', 'Bolivia', 'sud-america','2016','11','72157686736328755'),
  			new Travel('peru', 'Peru', 'sud-america','2016','11','72157686736328755'),
  			new Travel('ecuador-illes-galapagos', 'Illes Galapagos', 'sud-america','2016','11','72157686736328755'),
  			new Travel('brasil', 'Brasil', 'sud-america','2016','11','72157686736328755'),  			
  			'puerto-rico' => new Travel('puerto-rico', 'Puerto Rico', 'sud-america','2016','11','72157686736328755'),  			

  			new Travel('las-vegas', 'Las Vegas', 'nord-america','2016','11','72157686736328755'),
  			new Travel('nova-york', 'Nova York', 'nord-america','2016','11','72157686736328755'),
  			new Travel('washington-dc', 'Washington DC', 'nord-america','2016','11','72157686736328755'),  			
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

		public function getTravelById2($travel_id){
			$new_array = array_filter($this->findAll(), function($element) use ($travel_id){
			  if (isset($element->id) && $element->id == $travel_id) {
			    return TRUE;
			  }
			  return FALSE;
			});

    	//reset($new_array);
			if (count($new_array) > 0)	return $new_array[key($new_array)];
		}

		public function getTravelById($travel_id){			
			if (isset($this->listItems[$travel_id]->id)) return $this->listItems[$travel_id];
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
	protected $listItems;
  
  public function __construct($listItems) {
  	$this->listItems = $listItems;
  }

  public function findAll (){
  	return $this->listItems;
  }

 	public function getItemById ($id){
  	if (isset($this->listItems[$id])) return $this->listItems[$id];
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


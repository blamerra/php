<?php  
use MiladRahimi\PHPTemplate\TemplateEngineFactory;


class View
{
		var $templateEngine;
		
		function __construct() {		
			$this->templateEngine = TemplateEngineFactory::create();
			$this->templateEngine->setBaseDirectory("views");
		}		
 
		function ShowHeader($continentList, $travelList, $config)		
		{
			$data = array(
				'menu_items'  =>  $this->getMenuItemsHTML($continentList, $travelList),
				'home_url' => $config->home_url

			);

			echo $this->templateEngine->render("header.html", $data);
			echo $this->templateEngine->render("menu.html", $data);					
		}


		function ShowHome($config)		
		{
			$data = array(		  
			  'photo_gallery_index_html'  =>  $this->getTravelPhotoGalleryIndexHTML($config)
			);			
			echo $this->templateEngine->render("home.html", $data);		
		}		


		function ShowFooter()		
		{
			$data = array();			
			echo $this->templateEngine->render("footer.html", $data);		
		}		

    function ShowTravel($travel, $config)
    {
			$data = array(
			  'travelId' => $travel->name,				  
			  'photo_gallery_html'  =>  $this->getTravelPhotoGalleryHTML($travel, $config)
			);						 
			
			echo $this->templateEngine->render("travel.html", $data);        			
    }		

		function ShowError($msg)		
		{
			echo '<div class="postit">'.$msg.'</div>';
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
					$output .= '<li><a class="" href="/php/travel-with-us/travel/'.$travel->id.'">'.$travel->name.'</a></li>';
    		}
				$output .= '</ul>';
                                                                 		    		
    		$output .= '</li>';
			}
			return $output;
		}

    private function getTravelPhotoGalleryIndexHTML($config){
			$output = '';
  		$output .= '<div data-nanogallery2=\'{';
      $output .= '"userID": "'.$config->flickr_user.'",';
			$output .= '"kind": "flickr",';
      $output .= '"thumbnailWidth": "auto",';
      $output .= '"thumbnailDisplayInterval": 30,';
      $output .= '"gallerySorting" : "titleAsc"';
      $output .= '}\'>';
  		$output .= '</div>';

			return $output;
		}		

    private function getTravelPhotoGalleryHTML($travel, $config){
			$output = '';
  		$output .= '<div data-nanogallery2=\'{';
      $output .= '"userID": "'.$config->flickr_user.'",';
			$output .= '"kind": "flickr",';
      $output .= '"photoset": "'.$travel->flickrAlbumId.'",';			
      $output .= '"thumbnailWidth": "auto",';
      $output .= '"thumbnailDisplayInterval": 30,';
      $output .= '"thumbnailBorderVertical": 0,';
      $output .= '"thumbnailBorderHorizontal": 0,';
      $output .= '"thumbnailLabel": {';
      $output .= '"display": false';
      $output .= '},';
      $output .= '"thumbnailHoverEffect2": "scale120",';
      $output .= '"thumbnailAlignment": "justified",';      
      $output .= '"gallerySorting" : "titleAsc"';      
      $output .= '}\'>';
  		$output .= '</div>';

			return $output;
		}		
}



?>
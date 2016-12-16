<?php  
class Controller
{
    function home()
    {
        return "This is the Home Page";
    }


    function travel($id)
    {
        return "This is detail for travel: ".$id;
    }
}

?>
<?php

class Ads extends ExtDB{
    
    function __construct(){
        parent::__construct("ads","Ads");
    }
    
    static function view_all($order='',$asc=''){ $obj=new self();   return $obj->select_all($order,$asc);  }
    
}


?>
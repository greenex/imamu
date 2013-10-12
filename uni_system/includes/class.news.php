<?php

class News extends ExtDB{
    
    function __construct(){
        parent::__construct("news","News");
    }
    
    static function view_all($order='',$asc=''){ $obj=new self();   return $obj->select_all($order,$asc);  }
    
}


?>
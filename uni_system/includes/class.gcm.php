<?php

class GCM extends ExtDB{
    
    function __construct(){
        parent::__construct("gcm_users","GCM");
    }
    
    static function view_all($order='',$asc=''){ $obj=new self();   return $obj->select_all($order,$asc);  }
    
}


?>

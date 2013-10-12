<?php
require_once("class.database.php");

class ExtDB {
    
    protected $attributes;
    protected $tbl;
    protected $class;
    protected $pk;
    protected $nulls;    


public function __construct($tbl,$class){
    
    
    $this->tbl=$tbl;
    $this->class=$class;
    $this->attributes=$this->load_attrib();
    $this->pk=$this->load_pk();
    $this->nulls=$this->load_nulls();
    
}
public function Add(){
    global $db;
     $sql="insert into `".$this->tbl."` (";
     $sql_vars="(";
     $vars=$this->attributes;
     
     foreach ($vars as $attribute => $value)
     {
        if (is_integer(array_search($attribute,$this->nulls)) && empty($value)){continue;}
      $sql.="`".$attribute."`,";
      $sql_vars.="'".$db->mysql_prep($value)."',";
     }
    
     $sql=substr($sql,0,strlen($sql)-1);
     $sql_vars=substr($sql_vars,0,strlen($sql_vars)-1);
     $sql.=") ";
     $sql_vars.=")";    
     $db->query($sql." values ".$sql_vars);
     if ($db->affected_rows()>0){
     return $db->insert_id();
     }else{return false;}
}


public function Update(){
    global $db;
        $sql="update `".$this->tbl."` set ";
	$vars=$this->attributes;
	foreach ($vars as $attribute => $value)
	{
	if (is_integer(array_search($attribute,$this->nulls)) && empty($value)){$sql.="`".$attribute."`=NULL,";}else{
	$sql.="`".$attribute."`='".$db->mysql_prep($value)."',";}
	}
	$sql=substr($sql,0,strlen($sql)-1);
	$sql.=" where `".$this->pk."`='".$this->attributes[$this->pk]."'";
	$db->query($sql);
        if ($db->affected_rows()>0){return true;}else{return false;}
}


public function Delete(){
    global $db;
        $db->query("delete from `".$this->tbl."` where `".$this->pk."`='".$this->attributes[$this->pk]."'");
	return $db->affected_rows()>0;
}


public function select_by_pk($pk=''){
    if (!empty($pk)){
    $array=$this->select_by_sql("select * from `".$this->tbl."` where `".$this->pk."`='".$pk."'");
    $obj=array_shift($array);
    //$this->attributes=$obj->attributes;
    return $obj;
    }
}

public function select_all($order="",$asc="ASC"){
    if (empty($order)){$order=$this->pk;}
    return $this->select_by_sql("select * from `".$this->tbl."` order by `".$order."` ".$asc);
}
public function view_all_paginated($offset=0,$limit=30,$order="",$asc="ASC"){
        if (empty($order)){$order=$this->pk;}
        return $this->select_by_sql("select * from `".$this->tbl."` order by `".$order."` ".$asc." limit ".$limit." offset ".$offset);
        }
public function select_by_field($field,$value='',$order="",$asc="ASC"){
    if (empty($order)){$order=$this->pk;}
    $sql="select * from `".$this->tbl."` where ";
    if (is_array($field)){
	$count=count($field);
	$counter=0;
	foreach ($field as $condition => $value){
	    $sql.="`".$condition."`='".$value."' ";
	    if ($counter!=$count-1){
		$counter++;
		$sql.=" and ";
	    }
	}
    }else{
    $sql.="`".$field."`='".$value."'";
    }
    $sql.=" order by `".$order."` ".$asc;
   
    return $this->select_by_sql($sql);
}

public function by_field_paginated($field,$value='',$offset=0,$limit=30){
    $sql="select * from `".$this->tbl."` where ";
    if (is_array($field)){
	$count=count($field);
	$counter=0;
	foreach ($field as $condition => $value){
	    $sql.="`".$condition."`='".$value."' ";
	    if ($counter!=$count-1){
		$counter++;
		$sql.=" and ";
	    }
	}
    }else{
    $sql.="`".$field."`='".$value."'";
    }
    if (!empty($limit)){$sql.=" limit ".$limit;}
    if (!empty($offset)){$sql.=" OFFSET ".$offset;}
    
    
    return $this->select_by_sql($sql);
}

public function get($attribute){
    return $this->attributes[$attribute];
}

public function set($attribute,$value){
    $this->attributes[$attribute]=$value;
}

private function load_attrib(){
    $array=array();
    $fields=$this->getfields();
    foreach($fields as $field){
        $array[$field['Field']]='';
    }
    return $array;
}

private function load_nulls(){
    $array=array();
    $fields=$this->getfields();
    foreach($fields as $field){
        if ($field['Null']=="YES"){
        $array[]=$field['Field'];    
        }
        
    }
    return $array;
}

private function load_pk(){
       $fields=$this->getfields();
    foreach($fields as $field){
        if ($field['Key']=="PRI"){
        return $field['Field'];    
        }
    }
}




private function getfields(){
    global $db;
    $nulls_array=array();
    
    $sql="show columns from `".$this->tbl."`";
    $data=$db->query($sql);
    if ($db->affected_rows()){
    while ($fetch=$db->fetch_array($data)){
    $nulls_array[]=$fetch;
    }
    
    }
    return $nulls_array;

}

protected  function  select_by_sql($sql){
    global $db;
    $array=array();
    $data=$db->query($sql);
    while ($fetch=$db->fetch_array($data)){
        $array[]=$this->Row2Object($fetch);
    }
    return $array;
}

protected  function Row2Object($row){
    if (!empty($row)){
        $obj = new $this->class;
        foreach($row as $attribute => $value){
	    if (array_key_exists($attribute,$this->attributes)){$obj->set($attribute,$value);}
        }
        return $obj;
    }
}

protected function query($sql){
    global $db;
    return $db->query($sql);
}
}

?>

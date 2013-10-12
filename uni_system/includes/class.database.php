<?php

class MysqlDB{
    private $connetion;
    private $last_query;
    public function __construct($host=HOST,$user=USER,$pass=PASS,$db=DB){
        $this->open_connetion($host,$user,$pass,$db);
    }
    public function open_connetion($host='localhost',$user='',$pass='',$db=''){
       $this->connetion=mysql_connect($host,$user,$pass)or die(mysql_error());
       mysql_select_db($db,$this->connetion)or die(mysql_error());
	    mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $this->connetion);
   
    }
    public function close_connection(){
        if (isset($this->connetion)){
            mysql_close($this->connetion);
            unset($this->connetion);
            
        }
    }
    public function query($sql){
        $this->last_query=$sql;
        $result=mysql_query($sql)or die(mysql_error());
        return $result;
    }
    public function mysql_prep($value)
    {
    
    return mysql_real_escape_string($value);
    }
    public function fetch_array($result){
        return mysql_fetch_array($result);
    }
    public function num_rows($result){
        return mysql_num_rows($result);
    }
    public function insert_id(){
        return mysql_insert_id();
    }
    public function affected_rows(){
        return mysql_affected_rows();
    }
}
global $db;
$db=new MysqlDB();

?>
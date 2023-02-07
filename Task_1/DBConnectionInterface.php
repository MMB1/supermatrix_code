<?php
define("DB_HOST", "localhost");
define("DB_NAME", "cms");
define("DB_USER", "root");
define("DB_PASS", "");

/**
 * This file for database connection 
 * For database connection interface is implemented
 * If in future new database need then we have to implement this method only
 * As per task instruction for now i am using mysql but in future need to switch other then i will impliment secound class without effect to first class
 */
interface DBConnectionInterface{
  public function dbconnection()
}

/**
 * Connection with Mysql database
 */
class MysqlConnect implements DBConnectionInterface{
  public $host   = DB_HOST;
  public $user   = DB_USER;
  public $pass   = DB_PASS;
  public $dbname = DB_NAME;
  
  public $link;
  public $error;

  public dbconnection(){
    $this->link = new mysqli($this->host, $this->user, $this->pass,
    $this->dbname);
    if(!$this->link){ // If found any error
      $this->error ="Connection fail".$this->link->connect_error;
      return false;
    }
  }
}
?>
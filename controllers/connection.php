<?php
require_once('./config/dbase_credential.php');

class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        self::$instance = new mysqli($DB_HOST,$DB_USERNAME, $DB_PASSWORD, $DB_DBNAME);
 
      if(self::$instance->connect_errno > 0){
          die('Unable to connect to database [' . self::$instance->connect_error . ']');
      }
      }
      return self::$instance;
    }
  }

?>
<?php

class DAO {
    
	protected $db;
	
 	public function __construct(){
        if (!$this->db)
        {
            $this->db = new mysqli('localhost', 'userLocal', 'Ua8smYv6GzqsNnsy', 'varderindecorner');
            if ($this->db->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $this->db->connect_errno . ") " . $this->db->connect_error ;
            }
            
            if(!$this->db->set_charset("utf8")) {
                printf("<hr>Error loading character set utf8 (Err. nº %d): %s\n<hr/>",  $this->mysqli->errno, $this->mysqli->error);
                exit();
            }
            
            ini_set('default_charset', 'UTF-8');
		}
        
        if (!$this->db) {
            echo "fail";
        }
    }

    public static function getDAO() {
        if (  !self::$db instanceof self) {
            self::$db = new self;
        }
        return self::$db;
    }

}
?>
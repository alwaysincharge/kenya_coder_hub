<?php  

class MySQLDatabase {
      
   private $dbhost = "localhost";
   private $dbuser = "root";
   private $dbpass = "";
   private $dbname = "kenyaapp";
   var $connection;


    
    
   public  function open_db() {
       
        return  $this->connection = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);  
       
   }
    
    
  
   public  function query($sql) { 
       
        return $result =  mysqli_query($this->connection, $sql); 
       
   }
    
    
    
   public function fetch($resultset) {
       
        return mysqli_fetch_assoc($resultset);    
       
   }

    
}


$database = new MySQLDatabase();

$database->open_db();





?>
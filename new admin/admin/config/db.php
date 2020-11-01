<?php
class Database{
 
    // specify your own database credentials
    private $host = "162.222.225.87";
    private $db_name = "haxologc_haxol";
    private $username = "haxolAdmin";
    private $password = "Click@100";
    public $conn;
	public $basePath="http://localhost/Hexol/new%20admin/";
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
		
    }
	//return $this->basePath;
}
?>

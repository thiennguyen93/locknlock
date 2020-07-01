<?php 
session_start();
class connectData{
    private $server;
    private $user;
    private $password;
    private $database;
    public  $conn;
    public  $result;
    function __construct($server, $user, $password, $database){
        $this->server = $server;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }
    public function setServer($server){
        $this->server = $server;
    }
    public function getServer(){
        return $this->server;
    }
    public function setUser($user){
        $this->user = $user;
    }
    public function getUser(){
        return $this->user;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setDatabase($database){
        $this->database = $database;
    }
    public function getDatabase(){
        return $this->database;
    }
    public function connect_database(){
        $this->conn = mysql_connect($this->server,$this->user,$this->password);
        if ($this->conn -> connect_error) {
            die("Connection failed: " . $this->conn -> connect_error);
        }
        else{
            if( !mysql_select_db($this->database, $this->conn)){
                die(mysql_errno($this->conn) . ": " . mysql_error($this->conn));
                return false;
            }else{
                mysql_query('SET NAMES "utf8"',$this->conn);
            }
        }
        
    }
    public function query($sql){
        $result = mysql_query($sql,$this->conn);
        $this -> result = $result;
        return $this->result;	
    }
    public function fetch_array(){
        return mysql_fetch_assoc($this->result);
    }
    public function result_array(){
        $arr = array();
		while ($row = mysql_fetch_assoc($this->result)) 
			$arr[] = $row;
		return $arr;
    }
}
$data = new connectData();
$data->setServer("localhost");
$data->setUser("root");
$data->setPassword("");
$data->setDatabase("dangky");
$data->connect_database();
?>
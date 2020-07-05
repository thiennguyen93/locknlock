<?php 
    class database{
        private $hostname;
        private $username;
        private $password;
        private $database;

        protected $connection;
        protected $result;

        function __construct()
        {
            $this->hostname = 'localhost';
            $this->username = 'root';
            $this->password = '123456';
            $this->database = 'locknlock';
            $this->connect();
        }

        private function connect(){
            if (!isset($this->connection)) {
                $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);
                $this->connection-> set_charset("utf8");
                if(!$this->connection){
                    echo  'kết nối thất bại';
                    exit;
                }
            }
            return $this->connection;
        } 

        //thực thi câu lệnh
        public function execute($sql){
            $this->result = $this->connection->query($sql);
            return $this->result;
        }

        //lấy dữ liệu
        public function getData(){
            if ($this->result) {
                $data = mysqli_fetch_array($this->result);
            }else{
                $data = 0;
            }
            return $data;
        }

        //lấy toàn bộ dữ liệu
        public function getAllData(){
            $data = [];
            if (!$this->result) {
                $data = 0;
            }else{
                while ($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        //thêm dữ liệu
        // public function insertData($Firstname, $Lastname, $Email){
        // 	$sql = "INSERT INTO user(Firstname, Lastname, Email) VALUES (null, '$Firstname', '$Lastname', '$Email')";
        // 	return $this->execute($sql);
        // }

        // //updata database
        // public function updateData($ID, $Firstname, $Lastname, $Email){
        // 	$sql = "UPDATE user SET Firstname = '$Firstname', Lastname='$Lastname', Email = '$Email' WHERE ID = '$ID'";
        // 	return $this->execute($sql);
        // }

        // //delete data
        // public function deleteData($ID){
        // 	$sql = "DELETE FROM user WHERE ID='$ID'";
        // 	return $this->execute($sql);
        // }
    }
        

 ?>
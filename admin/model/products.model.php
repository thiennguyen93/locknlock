<?php 
class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getProducts($page=1,$itemsPerPage=5) {
        $offset = $page - 1;    //Lấy từ sau dòng
        $sql = 'SELECT * FROM PRODUCTS P LIMIT '.$offset.','.$itemsPerPage;
        $this->db->execute($sql);
        $result = $this->db->getAllData();
        return $result;
    }  
}
?>
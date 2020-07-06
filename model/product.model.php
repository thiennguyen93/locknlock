<?php 
class productHome {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getCategoryFrontPage() {
        $sql = `SELECT *
                FROM CATEGORIES C
                WHERE C.isFrontPage = 'Y'`;
        $this->db->execute($sql);
        return $this->db->getAllData();
    }

    public function getProductById($producId = 1) {
        
        $this->db->execute('select * from sanpham where id="'.$producId.'"');
        return $this->db->getData();
    }

    public function getAll() {
        $this->db->execute('select * from sanpham');
        return $this->db->getAllData();
    }
}

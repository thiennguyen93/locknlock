<?php 
class sanpham_chitiet {
    private $db;
    function __construct()
    {
        $this->db = new database();
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

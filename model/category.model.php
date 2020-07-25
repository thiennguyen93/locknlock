<?php 

class category {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getAllCategories() {
        $sql = 'select * from categories C where C.status=1';
        $this->db->execute($sql);
        return $this->db->getAllData();
    }

    
    
}

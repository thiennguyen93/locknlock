<?php 
class productHome {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getCategoryFrontPage() {
        $sql = 'SELECT * FROM CATEGORIES C WHERE C.isFrontPage = \'Y\'';
        $this->db->execute($sql);
        return $this->db->getAllData();
    }

    public function getProductInCategory($CatId) {
        $sql = 'SELECT * FROM products P WHERE P.categoryID IN (SELECT id FROM categories C1 WHERE C1.id = '.$CatId.' OR C1.parentId='.$CatId.') LIMIT 6';
        var_dump($sql);
        $this->db->execute($sql);
        return $this->db->getAllData();
    }


}

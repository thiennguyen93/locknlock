<?php 
class default_model {
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
        $this->db->execute($sql);
        return $this->db->getAllData();
    }

    public function getProductInfo($productId) {
        $sql = 'SELECT * FROM products P INNER JOIN posts A ON P.postId = A.id WHERE P.ID='.$productId.' LIMIT 1';
        $this->db->execute($sql);
        return $this->db->getData();
    }




}

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

    public function getProductsByCategoryId($id) {
        $sql = 'SELECT P.id, P.name, P.description, P.price, P.thumbnail_url, P.categoryID, C.name AS categoryName, C.parentId AS parentCategoryId FROM PRODUCTS P INNER JOIN CATEGORIES C ON P.categoryID = C.id WHERE C.id='.$id;
        $this->db->execute($sql);
        return $this->db->getAllData();
    }

    
    
}

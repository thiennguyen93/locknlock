<?php 

class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getAllOrdersByUserID($userId) {
        //Lấy tất cả các đƠn hàng của một người dùng
        $sql = 'SELECT * FROM orders A INNER JOIN users B ON A.user_id = B.id WHERE B.id=\''.$userId.'\'';
        $this->db->execute($sql);
        return $this->db->getAllData();
    }

    public function getProductsByCategoryId($id) {
        $sql = 'SELECT P.id, P.name, P.description, P.price, P.thumbnail_url, P.categoryID, C.name AS categoryName, C.parentId AS parentCategoryId FROM PRODUCTS P INNER JOIN CATEGORIES C ON P.categoryID = C.id WHERE C.id='.$id;
        $this->db->execute($sql);
        return $this->db->getAllData();
    }

    
    
}

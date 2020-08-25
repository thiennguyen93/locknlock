<?php 

class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getAllOrdersByUserID($userId) {
        //Lấy tất cả các đƠn hàng của một người dùng
        $sql = 'SELECT a.id, a.order_code, a.date_created, CASE WHEN a.payment_status=0 THEN \'Đã thanh toán\' ELSE \'Chưa thanh toán\' END AS tinhtrangthanhtoan  , A.delivery_status, B.username, count(c.product_id), SUM(c.product_price * c.product_quantity) AS tonggiatri FROM (orders A INNER JOIN users B ON A.user_id = B.id) right JOIN order_detail c ON c.order_id = A.id WHERE B.id=\''.$userId.'\' GROUP BY a.id';
        $this->db->execute($sql);
        return $this->db->getAllData();
    }

    public function getProductsByCategoryId($id) {
        $sql = 'SELECT P.id, P.name, P.description, P.price, P.thumbnail_url, P.categoryID, C.name AS categoryName, C.parentId AS parentCategoryId FROM PRODUCTS P INNER JOIN CATEGORIES C ON P.categoryID = C.id WHERE C.id='.$id;
        $this->db->execute($sql);
        return $this->db->getAllData();
    }

    
    
}

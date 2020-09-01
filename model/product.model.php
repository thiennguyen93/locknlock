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
        $sql = 'SELECT *, P.ID AS pID FROM products P LEFT JOIN posts A ON P.postId = A.id WHERE P.ID='.$productId.' LIMIT 1';
        $this->db->execute($sql);
        return $this->db->getData();
    }

    public function getProducts($page=1, $categoryId = '',$productName='',$itemsPerPage=3) {
        $offset = $page - 1;    //Lấy từ sau dòng
        $whereClause = ' WHERE '. (!empty($categoryId)?'P.categoryId='.(int)$categoryId:'1=1');
        $whereClause .= ' AND '. ($productName!=''?'P.name LIKE \'%'.$productName.'%\'':'2=2');
        $sql = 'SELECT P.id, P.name, p.price, c.name as catName, p.description, p.thumbnail_url, p.categoryId FROM PRODUCTS P INNER JOIN CATEGORIES C ON P.categoryID = C.id' . $whereClause;
        $sql .= ' LIMIT '.$offset.','.$itemsPerPage;
        $this->db->execute($sql);
        $result = $this->db->getAllData();  //Lấy sản phẩm thoả điều kiện
        //Lấy tổng số sản phẩm
        
        $sql_count = 'SELECT count(P.id) as ketqua FROM PRODUCTS P INNER JOIN CATEGORIES C ON P.categoryID = C.id' . $whereClause;
        $this->db->execute($sql_count);
        $totalProducts = $this->db->getData();
        $totalProducts = $totalProducts['ketqua'];
        $totalPages = ceil($totalProducts/$itemsPerPage);
        $data = [
            'products' => $result,
            'totalProducts' => $totalProducts,
            'totalPages' => $totalPages,
            'page' => $page
        ];
        
        return $data;
    }  




}

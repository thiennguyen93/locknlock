<?php 
class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
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

    public function getProductPostById ($postId) {
        $data = null;
        $sql = 'SELECT * FROM POSTS P WHERE P.id = '.$postId;
        $sql .= ' LIMIT 1';
        $this->db->execute($sql);
        $result = $this->db->getData();  //Lấy sản phẩm thoả điều kiện
        if ($result==0) {
            return null;
        }
        return $result;
    }

    public function getProductById ($id) {
        $data = null;
        $whereClause = ' WHERE p.id ='.$id;
        $sql = 'SELECT P.id, P.name, p.price, c.name as catName, p.description, p.thumbnail_url, p.categoryId, p.postId FROM PRODUCTS P INNER JOIN CATEGORIES C ON P.categoryID = C.id' . $whereClause;
        $sql .= ' LIMIT 1;';
        $this->db->execute($sql);
        $result = $this->db->getData();  //Lấy sản phẩm thoả điều kiện
        if ($result==0) {
            return null;
        }
        return $result;
    }
}
?>
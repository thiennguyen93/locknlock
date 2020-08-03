<?php 
class global_default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getNumberCategory() {
        $sql = 'SELECT COUNT(id) as ketqua FROM CATEGORIES C WHERE C.status=1';
        $this->db->execute($sql);
        $result = $this->db->getData();
        return $result['ketqua'];
    }
    // getNumberOfProducts
    public function getNumberOfProducts() {
        $sql = 'SELECT COUNT(id) as ketqua FROM PRODUCTS P';
        $this->db->execute($sql);
        $result = $this->db->getData();
        return $result['ketqua'];
    }  

    public function getNumberOfPosts() {
        $sql = 'SELECT COUNT(id) as ketqua FROM POSTS P';
        $this->db->execute($sql);
        $result = $this->db->getData();
        return $result['ketqua'];
    }  

}
?>
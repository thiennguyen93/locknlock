<?php 
class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getPostById($id) {
        $sql = 'SELECT * FROM posts A WHERE A.id=' . $id . ' LIMIT 1';
        $this->db->execute($sql);
        return $this->db->getData();
    }
}

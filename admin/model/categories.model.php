<?php 
class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getAllCategories() {
        $sql = <<<'EOT'
SELECT *
FROM CATEGORIES
EOT;
        var_dump($sql);
        $this->db->execute($sql);
        $result = $this->db->getAllData();
        return $result;
    }
}
?>
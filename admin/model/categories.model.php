<?php 
class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getAllCategories() {
        $sql = <<<EOD
        WITH RECURSIVE cte AS
        (
        SELECT id, CAST(name AS CHAR(200)) AS name,
                CAST(id AS CHAR(200)) AS path,
                0 as depth
        FROM categories WHERE parentId IS NULL
        UNION ALL
        SELECT c.id,
                CONCAT(REPEAT('-----', cte.depth+1), c.name), # indentation
                CONCAT(cte.path, ",", c.id),
                cte.depth+1
        FROM categories c JOIN cte ON
        cte.id=c.parentId
        )
        SELECT * FROM cte ORDER BY path;
        EOD;

        var_dump($sql);
        $this->db->execute($sql);
        $result = $this->db->getData();
        return (int) $result['ketqua'];
    }
}

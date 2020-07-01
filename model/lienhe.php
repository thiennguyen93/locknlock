<?php 
class lienhe {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function insert($data) {
        $data = array_map(function($item) {
            return addslashes($item);
        }, $data);

        $this->db->execute('INSERT INTO `lienhe` (`email`, `ten`, `noidung`)
        VALUES ("'.$data['email'].'", "'.$data['ten'].'", "'.$data['noidung'].'")');
    }
}

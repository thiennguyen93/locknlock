<?php 
class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function checkUsernameAvailable($username) {
        $username = addslashes($username);
        $sql = 'SELECT COUNT(id) AS ketqua FROM users U WHERE U.username = \''.$username.'\' LIMIT 1';
        $this->db->execute($sql);
        $result = $this->db->getData();
        return (int) $result['ketqua'];
    }

}

<?php 
class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function checkUserNameExists($username) {
        $username = addslashes($username);
        $sql = 'SELECT COUNT(id) AS ketqua FROM users U WHERE U.username = \''.$username.'\' LIMIT 1';
        $this->db->execute($sql);
        $result = $this->db->getData();
        return (int) $result['ketqua'];
    }

    public function insertNewAccount($account) {
        if (checkUserNameExists($account['username'])) {
            return false;
        } else {
            $sql = 'INSERT INTO users (username, hoten, email, password, roleid) VALUES (\''.$account['username'].'\',\''.$account['fullname'].'\',\''.$account['email'].'\',\''.$account['password'].'\',2)';
        }
    }










}

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

    public function checkEmailAvailable($email) {
        $username = addslashes($email);
        $sql = 'SELECT COUNT(id) AS ketqua FROM users U WHERE U.email = \''.$email.'\' LIMIT 1';
        $this->db->execute($sql);
        $result = $this->db->getData();
        return (int) $result['ketqua'];
    }

}

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
        if (self::checkUserNameExists($account['username'])) {
            return false;
        } else {
            $sql = 'INSERT INTO users (username, hoten, email, password, roleid) VALUES (\''.$account['username'].'\',\''.$account['fullname'].'\',\''.$account['email'].'\',\''.$account['password'].'\',2)';
            $this->db->execute($sql);
            return true;
        }
    }

    public function getUserInfo($username) {
        $sql = 'SELECT A.id,A.username,A.hoten,A.email,B.name AS \'chucvu\',B.adminPage AS \'adminPage\' FROM users A LEFT JOIN role B ON A.roleId=B.id WHERE A.username = \''.$username.'\' LIMIT 1';
        //Lấy thông tin người dùng
        $this->db->execute($sql);
        return $this->db->getData();
    }





}

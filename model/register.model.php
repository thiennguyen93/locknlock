<?php 
class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function checkLoginInfo($username, $password) {
        $username = addslashes($username);
        $password = addslashes($password);

        $sql = 'SELECT COUNT(id) AS ketqua FROM users U WHERE U.username = \''.$username.'\' AND U.password=\''.$password.'\' LIMIT 1';
        $this->db->execute($sql);
        $result = $this->db->getData();
        return (int) $result['ketqua'];
    }

    public function getUserInfo($username) {
        $sql = 'SELECT A.id,A.username,A.hoten,A.email,B.name AS \'chucvu\',B.adminPage AS \'adminPage\' FROM users A LEFT JOIN role B ON A.roleId=B.id WHERE A.username = \''.$username.'\' LIMIT 1';
        //Lấy thông tin người dùng
        $this->db->execute($sql);
        return $this->db->getData();
    }









}

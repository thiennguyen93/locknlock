<?php 

class master_data_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getMasterData($group, $code='') {
        //Lấy tất cả các đƠn hàng của một người dùng
        $whereCode = $code != ''?" AND TRIM(UPPER(A.code))='$code'":'';
        $sql = "SELECT * FROM MASTER_DATA A WHERE TRIM(UPPER(A.group))='$group'".$whereCode;
        $this->db->execute($sql);
        return $this->db->getAllData();
    } 
}

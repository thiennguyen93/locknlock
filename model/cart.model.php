<?php 

class cart_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    function checkProductExit($id) {
        $sql = 'SELECT count(P.id) as ketqua FROM PRODUCTS P where P.id = ' . $id . ' LIMIT 1';
        
        $this->db->execute($sql);
        $ketqua=$this->db->getData();
        if ((int)$ketqua['ketqua'] > 0) {
            return true;
        }
    }

    function sum_cart(){
        $sum = 0;
        if (!isset($_SESSION['cart'])) return 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            $sum += ($value['quantity']*$value['price']);
        }
        return $sum;
    }

    function addCartSession($id, $quantity=1) {
        //Lấy thông tin sản phẩm 
        if (self::checkProductExit($id)) {
            //Nếu sản phẩm tồn tại 
            $sql = 'SELECT * FROM PRODUCTS P where P.id = ' . $id . ' LIMIT 1';
            $this->db->execute($sql);
            $item =$this->db->getData();
            if (isset($_SESSION['cart'][$id])) {
                //Nếu sản phẩm đã tồn tại trong giỏ hàng thì cập nhật lại số lượng sản phẩm
                $_SESSION['cart'][''.$id]['quantity'] += $quantity;
            } else {
                //Nếu sản phẩm chưa có trong giỏ hàng thì thêm sản phẩm vào giỏ hàng
                $_SESSION['cart'][$id] = $item;
                $_SESSION['cart'][$id]['quantity'] = $quantity;
            }
            return true;
        } 
        return false;
    }

    function getCartSession() {
        if (isset($_SESSION['cart'])){
            $result = $_SESSION['cart'];
        } else {
            $result = null;
        }
        return $result;
    }
    
}

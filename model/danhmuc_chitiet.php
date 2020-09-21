<?php 
class danhmuc_chitiet {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getAll() {
        $this->db->execute('select * from sanpham');
        return $this->db->getAllData();
    }

    public function totalData($cat1_id = '', $cat2_id = '') {
        $where = '';
        if ($cat1_id) {
            $where  = 'where id_danhmuc1 = "' . $cat1_id . '"';
            if ($cat2_id) {
                $where =  $where . ' and id_danhmuc2 = "' . $cat2_id . '"';
            }
        }
        $this->db->execute('select count(id) as total from sanpham ' . $where);
        return $this->db->getData();
    }

    public function page($pageNum = 1, $item = 1, $cat1_id = '', $cat2_id = '') {
        $item = $item < 1 ? 1 : $item;
        if ($pageNum < 1) {
            $pageNum = 1;
        }
        $start = ($pageNum - 1) * $item;
        
        $where  = '';

        if ($cat1_id) {
            $where  = 'where id_danhmuc1 = "' . $cat1_id . '"';
            if ($cat2_id) {
                $where =  $where . ' and id_danhmuc2 = "' . $cat2_id . '"';
            }
        }
        
        $this->db->execute('select * from sanpham '.$where.' limit '.$start .','.$item);
        return $this->db->getAllData();
    }


    public function getCategoryName($cat1_id='', $cat2_id='') {
        $result = 'Sản phẩm đang bán';
        $tendanhmuc1 = '';
        $tendanhmuc2 = '';

        if ($cat1_id) {
            $where  = 'where id = "' . $cat1_id . '"';
            $this->db->execute('select ten from danhmuc1 '. $where);
            $tendanhmuc1 = $this->db->getData();
            $result = $tendanhmuc1['ten'];
        }

        if ($cat2_id) {
            $where =  'where id = "' . $cat2_id . '" and id_danhmuc1="' . $cat1_id . '"';
            $this->db->execute('select ten from danhmuc2 '. $where);
            // var_dump('select ten from danhmuc2 '. $where);
            $tendanhmuc2 = $this->db->getData();
            $result =  $result . " > <span style='color: red'>" . $tendanhmuc2['ten'] . "</span>";
        }


        return $result;

    }

    public function getProductByCatId($cat1_id='', $cat2_id='') {
        $where  = '';
        if ($cat1_id) {
            $where  = 'where id_danhmuc1 = "' . $cat1_id . '"';
            if ($cat2_id) {
                $where =  $where . ' and id_danhmuc2 = "' . $cat2_id . '"';
            }
        }

        $this->db->execute('select * from sanpham '. $where);
        return $this->db->getAllData();
    }
}

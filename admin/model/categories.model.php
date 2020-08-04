<?php 
class category_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getAllCategories() {
        $sql = 'SELECT * FROM CATEGORIES C WHERE C.status=1';
        $this->db->execute($sql);
        $result = $this->db->getAllData();
        
        $allParentNode = array_filter($result, function ($item) {
            return $item['parentId'] == null;
        });
    
        // var_dump($allParentNode);
        $resultArray = [];
        foreach ($allParentNode as $key => $value) {
            $dept = 0;
            $this->getChild($value, $result, $resultArray, $dept);
        }
        return $resultArray;
    }

    public function getCategory($id) {
        $sql = 'SELECT * FROM CATEGORIES C WHERE C.status=1 AND c.id='.$id;
        $this->db->execute($sql);
        $result = $this->db->getData();
        return $result;
    }

    function getChild($cat, $categoryList, &$array3, &$dept)
    {
        $cat['dept'] = $dept;
        $array3[] = $cat;
        $childCat = array_filter($categoryList, function ($item) use ($cat) {
            return $item['parentId'] == $cat['id'];
        });
        if (count($childCat) > 0) {
            $dept++;
            foreach ($childCat as $key => $value) {
            $this->getChild($value, $categoryList, $array3, $dept);
            }   
        } else {
            $dept=1;
        }
    }

    function checkCategoryById($id) {
        $sql = 'SELECT COUNT(id) AS ketqua FROM CATEGORIES C where C.id='. $id.' AND C.STATUS=1';
        $this->db->execute($sql);
        $sqlresult = $this->db->getData();
        if ($sqlresult) {
            return $sqlresult['ketqua']>0?true:false;
        } 
        return false;
    }

    function saveCatgory ($categoryData) {
        //UPLOAD HÌNH ẢNH 
        $uploadedPhoto = $this->updateProductPhoto($categoryData['id']);

        if ($uploadedPhoto) {
            $sql_update_photo = ' ,P.thumbnail_url=\''.$uploadedPhoto.'\'';
        } else {
            $sql_update_photo = '';
        }


        //Kiểm tra sự tồn tại của danh mục 
        $categoryExist = $this->checkCategoryById($categoryData['id']);
        if (!$categoryExist) {
            //Nếu danh mục không tồn tại thi INSERT
            $sql = 'INSERT INTO CATEGORIES (name) VALUES (\''.$categoryData['name'].'\')';
            var_dump($sql);
        }




    }

    public function updateCategoryPhoto($id) {
        $target_dir    = "../img/categories/";
        $maxfilesize   = 800000; //(bytes)
        $allowUpload = false;

        if ($_FILES['photo']['size'] > 0 && $_FILES['photo']['size'] < $maxfilesize )  {
            $allowUpload = true;
        }

        if ($_FILES['photo']['type'] == 'image/png' || $_FILES['photo']['type'] == "image/jpeg" || $_FILES['photo']['type'] == "image/gif" ) {
            $allowUpload = true;
        }

        $ext = '.'.pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $target_fileName = 'product_photo_'.date('Y-m-d_H-i-s-U').$ext;
        
        $target_file = $target_dir.$target_fileName;
       

        if ($allowUpload) {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file))
            {
                return $target_fileName;
            }
        }

        return false;      

    }
   

}
?>
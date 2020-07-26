<?php 
class default_model {
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
   

}
?>
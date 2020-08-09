<?php 
class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getProducts($page=1, $productId='', $categoryId = '',$productName='',$itemsPerPage=3) {
        $offset = ($page - 1)*$itemsPerPage;    //Lấy từ sau dòng       
        $whereClause = ' WHERE '. (!empty($categoryId)?'P.categoryId='.(int)$categoryId:'1=1');
        $whereClause .= ' AND '. (!empty($productId)?'P.id='.(int)$productId:'2=2');
        $whereClause .= ' AND '. ($productName!=''?'P.name LIKE \'%'.$productName.'%\'':'3=3');
        $sql = 'SELECT P.id, P.name, p.price, c.name as catName, p.description, p.thumbnail_url, p.categoryId, p.created FROM PRODUCTS P INNER JOIN CATEGORIES C ON P.categoryID = C.id' . $whereClause;
        $sql .= ' ORDER BY P.created DESC LIMIT '.$offset.','.$itemsPerPage;
        $this->db->execute($sql);
        $result = $this->db->getAllData();  //Lấy sản phẩm thoả điều kiện
        //Lấy tổng số sản phẩm
        $sql_count = 'SELECT count(P.id) as ketqua FROM PRODUCTS P INNER JOIN CATEGORIES C ON P.categoryID = C.id' . $whereClause;
        
        
        $this->db->execute($sql_count);
        $totalProducts = $this->db->getData();
        $totalProducts = $totalProducts['ketqua'];
        $totalPages = ceil($totalProducts/$itemsPerPage);
        $data = [
            'products' => $result,
            'totalProducts' => $totalProducts,
            'totalPages' => $totalPages,
            'page' => $page
        ];
        
        return $data;
    }  

    public function getProductPostById ($postId) {
        $data = null;
        $sql = 'SELECT * FROM POSTS P WHERE P.id = '.$postId;
        $sql .= ' LIMIT 1';
        $this->db->execute($sql);
        $result = $this->db->getData();  //Lấy sản phẩm thoả điều kiện
        if ($result==0) {
            return null;
        }
        return $result;
    }

    public function checkProductExitsById($id) {
        $sql = 'SELECT * FROM PRODUCTS P WHERE P.id = '.$id;
        $sql .= ' LIMIT 1';
        $this->db->execute($sql);
        $result = $this->db->getData();  //Lấy sản phẩm thoả điều kiện
        if ($result==0) {
            return false;
        }
        return true;
    }

    public function savePostByProductId($productId, $postContent, $postTitle='Bài viết chưa đặt tên') {
        $sql = 'SELECT b.id, a.name FROM PRODUCTS A INNER JOIN POSTS B ON A.postId = B.id WHERE A.id=' .$productId ;
        $sql .= ' LIMIT 1';
        $this->db->execute($sql);
        $ret  = $this->db->getData();
        $authorName = $_SESSION['user_info']['hoten'];
        $authorId = $_SESSION['user_info']['id'];
        $title =  $postTitle;
        $lastId = null;
        if ($ret) {
            //Nếu sản phẩm có bài viết
            //Lưu bài viết đó
            $postId = $ret['id'];
            $sql = "UPDATE POSTS P SET P.title='$title', P.content = '$postContent', P.authorName='$authorName', P.authorId='$authorId' WHERE P.id=".$postId;
            $sql .= ' LIMIT 1';
            $this->db->execute($sql);
            $lastId = null;
        } else {
            //Nếu sản phẩm chưa có bài viết
            //INSERT bài viết mới
            $sql = "INSERT INTO POSTS (title, authorId, authorName, content) VALUES ('$title', '$authorId', '$authorName', '$postContent')";
            $sql .= ' LIMIT 1';
            $this->db->execute($sql);
            $lastId = $this->db->getInsertId();

        }

        return $lastId;
    }

    public function updateProductPhoto($id) {
        $target_dir    = "../img/products/";
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

    public function saveProduct($productData) {        

        $uploadedPhoto = $this->updateProductPhoto($productData['id']);

        if ($uploadedPhoto) {
            $sql_update_photo = ' ,P.thumbnail_url=\''.$uploadedPhoto.'\'';
        } else {
            $sql_update_photo = '';
        }

        
        

        // var_dump($this->checkProductExitsById($productData['id']));
        // exit();
        
        
        if ($this->checkProductExitsById($productData['id'])==false) {
           
            //Nếu sản phẩm chưa tồn tại
            $sql = 'INSERT INTO PRODUCTS (name) VALUES (\''.$productData['name'].'\')';
            $this->db->execute($sql);
            $productData['id']= $this->db->getInsertId();
        } 


        $lastPostId=null;
            if ($productData['postContent'] != '') {
                //Nếu sản phẩm đã có Post rồi thì update lại post đ
                $lastPostId = $this->savePostByProductId($productData['id'], $productData['postContent'], $productData['name']);
            } 

          //Nếu sản phẩm tồn tại UPDATE
            // $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
            //Update Bài viết trước
            //Nếu người dùng có thêm bài viết
            

            if ($lastPostId) {
                //Câu lệnh update sản phẩm có update set postId vì bài viêt được thêm mới
                $sql = 'UPDATE PRODUCTS P SET P.name = \''.$productData['name'].'\', P.description=\''.$productData['description'].'\', P.price='.$productData['price'].', P.postId='.$lastPostId.', P.categoryId='.$productData['categoryId'].$sql_update_photo.' WHERE P.id='.$productData['id'];
                
            } else {
                //Câu lệnh update sản phẩm đã có sẵn bài viết, không cần update lại cột postId
                $sql = 'UPDATE PRODUCTS P SET P.name = \''.$productData['name'].'\', P.description=\''.$productData['description'].'\', P.price='.$productData['price'].', P.categoryId='.$productData['categoryId'].$sql_update_photo.' WHERE P.id='.$productData['id'];
            }

        //    var_dump($sql);
            $sql .= ' LIMIT 1';                
            $this->db->execute($sql);
            //Sau khi update bài viết thì update sản phẩm

            // $sql = "UPDATE PRODUCTS P SET p.name=";


        return true;
    }

    public function getProductById ($id) {
        $data = null;
        $whereClause = ' WHERE p.id ='.$id;
        $sql = 'SELECT P.id, P.name, p.price, c.name as catName, p.description, p.thumbnail_url, p.categoryId, p.postId FROM PRODUCTS P INNER JOIN CATEGORIES C ON P.categoryID = C.id' . $whereClause;
        $sql .= ' LIMIT 1;';
        $this->db->execute($sql);
        $result = $this->db->getData();  //Lấy sản phẩm thoả điều kiện
        if ($result==0) {
            return null;
        }
        return $result;
    }

    public function deleteProductById($id) {    
        $sql = 'DELETE FROM PRODUCTS WHERE id='.$id;
        $sql .= ' LIMIT 1';
        $result = $this->db->execute($sql);
        return $result;
    }
}
?>
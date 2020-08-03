<?php 
class default_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    public function getAllAuthors() {
        $sql = 'SELECT * FROM USERS C';
        $this->db->execute($sql);
        $result = $this->db->getAllData();
        return $result;
    }
    public function getPosts($page=1, $postId='', $authorId = '',$postTitle='',$itemsPerPage=3) {
        $offset = ($page - 1)*$itemsPerPage;    //Lấy từ sau dòng       
        $whereClause = ' WHERE '. (!empty($authorId)?'P.authorId='.(int)$authorId:'1=1');
        $whereClause .= ' AND '. (!empty($postId)?'P.id='.(int)$postId:'2=2');
        $whereClause .= ' AND '. ($postTitle!=''?'P.title LIKE \'%'.$postTitle.'%\'':'3=3');
        $sql = 'SELECT P.id, P.title, p.authorId, P.description, c.hoten as authorName, c.username, c.email FROM POSTS P INNER JOIN USERS C ON P.authorId = C.id' . $whereClause;
        $sql .= ' LIMIT '.$offset.','.$itemsPerPage;
        $this->db->execute($sql);
        $result = $this->db->getAllData();  //Lấy sản phẩm thoả điều kiện
        //Lấy tổng số sản phẩm
        $sql_count = 'SELECT count(P.id) as ketqua FROM POSTS P INNER JOIN USERS C ON P.authorId = C.id' . $whereClause;
        
        $this->db->execute($sql_count);
        $totalPosts = $this->db->getData();
        $totalPosts = $totalPosts['ketqua'];
        $totalPages = ceil($totalPosts/$itemsPerPage);
        $data = [
            'posts' => $result,
            'totalPosts' => $totalPosts,
            'totalPages' => $totalPages,
            'page' => $page
        ];
        
        return $data;
    }  


    public function checkPostExitsById($id) {
        $sql = 'SELECT * FROM POSTS P WHERE P.id = '.$id;
        $sql .= ' LIMIT 1';
        $this->db->execute($sql);
        $result = $this->db->getData();  //Lấy sản phẩm thoả điều kiện
        if ($result==0) {
            return false;
        }
        return true;
    }

  

 
    public function savePost($postData) {    
        if ($this->checkPostExitsById($postData['id'])==false) {
           //INSERT
            //Nếu sản phẩm chưa tồn tại
            $sql ='INSERT INTO POSTS (`title`, `authorId`, `authorName`, `content`, `description`) VALUES (\''.$postData['title'].'\', '.$postData['authorId'].', \''.$postData['authorName'].'\', \''.$postData['content'].'\',\''.$postData['description'].'\')';

            // $this->db->execute($sql);
            // $productData['id']= $this->db->getInsertId();
        }  else {
            //Update
            $sql = 'UPDATE POSTS SET title=\''.$postData['title'].'\', authorId='.$postData['authorId'].', authorName=\''.$postData['authorName'].'\', content=\''.$postData['content'].'\', description=\''.$postData['description'].'\' WHERE id='.$postData['id'];
        }

        $sql .= ' LIMIT 1';
        $result = $this->db->execute($sql);
        return $result;
    }

    public function getPostById ($id) {
        $data = null;
        $whereClause = ' WHERE p.id ='.$id;
        $sql = 'SELECT P.id, P.title, p.authorId, P.description, P.content, c.hoten as authorName, c.username, c.email FROM POSTS P INNER JOIN USERS C ON P.authorId = C.id' . $whereClause;
        $sql .= ' LIMIT 1;';
        $this->db->execute($sql);
        $result = $this->db->getData();  //Lấy sản phẩm thoả điều kiện
        if ($result==0) {
            return null;
        }
        return $result;
    }

    public function deletePostById($id) {
        $sql = 'DELETE FROM POSTS WHERE id='.$id;
        $sql .= ' LIMIT 1';
        $result = $this->db->execute($sql);
        return $result;
    }
}
?>
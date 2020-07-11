<?php
include './model/post.model.php';
class controller
{
    public function default(){
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $sqlResult = null;
        $data = ["view"=>"404error"];

        if ($id != null) {
            $model = new default_model();
            $sqlResult = $model->getPostById($id);
        }

        if ($sqlResult != null) {
            $data = [
                "view" => "post",
                "post" => $sqlResult
            ];
        }

        return $data;    
    }
}

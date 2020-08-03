<?php
include './model/global.model.php';
class globalController {
    public function getGlobalInfo() {
        $model = new global_default_model();
        $numberOfCategories = $model->getNumberCategory();
        $numberOfProducts = $model->getNumberOfProducts();
        $numberOfPosts = $model->getNumberOfPosts();
        $info = [
            'numberOfCategories'=>$numberOfCategories,
            'numberOfProducts'=>$numberOfProducts,
            'numberOfPosts'=>$numberOfPosts
        ];
        return $info;
    }
}
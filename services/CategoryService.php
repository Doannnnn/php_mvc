<?php

require_once "../models/Category.php";

class CategoryService extends Category {

    // Xử lý lấy tất cả Category
    public function handleGetAllCategory() {
        return $this->getAllCategory();
        
    }
    
}

?>
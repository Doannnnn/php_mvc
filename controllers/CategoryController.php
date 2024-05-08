<?php 

require_once "../services/CategoryService.php";

class CategoryController extends CategoryService {

    // Xử lý yêu cầu Category
    public function handleCategoryRequest(){
        try {
            $categories = $this->handleGetAllCategory();

            if (!empty($categories)) {
                return $categories;
            } else {
                throw new Exception("Category not found");
            }
            
        } catch (Exception $e) {
            return $e->getMessage("Error get all category");
        }
    }

}

?>

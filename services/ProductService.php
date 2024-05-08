<?php

require_once "../models/product.php";

class ProductService extends Product {

    // Xử lý lấy danh sách Product
    public function handleGetAllProduct() {
        return $this->getAllProduct();
        
    }
    
}

?>

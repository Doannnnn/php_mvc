<?php

require_once "../models/Brand.php";

class BrandService extends Brand {

    // Xử lý lấy tất cả Brand
    public function handleGetAllBrand() {
        return $this->getAllBrand();
        
    }
    
}

?>
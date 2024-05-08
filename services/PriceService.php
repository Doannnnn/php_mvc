<?php

require_once "../models/Price.php";

class PriceService extends Price {

    // Xử lý lấy tất cả Price
    public function handleGetAllPrice() {
        return $this->getAllPrice();
        
    }
    
}

?>
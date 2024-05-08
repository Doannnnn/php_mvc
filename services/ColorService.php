<?php

require_once "../models/Color.php";

class ColorService extends Color {

    // Xử lý lấy tất cả Color
    public function handleGetAllColor() {
        return $this->getAllColor();
        
    }
    
}

?>
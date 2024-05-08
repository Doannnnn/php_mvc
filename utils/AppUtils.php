<?php

class AppUtils
{
    // Hàm làm sạch dữ liệu đầu vào
    public static function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
}

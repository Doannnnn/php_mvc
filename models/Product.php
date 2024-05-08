<?php 

require_once "../config/DB.php";

class Product extends DB {
    
    // Lấy danh sách Product filter
    public function getAllProduct() {
        $query = "SELECT p.*, c.name AS category, b.name AS brand, cl.name AS color, i.url AS img
                  FROM products p
                  LEFT JOIN categories c ON p.id_category = c.id
                  LEFT JOIN brands b ON p.id_brand = b.id
                  LEFT JOIN colors cl ON p.id_color = cl.id
                  LEFT JOIN images i ON p.id_image = i.id";
        
        $statement = $this->con->prepare($query);
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    }

}


?>
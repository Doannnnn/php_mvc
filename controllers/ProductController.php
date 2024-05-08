<?php 

require_once "../services/ProductService.php";

class ProductController extends ProductService {

    // Xử lý yêu cầu Product
    public function handleProductRequest(){
        try {
            $products = $this->handleGetAllProduct();

            if (!empty($products)) {
                return $products;
            } else {
                throw new Exception("Product not found");
            }
            
        } catch (Exception $e) {
            return $e->getMessage("Error get all product");
        }
    }
}

?>

<?php 

require_once "../services/BrandService.php";

class BrandController extends BrandService {

    // Xử lý yêu cầu Brand
    public function handleBrandRequest(){
        try {
            $brands = $this->handleGetAllBrand();

            if (!empty($brands)) {
                return $brands;
            } else {
                throw new Exception("Brand not found");
            }
            
        } catch (Exception $e) {
            return $e->getMessage("Error get all brand");
        }
    }

}

?>

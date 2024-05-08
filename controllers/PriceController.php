<?php 

require_once "../services/priceService.php";

class PriceController extends PriceService {

    // Xử lý yêu cầu Price
    public function handlePriceRequest(){
        try {
            $prices = $this->handleGetAllPrice();

            if (!empty($prices)) {
                return $prices;
            } else {
                throw new Exception("Price not found");
            }
            
        } catch (Exception $e) {
            return $e->getMessage("Error get all price");
        }
    }

}

?>

<?php 

require_once "../services/ColorService.php";

class ColorController extends ColorService {

    // Xử lý yêu cầu Color
    public function handleColorRequest(){
        try {
            $colors = $this->handleGetAllColor();

            if (!empty($colors)) {
                return $colors;
            } else {
                throw new Exception("Color not found");
            }
            
        } catch (Exception $e) {
            return $e->getMessage("Error get all color");
        }
    }

}

?>

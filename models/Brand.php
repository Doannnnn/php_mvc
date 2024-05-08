<?php

require_once "../config/DB.php";

class Brand extends DB {

    // Lấy tất cả Brand
    public function getAllBrand() {
        $query = "SELECT * FROM brands";

        $statement = $this->con->prepare($query);
        $statement->execute();

        $brands = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $brands;
    }

}

?>

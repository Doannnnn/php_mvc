<?php

require_once "../config/DB.php";

class Price extends DB {

    // Lấy tất cả Price
    public function getAllPrice() {
        $query = "SELECT * FROM prices";

        $statement = $this->con->prepare($query);
        $statement->execute();

        $prices = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $prices;
    }

}

?>

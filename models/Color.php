<?php

require_once "../config/DB.php";

class Color extends DB {

    // Lấy tất cả Color
    public function getAllColor() {
        $query = "SELECT * FROM colors";

        $statement = $this->con->prepare($query);
        $statement->execute();

        $colors = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $colors;
    }

}

?>

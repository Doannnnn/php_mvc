<?php

require_once "../config/DB.php";

class Category extends DB {

    // Lấy tất cả Category
    public function getAllCategory() {
        $query = "SELECT * FROM categories";
        $statement = $this->con->prepare($query);
        $statement->execute();

        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }

}

?>

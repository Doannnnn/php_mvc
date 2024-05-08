<?php

require_once "../config/DB.php";

class User extends DB {

    // Tìm kiếm user theo email
    public function findUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        
        $statement = $this->con->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    // Thêm mới user
    public function addUser($user) {
        $query = "INSERT INTO users (last_name, first_name, email, password, role) VALUES (:lastName, :firstName, :email, :password, :role)";
    
        $statement = $this->con->prepare($query);
        $statement->bindParam(':lastName', $user['lastName']);
        $statement->bindParam(':firstName', $user['firstName']);
        $statement->bindParam(':email', $user['email']);
        $statement->bindParam(':password', $user['password']);
        $statement->bindValue(':role', "USER");
    
        $result = $statement->execute();
    
        return $result;
    }
    
}

?>
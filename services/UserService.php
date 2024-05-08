<?php

require_once "../models/User.php";

class UserService extends User {
    
    // Xử lý thêm mới user
    public function handleAddUser($user) {
        $checkUser = $this->findUserByEmail($user["email"]);

        if ($checkUser) {
            throw new Exception("User already exists");
        }

        return $this->addUser($user);
    }

}

?>

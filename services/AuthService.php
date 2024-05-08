<?php 

require_once "../models/User.php";

class AuthService extends User {
    
    // Xác thực đăng nhập
    public function Authentication($data) {
        $user = $this->findUserByEmail($data['email']);

        if (!$user) {
            throw new Exception("User not found");
        }

        if ($data['password'] !== $user['password']) {
            throw new Exception("Incorrect password");
        }

        return $user;
    }

}

?>
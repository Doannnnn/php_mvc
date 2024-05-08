<?php 

require_once "../services/UserService.php";

class UserController extends UserService {

    // Xử lý yêu cầu đăng ký
    public function handleRegisterRequest($data) {
        try {
            $result = $this->handleAddUser($data);

            if ($result) {
                header("Location: login.php?success=register_successfully");
                exit;
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>


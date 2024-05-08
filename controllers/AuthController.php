<?php 

require_once "../services/AuthService.php";

class AuthController extends AuthService {

    // Xử lý yêu cầu đăng nhập
    public function handleLoginRequest($data){
        try {
            $user = $this->Authentication($data);

            // Lưu thông tin người dùng vào session
            session_start();
            $_SESSION['auth'] = $user;

            // // Lưu thông tin người dùng vào cookie
            $cookie_name = "auth";
            $cookie_value = json_encode($user);
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 ngày

            if($user['role'] == "ADMIN") {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

?>

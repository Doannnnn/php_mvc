<?php

// Kết nối database
class DB {

  public $con;
  protected $servername = "localhost";
  protected $username = "root";
  protected $password = "Congdoan12@";
  protected $dbname = "shoe_shop";

  function __construct() {
    try {
      $this->con = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      // Đặt chế độ lỗi PDO thành ngoại lệ
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

}

?>



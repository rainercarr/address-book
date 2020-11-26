<?php
class MySqlCredential {
    private $hostname;
    private $db_name;
    private $username;
    private $password;

    public function __construct($hostname, $db_name, $username, $password) {
        $this->hostname = $hostname;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function get_dsn() {
        return "mysql:host=" . $this->hostname . ";dbname=" . $this->db_name;
    }

    public function get_username() {
        return $this->username;
    }

    public function get_password() {
        return $this->password;
    }

}
?>
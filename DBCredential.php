<?php
abstract class DBCredential {
    private $hostname;
    private $db_name;
    private $username;
    private $password;
    // give a hostname
    public function getHostname() {
        return $this->hostname;
    }
    public function getDbName() {
        return $this->db_name;
    }
    public function getUsername() {
        return $this->username;

    }
    public function getPassword() {
        return $this->password;
    }

    // gets the DSN (data source name) required to create a new PDO connection.
    // DSN varies based on database type (so is handled in implementations of the abstract class)
    public function getDsn() {}
}

?>
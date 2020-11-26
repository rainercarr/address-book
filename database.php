<?php
// DEFINITIONS ONLY CLASS
class Database {
    public $dbh;
    public function __construct(MySqlCredential $cr){
        try {
            $this->dbh = new PDO($cr->get_dsn(), $cr->get_username(), $cr->get_password());
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error! " . $e->getMessage() . "<br/>";
        }
    }
}
?>
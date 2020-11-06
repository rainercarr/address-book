<?php
//database connection here
//imports variables $dsn, $username, $password
include_once("db_credentials.php");
$dbh = NULL;
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Error! " . $e->getMessage() . "<br/>";
    die();
}
?>
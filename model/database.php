<?php
class Database{
    private static $dsn = 'mysql:host=localhost;dbname=project1';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>
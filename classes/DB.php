<?php
class DB{
    private static $host="localhost";
    private static $username="root";
    private static $password="";
    private static $dbname="mpms";
    public static function getInstance(){
        $dsn= 'mysql:host='.DB::$host. ';dbname='.DB::$dbname;
        $connection=New PDO($dsn, DB::$username,DB::$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}
?>
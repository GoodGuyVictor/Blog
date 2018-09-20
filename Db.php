<?php

    namespace blog\db;

    use PDO;
    use PDOException;

    class Db
    {
        private static $instance = null;
        public $hostname = "localhost";
        public $db_name = "blog";
        public $username = "root";
        public $password = "";
        private $pdo;

        private function __construct()
        {
            try {
                $this->pdo = new PDO(
                    "mysql:host=" . $this->hostname . ";dbname=" . $this->db_name,
                    $this->username,
                    $this->password
                );

                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("ERROR: Could not connect. " . $e->getMessage());
            }
        }

        public static function instance()
        {
            if(self::$instance === null)
                self::$instance = new DB();
            return self::$instance;
        }

        public function sqlQuery($sql)
        {
            try {
                $this->pdo->exec($sql);

            } catch(PDOException $e){
                die("ERROR: Could not execute $sql. " . $e->getMessage());
            }
        }

        public function sqlSelectQuery($sql)
        {
            try {
                $result = $this->pdo->query($sql);
                if($result->rowCount() > 0) {
                    return $result;
                }else {
                    return null;
                }
            } catch(PDOException $e){
                die("ERROR: Could not execute $sql. " . $e->getMessage());
            }
        }
    }
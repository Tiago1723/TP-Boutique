<?php
    require_once "./Secure.php";

    class Database extends Secure {

        private static $instance = null;

        public static function getConnection()
        {
            if (self::$instance === null) {

                $host = "localhost";
                $dbname = "boutique_en_ligne";
                $user = getUserDB();
                $pass = getPasswordDB();

                try {
                    self::$instance = new PDO(
                        "mysql:host=$host;dbname=$dbname;charset=utf8",
                        $user,
                        $pass
                    );

                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                } catch (PDOException $e) {
                    die("Database connection error: " . $e->getMessage());
                }
            }

            return self::$instance;
        }
    }
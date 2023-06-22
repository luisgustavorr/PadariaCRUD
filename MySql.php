<?php 
require __DIR__.'/vendor/autoload.php';

use Dotenv\Dotenv;

class MySql {
    private static $pdo;

    public static function conectar() {
        if (self::$pdo == null) {
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();

            try {
                self::$pdo = new PDO(
                    'mysql:host=' . $_ENV['HOST'] . ';dbname=' . $_ENV['DATABASE'],
                    $_ENV['USER'],
                    $_ENV['PASSWORD'],
                    [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
                );
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo '<h2>Erro ao se conectar com o banco de dados!</h2>';
                echo $e;
            }
        }

        return self::$pdo;
    }
}

 ?>
<?php
define('INCLUDE_PATH', 'https://localhost/PadariaCRUD/');
define('INCLUDE_PATH_FULL', INCLUDE_PATH.'/View/pages/');
spl_autoload_register(
    function($class){
        $path = str_replace("\\",DIRECTORY_SEPARATOR,$class);
        $path_to_file = $path.".php";
        if($path == 'Application'){
            require_once('Application.php');
        }elseif( $path == 'MySql.php'){
            require_once('MySql.php');

        }

        elseif(file_exists($path_to_file)){
            require_once($path_to_file);
    }else{
      include('View/pages/templates/header.php');
      include('View/pages/templates/404page.php');
 

     
    }
    }
  );
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

?>

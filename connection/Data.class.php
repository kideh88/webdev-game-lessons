<?php
class Data {
    protected $objPDO;

    public function __construct()
    {
        include_once('../config/config.inc.php');
        try {
            $objConnection = new PDO('mysql:host=' . $database_server . '; dbname=' . $database_name, $database_user, $database_password);
            $objConnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $objConnection->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8
            $this->objPDO = $objConnection;
        }
        catch (PDOException $err) {
            echo "Failed to construct PDO Connection";
            echo '<pre>';
            var_dump($err->getMessage());
            echo '</pre>';
            file_put_contents('PDOErrors.txt',$err, FILE_APPEND);  // write some details to an error-log outside public_html
            die();  //  terminate connection
        }
    }

    public function pdo()    {
        return $this->objPDO;
    }

}
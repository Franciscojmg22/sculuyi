<!--Creo que esta linea es importante para la conexion a la base de datos, si ven algun problema lo comentan porfavor-->
<?php 
    $server = '127.0.0.1';
    $username = 'root';
    $password = '';
    $database = 'sculuyi';
    try {
        $conn = new PDO("mysql:host=$server; dbname=$database;", $username, $password);
    } catch (PDOException $error) {
        die('Connection Failed: ' . $error->getMessage());
    }
    //echo 'conectoooooo'
?>
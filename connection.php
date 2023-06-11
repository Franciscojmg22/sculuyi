<!--Creo que esta linea es importante para la conexion a la base de datos, si ven algun problema lo comentan porfavor-->
<?php 
    $server = 'localhost';
    $username = '524465';
    $password = 'sculuyi2';
    $database = '524465';
    try {
        $conn = new PDO("mysql:host=$server; dbname=$database;", $username, $password);
    } catch (PDOException $error) {
        die('Connection Failed: ' . $error->getMessage());
    }
?>
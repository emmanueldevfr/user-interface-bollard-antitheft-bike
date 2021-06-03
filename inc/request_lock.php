<?php
date_default_timezone_set('Europe/Paris');
$date = date('d-m-y h:i:s');
require('./database.php');
$id = htmlspecialchars($_GET["id"]);
$borne_number = htmlspecialchars($_GET["borne"]);

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET CHARACTER SET utf8mb4");
    $checkInfos = $db->query("SELECT borne_number FROM borne_data WHERE id = '$id'");
    if ($donnees = $checkInfos->fetch())
    {
        $sql = "UPDATE borne_data SET status = '1' WHERE id = '$id'";
        $db->exec($sql);
        $sql_logs = "INSERT INTO `borne_logs` (`id`, `status`, `borne_number`, `date`, `#`) VALUES ('$id', '1', '$borne_number', '$date', NULL)";
        $db->exec($sql_logs);
    }else{
            $sql = "INSERT INTO `borne_data` (`id`, `status`, `borne_number`) VALUES ('$id', '1', $borne_number)";
            $db->exec($sql);
            $sql_logs = "INSERT INTO `borne_logs` (`id`, `status`, `borne_number`, `date`, `#`) VALUES ('$id', '1', '$borne_number', '$date', NULL)";
            $db->exec($sql_logs);
        }}
    catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
     }

?>

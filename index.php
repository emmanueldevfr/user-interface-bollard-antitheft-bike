<?php
$id = htmlspecialchars($_GET["id"]);
$borne_number = htmlspecialchars($_GET["borne"]);
$status = "Inconnu";
$source = "assets/images/unlock.png";
require('inc/database.php');

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $checkInfos = $db->query("SELECT borne_number FROM borne_data WHERE id = '$id'");
    if ($donnees = $checkInfos->fetch())
    {
        $data = $db->query("SELECT * FROM borne_data WHERE id = '$id'");
        while($row = $data->fetch()):
                if ($row["status"] === "0") {
                    $status = "Devérouillé";
                    $source = "assets/images/unlock.png";
                } else {
                    $status =  "Verouillé";
                    $source = "assets/images/lock.png";
                }
            endwhile;
    }else{
           $status = "Devérouillé";
    }}
    catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
     }
?>

<!DOCTYPE html>
<html lang="fr">
<html>
<head>
    <meta charset="UTF-8">
    <title>Interface utilisateur</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<ul class="topnav">
  <li><b><a>Interface utilisateur</a></b></li>
</ul>
<div style="text-align: center;">
    <h3>Votre identifiant unique : <?php echo $id; ?></h3>
    <h3>Numéro de la borne : <?php echo $borne_number; ?></h3>
    <h3>Statut de la borne: <div id="status"><?php echo $status; ?></div></h3>
    <br /><br />

    <img onclick="red(this)" src="<?= $source; ?>" alt="" class="img">
</div>
</body>

<script>
    let id = "<?= $id; ?>";
    let borne_number = "<?= $borne_number; ?>";
    let status = document.getElementById("status")
    function red(x) {
        if (x.src.endsWith("assets/images/unlock.png")) { 
            const image_lock = "assets/images/lock.png";
            x.src = image_lock;
            // Send request in PHP => request_lock.php
            fetch(`inc/request_lock.php?id=${id}&borne=${borne_number}`, {}).then(json => console.log(json))
            status.innerHTML= "Verouillé";
        } else  {
            const image_unlock = "assets/images/unlock.png";
            x.src = image_unlock;
            fetch(`inc/request_unlock.php?id=${id}&borne=${borne_number}`, {}).then(json => console.log(json))
            status.innerHTML = "Devérouillé";
        }
    }
</script>
</html>

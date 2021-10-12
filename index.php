<?php

require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);

if($_POST){
        

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);


    $query = "INSERT INTO friend (firstname,lastname) VALUES (:firstname, :lastname);";

    $stmt= $pdo->prepare($query);

    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);

    $stmt->execute();
  
}

$query = "SELECT * FROM friend;";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);

echo '<ul>';
foreach($friends as $friend) {

    echo '<li>'. $friend['firstname'] . ' ' . $friend['lastname'].'</li>';

}
echo '</ul>';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
</head>
<body>
    <form  method ="POST">

    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" id="firstname"/>

    <label for="lastname">Nom</label>
    <input type="text" name="lastname" id="lastname"/>

    <input type="submit" value="Envoi">

    </form>
</body>
</html>




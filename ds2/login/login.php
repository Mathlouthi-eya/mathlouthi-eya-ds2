<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bd_blog','root','');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des champs
    if (empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo "Tous les champs sont obligatoires.";
    } else {
        // Préparation de la requête d'insertion
        $query = "INSERT INTO user (nom, email, password) VALUES (?nom, ?email, ?password)";
        $statement = $bdd->prepare($query);

        // Hashage du mot de passe
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Exécution de la requête
        $result = $statement->execute(array(
            '?nom' => $_POST['nom'],
            '?email' => $ $_POST['email'],
            '?password' =>$_password,
        ));

        // Vérification si l'insertion a réussi
        if ($result) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="nom" name="nom"><br>

        <label for="email">Adresse email :</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password"><br>

        <button type="submit" value="S'inscrir"> <a href="index.php"></a></button>

        </form>
</body>
</html>

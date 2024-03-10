session_start();

// Vérifier si l'utilisateur est déjà connecté
if(isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}

// Vérifier si le formulaire de connexion est soumis
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données (à remplacer avec vos propres informations)
    $dsn = "mysql:host=192.168.20.10;dbname=auth";
    $username = "userauth";
    $password = "azerty";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion a la base de données: " . $e->getMessage());
    }

    // Vérifier les informations d'identification
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Authentification réussie, enregistrer l'ID de l'utilisateur dans la session
        $_SESSION['user_id'] = $user['id'];
        header("Location: welcome.php");
        exit();
    } else {
        $error_message = "Nom d'utilisateur ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if(isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="index.php">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Se Connecter</button>
    </form>
</body>
</html>
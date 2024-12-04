<!DOCTYPE html>
<html>

<head>
    <title>Add New Student</title>
</head>

<body>
    <h1>Add New Student</h1>
    <form action="create.php" method="post">
        Nom: <input type="text" name="Nom" required><br>
        Prenom: <input type="text" name="Prenom" required><br>
        Age: <input type="number" name="Age" required><br>
        Promotion: <input type="text" name="Promotion" required><br>
        <input type="submit" value="Add">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $dsn = 'mysql:host=mysql;dbname=students';
            $username = 'root';
            $password = 'rootpassword';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            $pdo = new PDO($dsn, $username, $password, $options);

            $stmt = $pdo->prepare("INSERT INTO etudiants (Nom, Prenom, Age, Promotion) VALUES (?, ?, ?, ?)");
            $stmt->execute([$_POST['Nom'], $_POST['Prenom'], $_POST['Age'], $_POST['Promotion']]);

            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Students List</title>
</head>

<body>
    <h1>Students List</h1>
    <a href="create.php">Add New Student</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
            <th>Promotion</th>
        </tr>
        <?php
        try {
            $dsn = 'mysql:host=mysql;dbname=students';
            $username = 'root';
            $password = 'rootpassword';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            $pdo = new PDO($dsn, $username, $password, $options);

            $stmt = $pdo->query("SELECT * FROM etudiants");
            while ($row = $stmt->fetch()) {
                echo "<tr>
                    <td>{$row['Id']}</td>
                    <td>{$row['Nom']}</td>
                    <td>{$row['Prenom']}</td>
                    <td>{$row['Age']}</td>
                    <td>{$row['Promotion']}</td>
                   
                    </td>
                </tr>";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </table>
</body>

</html>
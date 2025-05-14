<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    if (!empty($name) && !empty($age) && !empty($email)) {
        $stmt = $pdo->prepare("UPDATE users SET name = :name, age = :age, email = :email WHERE id = :id");
        $stmt->execute([
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'id' => $id
        ]);
        echo "Updated!";
        echo "<br><a href='index.php'>Back to Home</a>";
    } else {
        echo "Missing fields!";
    }
}
?>

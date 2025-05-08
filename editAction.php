<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
    // Get POST values
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    // Check for empty fields
    if (empty($name) || empty($age) || empty($email)) {
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if (empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
    } else {
        // Prepare SQL and bind parameters
        $stmt = $pdo->prepare("UPDATE users SET name = :name, age = :age, email = :email WHERE id = :id");
        $stmt->execute([
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'id' => $id
        ]);

        // Display success message
        echo "<p><font color='green'>Data updated successfully!</p>";
        echo "<a href='index.php'>View Result</a>";
    }
}
?>

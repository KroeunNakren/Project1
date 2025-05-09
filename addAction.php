<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
    // Get POST values
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
        
        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // Insert data into database
        $stmt = $pdo->prepare("INSERT INTO users (name, age, email) VALUES (:name, :age, :email)");
        $stmt->execute([
            'name' => $name,
            'age' => $age,
            'email' => $email
        ]);
        
        // Display success message
        echo "<p><font color='green'>Data added successfully!</p>";
        echo "<a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>

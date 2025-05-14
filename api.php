<?php
header("Content-Type: application/json");
require_once("dbConnection.php");
// Get HTTP method and parse input
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Get single user
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->execute(['id' => $_GET['id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($user);
        } else {
            // Get all users
            $stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($users);
        }
        break;

    case 'POST':
        if (empty($input['name']) || empty($input['age']) || empty($input['email'])) {
            http_response_code(400);
            echo json_encode(['error' => 'All fields required.']);
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (name, age, email) VALUES (:name, :age, :email)");
            $stmt->execute([
                'name' => $input['name'],
                'age' => $input['age'],
                'email' => $input['email']
            ]);
            echo json_encode(['message' => 'User added successfully.']);
        }
        break;

    case 'PUT':
        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID required in URL.']);
        } else {
            $stmt = $pdo->prepare("UPDATE users SET name = :name, age = :age, email = :email WHERE id = :id");
            $stmt->execute([
                'name' => $input['name'],
                'age' => $input['age'],
                'email' => $input['email'],
                'id' => $_GET['id']
            ]);
            echo json_encode(['message' => 'User updated successfully.']);
        }
        break;

    case 'DELETE':
        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID required in URL.']);
        } else {
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
            $stmt->execute(['id' => $_GET['id']]);
            echo json_encode(['message' => 'User deleted successfully.']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
?>

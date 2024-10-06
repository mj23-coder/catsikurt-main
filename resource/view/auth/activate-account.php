<?php
use App\Core\Database;
use App\Models\User;
use App\Controllers\UserController;

require_once __DIR__ . '/../../../vendor/autoload.php';

session_start();

$database = new Database();
$dbConnection = $database->connect();
$userModel = new User($dbConnection);
$userController = new UserController($userModel);

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $user = $userController->activate($token);

    if ($user) {
        // Activate the account
        $userController->confirmAccount($user['id']);
        $_SESSION['user_id'] = $user['id'];
        
        $userId = $_SESSION['user_id']; 
        $user = $userModel->findUserById($userId); 
        $_SESSION['user_name'] = $user['name'] ?? ''; 

        header("Location: /profile2");
        exit(); 
    } else {
        echo "Invalid or expired activation token.";
    }
} else {
    echo "No activation token provided.";
}
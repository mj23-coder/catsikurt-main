<?php
use App\Core\Database;
use App\Models\User;
use App\Controllers\UserController;

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

$database = new Database();
$dbConnection = $database->connect();
$userModel = new User($dbConnection);
$userController = new UserController($userModel);

$name = '';
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $user = $userModel->findUserById($userId);
    $name = $user['name'] ?? '';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/profile2style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<header>
  <nav class="navbar">
    <img src="/image/logo1.png" alt="logo" class="logo">

    <div class="nav-container"> <!-- New div to contain nav links -->
      <ul class="nav-link">
        <li><a href="#home">HOME</a></li>
        <li><a href="">OUR CATS</a></li>
        <li><a href="">ABOUT</a></li>
        <li><a href="">FAQs</a></li>
        <li><label> <?php echo htmlspecialchars($name); ?> </label></li>
    </div>
      
      </ul>
  </nav>
</header>


<div class="wrapper">
    <span class="icon-close"><ion-icon name="close"></ion-icon></span>
    <div class="form-box login">
      <h2>Profile</h2>

    <div class="profile-placeholder">
        <img src="https://via.placeholder.com/150" id="photo" alt="Profile Picture" class="profile-img">
        <input type="file" id="profileUpload" name="profileUpload" style="display: none;" accept="image/*"> 
      </div>

      <form action="/profile2" method="post">
        <div class="input-box">
          <span class="icon"><ion-icon name="people"></ion-icon></span>
          <input type="text" id="name" value="<?php echo htmlspecialchars($name); ?>" required >
          <label for="name">Name</label>
        </div>

        <div class="input-box">
            <span class="icon"><ion-icon name="call"></ion-icon></span>
            <input type="num" required>
            <label for="#">Phone number</label>
          </div>
          

          <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="tect" required>
            <label for="#">City</label>
          </div>
          

        <button type="submit" class="btn"><b>Continue</b></button>
       </form>
    
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/js/profile2.js"></script>
</body>
</html>
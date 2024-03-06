<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate the data
if (empty($username) || empty($email) || empty($password)) {
    die('Please fill in all fields.');
}

// Connect to the database
$host = 'localhost';
$db = 'mydatabase';
$user = 'myusername';
$pass = 'mypassword';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// Insert the data into the database
$stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
$stmt->execute([$username, $email, $password]);

// Redirect the user to the index.html page
header('Location: index.html');
exit;
?>
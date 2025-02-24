<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trenuri_db";

// Crearea conexiunii
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilizatori WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['parola'])) {
            $_SESSION['email'] = $user['email'];
            header("Location: ../public/booking.html");
            exit();
        } else {
            echo "Parola incorectă.";
        }
    } else {
        echo "Email neînregistrat.";
    }

    $stmt->close();
}

$conn->close();
?>

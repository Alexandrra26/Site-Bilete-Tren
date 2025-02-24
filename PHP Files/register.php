<?php
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
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Verificarea dacă adresa de email este deja înregistrată
    $checkEmail = "SELECT * FROM utilizatori WHERE email = ?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Adresa de email este deja înregistrată.";
    } else {
        // Inserarea utilizatorului în baza de date
        $sql = "INSERT INTO utilizatori (nume, prenume, email, parola) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nume, $prenume, $email, $hashed_password);

        if ($stmt->execute()) {
            header("Location: ../public/login.html");
        } else {
            echo "Eroare: " . $sql . "<br>" . $conn->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>

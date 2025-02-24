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
    $bilete = json_decode($_POST['bilete'], true);
    
    foreach ($bilete as $bilet) {
        $nume = $bilet['nume'];
        $prenume = $bilet['prenume'];
        $data_plecarii = $bilet['data_plecarii'];
        $categorie_varsta = $bilet['categorie_varsta'];
        $pret = $bilet['buget'];
        $numar_bilete = $bilet['numar_bilete'];

        $sql = "INSERT INTO rezervari (nume, prenume, data_plecarii, categorie_varsta, pret, numar_bilete) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssdi", $nume, $prenume, $data_plecarii, $categorie_varsta, $pret, $numar_bilete);
        
        if (!$stmt->execute()) {
            echo "Eroare: " . $sql . "<br>" . $conn->error;
        }
    }
    header("Location: confirmation.php?success=true");
}

$conn->close();
?>

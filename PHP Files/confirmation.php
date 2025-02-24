<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmare Rezervare</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <header>
        <div class="nav-container">
            <h1>Rezervare Bilete Tren</h1>
            <nav>
                <ul>
                    <li><a href="../public/booking.html">Rezervare Bilete</a></li>
                    <li><a href="../public/login.html">Autentificare</a></li>
                    <li><a href="../public/register.html">Creare Cont</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Confirmare Rezervare</h2>
        <div id="message-container">
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 'true') {
                echo "<p class='message'>Rezervarea a fost efectuată cu succes!</p>";
            } else {
                echo "<p class='message error'>A apărut o problemă cu rezervarea dvs.</p>";
            }
            ?>
            <button onclick="window.location.href='../public/booking.html'">Înapoi la Rezervare Bilete</button>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Rezervare Bilete Tren. Toate drepturile rezervate.</p>
    </footer>
</body>
</html>

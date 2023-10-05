<?php
// Параметри підключення до бази даних
$host = "localhost";
$dbname = "lisa_ua_db";
$username = "lisa_ua_db";
$password = "lisa_ua_db";

// Підключення до бази даних
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Помилка підключення до бази даних: " . $e->getMessage());
}


// Обробка введеного логіну та пароля
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Перевірка логіну та пароля в базі даних
    $query = "SELECT * FROM lisa_users WHERE Login = :username AND Password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    // Перевірка результату запиту
    if ($stmt->rowCount() == 1) {
        // Вхід успішний
        session_start();
        $_SESSION["username"] = $username;
        echo "success"; // Повідомлення про успішну автентифікацію
    } else {
        // Невірний логін або пароль
        echo "Невірний логін або пароль"; // Повідомлення про помилку автентифікації
    }
}
?>

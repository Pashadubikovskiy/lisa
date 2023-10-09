<?php


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

<?php
require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Захист від SQL-ін'єкцій
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);

        // Підготовка та виконання запиту
        $query = "SELECT * FROM lisa_users WHERE Login = '$username' AND Password = '$password'";
        $result = $conn->query($query);

        // Перевірка результату запиту
        if ($result && $result->num_rows == 1) {
            // Вхід успішний
            session_start();
            $_SESSION["username"] = $username;
            echo "success"; // Повідомлення про успішну автентифікацію
        } else {
            // Невірний логін або пароль
            echo "Невірний логін або пароль"; // Повідомлення про помилку автентифікації
        }

        // Закриття з'єднання з базою даних
        $conn->close();
    } else {
        echo "Не всі необхідні дані були передані.";
    }
}
?>

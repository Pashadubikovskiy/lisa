<?php
require_once('db_connect.php');

$response = [];

// Перевірка з'єднання
if ($conn->connect_error) {
    $response['error'] = "Помилка підключення до бази даних: " . $conn->connect_error;
    echo json_encode($response);
    exit;
}

// Отримання даних з Ajax-запиту
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $skuValues = $_POST["skuValues"];  // Додайте цей рядок

    // Виконання оновлень в базі даних
    foreach ($skuValues as $sku) {
        $sku = mysqli_real_escape_string($conn, $sku);

        // Отримати поточну кількість матеріалу
        $sql = "SELECT count FROM lisa_materials WHERE sku = '$sku'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentCount = $row["count"];

            // Ваша логіка для перевірки, чи достатньо матеріалу
            $counting = 1; // Припустимо, що ви хочете зменшити кількість на 1 одиницю
            if ($currentCount < $counting) {
                $response['error'] = "Помилка: Недостатньо матеріалів для виконання операції";
                echo json_encode($response);
                exit; // Вийти з скрипта, не виконуючи оновлення
            }

            // Виконати оновлення в таблиці lisa_materials
            $sql = "UPDATE lisa_materials SET count = count - $counting WHERE sku = '$sku'";
            if ($conn->query($sql) === TRUE) {
                // Додати запис до таблиці lisa_materials_use
                $usageDate = date("Y-m-d"); // Поточна дата
                $sql = "INSERT INTO lisa_materials_use (sku, usation, date) VALUES ('$sku', $counting, '$usageDate')";
                if ($conn->query($sql) === TRUE) {
                    $response['success'] = "Авторський рецепт зібрано!";
                } else {
                    $response['error'] = "Помилка під час додавання запису до таблиці lisa_materials_use: " . $conn->error;
                }
            } else {
                $response['error'] = "Помилка під час оновлення таблиці lisa_materials: " . $conn->error;
            }
        } else {
            $response['error'] = "Помилка: Матеріал з SKU '$sku' не знайдено";
        }
    }
} else {
    $response['error'] = "Невірний метод запиту";
}

echo json_encode($response);

// Закриття з'єднання з базою даних
$conn->close();

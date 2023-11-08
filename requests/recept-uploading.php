<?php
require_once('db_connect.php');

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}
$response = [];
// Отримання даних з Ajax-запиту
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $skuValues = $_POST["skuValues"];
    $countingValues = $_POST["countingValues"];

    // Виконання оновлень в базі даних
    for ($i = 0; $i < count($skuValues); $i++) {
        $sku = $skuValues[$i];
        $counting = $countingValues[$i];

        // Перевірка, чи count не стане менше 0 після оновлення
        $sql = "SELECT count FROM lisa_materials WHERE sku = '$sku'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentCount = $row["count"];
            if ($currentCount < $counting) {
                $response['error'] = "Помилка: Недостатньо матеріалів для виконання операції";
                exit; // Вийти з скрипта, не виконуючи оновлення
            }
        }

        // Виконати оновлення в таблиці lisa_materials
        $sql = "UPDATE lisa_materials SET count = count - $counting WHERE sku = '$sku'";
        $conn->query($sql);

        // Додати запис до таблиці lisa_materials_use
        $usageDate = date("Y-m-d"); // Поточна дата
        $sql = "INSERT INTO lisa_materials_use (sku, usation, date) VALUES ('$sku', $counting, '$usageDate')";
        $conn->query($sql);
    }

    $response['success'] = "Дані успішно оновлені";
} else {
    $response['error'] = "Невірний метод запиту";
}

echo json_encode($response);

// Закриття з'єднання з базою даних
$conn->close();

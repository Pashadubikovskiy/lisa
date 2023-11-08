<?php
require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Отримання SKU з AJAX-запиту
    $sku = $_POST["sku"];

    // Виконання запиту до бази даних для отримання всіх полів за SKU
    $sql = "SELECT * FROM lisa_materials WHERE sku = '$sku'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Повернення всіх полів у форматі JSON
        echo json_encode($row);
    } else {
        // Якщо матеріал не знайдено, поверніть пустий об'єкт JSON або іншу відповідь, яка підходить вашим потребам
        echo json_encode(array());
    }
} else {
    echo "Невірний метод запиту";
}

// Закриття з'єднання з базою даних
$conn->close();
?>
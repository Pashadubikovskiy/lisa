<?php
require_once('db_connect.php');

if (isset($_POST["sku"])) {
    $sku = $_POST["sku"];

    // Захист від SQL-ін'єкцій
    $sku = $conn->real_escape_string($sku);

    // Підготовка SQL-запиту і виконання
    $sql = "SELECT * FROM lisa_materials WHERE sku = '$sku'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();

        // Передача даних у форматі JSON
        echo json_encode($row);
    } else {
        echo "Помилка виконання запиту: " . $conn->error;
    }

    // Закриття з'єднання з базою даних
    $conn->close();
} else {
    echo "Параметр 'sku' не було передано через POST-запит.";
}
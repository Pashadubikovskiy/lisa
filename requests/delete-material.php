<?php
require_once('db_connect.php');

if (isset($_POST["sku"])) {
    $sku = $_POST["sku"];

    // Захист від SQL-ін'єкцій
    $sku = $conn->real_escape_string($sku);

    // Підготовка SQL-запиту і виконання
    $sql = "DELETE FROM lisa_materials WHERE sku = '$sku'";
    $result = $conn->query($sql);

    if ($result) {
        echo "Рядок з SKU '$sku' був успішно видалений.";
    } else {
        echo "Помилка видалення рядка: " . $conn->error;
    }

    // Закриття з'єднання з базою даних
    $conn->close();
} else {
    echo "Параметр 'sku' не було передано через POST-запит.";
}
?>

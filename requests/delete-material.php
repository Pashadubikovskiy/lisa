<?php
require_once('db_connect.php');
$response = [];

$sku = $_POST["sku"];

// Захист від SQL-ін'єкцій
$sku = $conn->real_escape_string($sku);

// Підготовка SQL-запиту і виконання
$sql = "DELETE FROM lisa_materials WHERE sku = '$sku'";
$result = $conn->query($sql);

if ($result) {
    $response['success'] = "Матеріал видалено.";
} else {
    $response['error'] = "Помилка видалення матеріалу: " . $conn->error;
}

// Отримання всіх рецептів з таблиці
$sql_materials = "SELECT * FROM lisa_materials";
$result_materials = $conn->query($sql_materials);

$materials = [];

if ($result_materials->num_rows > 0) {
    while ($row_material = $result_materials->fetch_assoc()) {
        $materials[] = $row_material;
    }
}
// Додайте список рецептів до відповіді
$response['materials'] = $materials;

// Перетворіть відповідь у формат JSON
echo json_encode($response);

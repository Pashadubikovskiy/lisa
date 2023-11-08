<?php
require_once('db_connect.php');

// Отримання даних з POST-запиту
$category = $_POST["category"];

$response = [];

// SQL-запрос для выбора рецепта по ID
// Отримання всіх рецептів з таблиці
$sql_materials = "SELECT * FROM lisa_materials WHERE category = '$category'";
$result_materials = $conn->query($sql_materials);

$materials = [];

if ($result_materials->num_rows > 0) {
    while ($row_recipe = $result_materials->fetch_assoc()) {
        $materials[] = $row_recipe;
    }
}

// Додайте список рецептів до відповіді
$response['materials'] = $materials;

// Перетворіть відповідь у формат JSON
echo json_encode($response);

// Закриття з'єднання з базою даних
$conn->close();
?>

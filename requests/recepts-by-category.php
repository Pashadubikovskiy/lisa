<?php
require_once('db_connect.php');

// Отримання даних з POST-запиту
$category = $_POST["category"];

$response = [];

// SQL-запрос для выбора рецепта по ID
// Отримання всіх рецептів з таблиці
$sql_recipes = "SELECT * FROM recipes WHERE category = '$category'";
$result_recipes = $conn->query($sql_recipes);

$recipes = [];

if ($result_recipes->num_rows > 0) {
    while ($row_recipe = $result_recipes->fetch_assoc()) {
        $recipes[] = $row_recipe;
    }
}

// Додайте список рецептів до відповіді
$response['recipes'] = $recipes;

// Перетворіть відповідь у формат JSON
echo json_encode($response);

// Закриття з'єднання з базою даних
$conn->close();
?>

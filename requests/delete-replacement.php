<?php
require_once('db_connect.php');

// Отримання даних з Ajax-запиту
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $recipeId = $_POST["recipeId"];
    $component = $_POST["component"];

    // Перевірка з'єднання
    if ($conn->connect_error) {
        die("Помилка підключення до бази даних: " . $conn->connect_error);
    }
// Видалення відповідних записів з таблиці material_replacements
    $sql1 = "DELETE FROM material_replacements WHERE recipe_id = $recipeId AND material_sku = '$component'";
    $conn->query($sql1);

// Закриття з'єднання з базою даних
    $conn->close();

    echo "Заміну видалено";
} else {
    echo "Помилка";
}


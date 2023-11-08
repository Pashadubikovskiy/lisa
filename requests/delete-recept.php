<?php
require_once('db_connect.php');

// Отримання даних з Ajax-запиту
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $recipeId = $_POST["recipeId"];
    // Перевірка з'єднання
    if ($conn->connect_error) {
        die("Помилка підключення до бази даних: " . $conn->connect_error);
    }

// Видалення запису з таблиці recipe_materials
    $sql = "DELETE FROM recipe_materials WHERE recipe_id = $recipeId";
    $conn->query($sql);

// Видалення відповідних записів з таблиці material_replacements
    $sql1 = "DELETE FROM material_replacements WHERE recipe_id = $recipeId";
    $conn->query($sql1);

// Видалення запису з таблиці recipe_materials
    $sql0 = "DELETE FROM recipes WHERE id = $recipeId";
    $conn->query($sql0);

// Закриття з'єднання з базою даних
    $conn->close();

    echo "Рецепт видалено!";
} else {
    echo "Помилка";
}


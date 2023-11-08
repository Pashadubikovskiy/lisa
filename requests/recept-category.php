<?php
require_once('db_connect.php');

// Отримання даних з POST-запиту
$id = $_POST["id"];
$name = $_POST["name"];
$changes = $_POST["changes-category"];

// Перевірка чи існує матеріал з таким SKU
if ($id !== 0) {
    $existingMaterial = $conn->query("SELECT * FROM lisa_recept_categories WHERE id = '$id'")->fetch_assoc();
}

if ($existingMaterial) {
    // Виконуємо UPDATE запит, оскільки changes == true і матеріал існує
    $sql = "UPDATE lisa_recept_categories SET name = '$name'";
    $sql .= " WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result) {
        $response['success'] = "Категорія оновлена.";
    } else {
        $response['error'] = "Помилка при оновленні категорії: " . $conn->error;
    }
} else {
    // Виконуємо INSERT запит, оскільки матеріал не існує
    $sql = "INSERT INTO lisa_recept_categories (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        $response['success'] = "Категорія додана.";
    } else {
        $response['error'] = "Помилка при додаванні категорії: " . $conn->error;
    }
}

// Отримання всіх рецептів з таблиці
$sql_categories = "SELECT * FROM lisa_recept_categories";
$result_categories = $conn->query($sql_categories);

$categories = [];

if ($result_categories->num_rows > 0) {
    while ($row_recipe = $result_categories->fetch_assoc()) {
        $categories[] = $row_recipe;
    }
}
// Додайте список рецептів до відповіді
$response['categories'] = $categories;

// Перетворіть відповідь у формат JSON
echo json_encode($response);
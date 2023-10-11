<?php
require_once('db_connect.php');

// Отримання даних з POST-запиту
$id = $_POST["id"];
$name = $_POST["name"];
$changes = $_POST["changes-category"];

// Перевірка чи існує матеріал з таким SKU
if ($id !== 0) {
    $existingMaterial = $conn->query("SELECT * FROM lisa_categories WHERE id = '$id'")->fetch_assoc();
}

if ($existingMaterial) {
    // Виконуємо UPDATE запит, оскільки changes == true і матеріал існує
    $sql = "UPDATE lisa_categories SET name = '$name'";
    $sql .= " WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result) {
        echo "Категорія була успішно оновлена.";
    } else {
        echo "Помилка при оновленні категорії: " . $conn->error;
    }
} else {
    // Виконуємо INSERT запит, оскільки матеріал не існує
    $sql = "INSERT INTO lisa_categories (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        echo "Категорія успішно додана.";
    } else {
        echo "Помилка при додаванні категорії: " . $conn->error;
    }
}
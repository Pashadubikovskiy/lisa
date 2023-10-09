<?php
require_once('db_connect.php');
// Получение данных из POST-запроса
$category = $_POST["category"];
$sku = $_POST["sku"];
$name = $_POST["name"];
$size = $_POST["size"];
$price = $_POST["price"];
$qty = $_POST["qty"];
$place = $_POST["place"];

// Обработка загруженного файла

$targetDirectory = "../uploads/";
$targetDirectoryForDb = "uploads/";
$originalFileName = $_FILES["myFile"]["name"];
$extension = pathinfo($originalFileName, PATHINFO_EXTENSION); // Получаем расширение файла

// Генерируем уникальное имя файла с использованием временной метки
$uniqueFileName = time() . "_" . uniqid() . "." . $extension;

$targetFile = $targetDirectory . $uniqueFileName;
$targetFileDb = $targetDirectoryForDb . $uniqueFileName;

if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $targetFile)) {
    // Файл успешно загружен с уникальным именем
} else {
    echo "Ошибка при загрузке файла.";
}
// SQL-запрос для вставки данных в таблицу lisa_materials
$sql = "INSERT INTO lisa_materials (category, sku, name, size, price, count, placement, image) VALUES ('$category', '$sku', '$name', '$size', '$price', '$qty', '$place', '$targetFileDb')";

if ($conn->query($sql) === TRUE) {
    echo "Матеріал успішно доданий в базу даних.";
} else {
    echo "Помилка при додаванні матеріалу: " . $conn->error;
}
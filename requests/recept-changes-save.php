<?php
require_once('db_connect.php');

// Отримання даних з POST-запиту
$category = $_POST["receptCategory"];
$receptId = $_POST["receptId"];
$link = $_POST["etsyLink"];
$name = $_POST["receptName"];
$comment = $_POST["comment"];
$changes = $_POST["changes"];
if ($_FILES["myFile"]) {
// Обробка завантаженого файлу
    $targetDirectory = "../uploads/";
    $targetDirectoryForDb = "uploads/";
    $originalFileName = $_FILES["myFile"]["name"];
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);

// Генерування унікального імені файлу
    $uniqueFileName = time() . "_" . uniqid() . "." . $extension;

    $targetFile = $targetDirectory . $uniqueFileName;
    $targetFileDb = $targetDirectoryForDb . $uniqueFileName;

    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $targetFile)) {
        // Файл успішно завантажений з унікальним іменем
    } else {
        echo "Помилка при завантаженні файлу.";
    }
}
    // Виконуємо INSERT запит, оскільки матеріал не існує
    $sql = "INSERT INTO recipes (id, recept_name, etsy_link, comment, image,  category) VALUES ('$receptId','$name','$link','$comment','$targetFileDb', '$category')";

    if ($conn->query($sql) === TRUE) {
        echo "Рецепт оновлено!";
    } else {
        echo "Помилка при оновленні рецепту: " . $conn->error;
    }
//}
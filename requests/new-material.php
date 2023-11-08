<?php
require_once('db_connect.php');

// Отримання даних з POST-запиту
$category = $_POST["category"];
$sku = $_POST["sku"];
$name = $_POST["name"];
$size = $_POST["size"];
$price = $_POST["price"];
$analogs = $_POST["analogs"];
$qty = $_POST["qty"];
$place = $_POST["place"];
$changes = $_POST["changes"];
$response = [];
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
        $response['error'] = "Помилка при завантаженні файлу.";
    }
}
// Перевірка чи існує матеріал з таким SKU
$existingMaterial = $conn->query("SELECT * FROM lisa_materials WHERE sku = '$sku'")->fetch_assoc();

if ($changes == "true" && $existingMaterial) {
    // Виконуємо UPDATE запит, оскільки changes == true і матеріал існує
    $sql = "UPDATE lisa_materials SET category = '$category', name = '$name', size = '$size', price = '$price', analogs = '$analogs', count = '$qty', placement = '$place'";
    if (!empty($targetFileDb)) {
        $sql .= ", image = '$targetFileDb'";
    }
    $sql .= " WHERE sku = '$sku'";
    $result = $conn->query($sql);

    if ($result) {
        $response['success'] = "Матеріал оновлений.";
    } else {
        $response['error'] = "Помилка при оновленні матеріалу: " . $conn->error;
    }
} elseif ($changes == "false" && $existingMaterial) {
    // Видаємо помилку, оскільки changes == false і матеріал вже існує
    $response['error'] = "Матеріал з SKU '$sku' вже існує.";
} else {
    // Виконуємо INSERT запит, оскільки матеріал не існує
    $sql = "INSERT INTO lisa_materials (category, sku, name, size, price, analogs, count, placement, image) VALUES ('$category', '$sku', '$name', '$size', '$price', '$analogs', '$qty', '$place', '$targetFileDb')";

    if ($conn->query($sql) === TRUE) {
        $response['success'] = "Матеріал доданий!";
    } else {
        $response['error'] = "Помилка при додаванні матеріалу: " . $conn->error;
    }
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
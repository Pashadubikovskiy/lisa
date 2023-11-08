<?php
require_once('db_connect.php');

// Отримання даних з POST-запиту
$category = $_POST["receptCategory"];
$receptId = $_POST["receptId"];
$link = $_POST["etsyLink"];
$name = $_POST["receptName"];
$comment = $_POST["comment"];
$changes = $_POST["changes"];

$targetFileDb = null; // Змінна для місцезбереження файлу (якщо файл не був змінений)

if ($_FILES["myFile"] && $_FILES["myFile"]["size"] > 0) {
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

// Перевірка наявності рецепту в базі даних
$checkSql = "SELECT id FROM recipes WHERE id = '$receptId'";
$result = $conn->query($checkSql);

$response = [];
if ($result->num_rows > 0) {
    // Рецепт існує, виконуємо UPDATE запит
    $updateSql = "UPDATE recipes SET recept_name = '$name', etsy_link = '$link', comment = '$comment'";

    if ($targetFileDb) {
        // Якщо файл був змінений, оновлюємо місцезбереження
        $updateSql .= ", image = '$targetFileDb'";
    }

    $updateSql .= ", category = '$category' WHERE id = '$receptId'";

    if ($conn->query($updateSql) === TRUE) {
        $response['success'] = "Рецепт оновлено.";
    } else {
        $response['error'] = "Помилка при оновленні рецепту: " . $conn->error;
    }
} else {
    // Рецепт не існує, виконуємо INSERT запит
    $insertSql = "INSERT INTO recipes (id, recept_name, etsy_link, comment, category";

    if ($targetFileDb) {
        // Якщо файл був змінений, додаємо місцезбереження
        $insertSql .= ", image";
    }

    $insertSql .= ") VALUES ('$receptId','$name','$link','$comment','$category'";

    if ($targetFileDb) {
        // Якщо файл був змінений, додаємо місцезбереження
        $insertSql .= ",'$targetFileDb'";
    }

    $insertSql .= ")";


    if ($conn->query($insertSql) === TRUE) {

        $response['success'] = "Рецепт доданий.";
    } else {
        $response['error'] = "Помилка при додаванні рецепту: " . $conn->error;
    }
}
    // SQL-запрос для выбора рецепта по ID
// Отримання всіх рецептів з таблиці
$sql_recipes = "SELECT * FROM recipes";
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

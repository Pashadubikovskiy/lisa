<?php
require_once('db_connect.php');

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання з базою даних: " . $conn->connect_error);
}

// Отримання значень з POST-запиту
$recipeId = isset($_POST["recipeId"]) ? $_POST["recipeId"] : null;
$componentsJSON = isset($_POST["components"]) ? $_POST["components"] : null;

// Декодування JSON-рядка в масив
$components = json_decode($componentsJSON, true);

// Перевірка чи були успішно декодовані компоненти
if (is_array($components)) {
    // Проходження через кожен компонент та додавання його до бази даних

    foreach ($components as $component) {
        $original = $component['original'];
        $replacement1 = $component['replacement1'];
        $replacement1Count = $component['replacementCount1'];


        if ($original) {
            $sql = "INSERT INTO recipe_materials (recipe_id, material_sku, material_count) VALUES ('$recipeId', '$original', '$originalCount')";

            if ($replacement1) {
                $sql1 = "INSERT INTO material_replacements (recipe_id, material_sku, is_original, original_sku, material_count) VALUES ('$recipeId', '$replacement1', '0', '$original', '$replacement1Count')";
                try {
                    $conn->query($sql1);
                } catch (Exception $e) {
                    // Обробка помилки, якщо запит не вдалося виконати
                    echo "Помилка при додаванні заміни 1: " . $e->getMessage();
                }
            }
        }
    }
    // Всі SQL запити відпрацювали
    // echo "Матеріали були успішно додані до рецепта.";
} else {
    echo "Помилка: Недостатньо даних для додавання матеріалів до рецепта.";
}


// Закриття з'єднання з базою даних
$conn->close();
?>

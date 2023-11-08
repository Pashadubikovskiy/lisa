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
        $originalCount = $component['originalCount'];
        $replacement1 = $component['replacement1'];
        $replacement1Count = $component['replacementCount1'];
        $replacement2 = $component['replacement2'];
        $replacement2Count = $component['replacementCount2'];


        if ($original) {
            $sql = "INSERT INTO recipe_materials (recipe_id, material_sku, material_count) VALUES ('$recipeId', '$original', '$originalCount')";

            try {
                $conn->query($sql);
            } catch (Exception $e) {
                // Обробка помилки, якщо запит не вдалося виконати
                $response['error'] = "Помилка при додаванні оригінального матеріалу: " . $e->getMessage();
            }

            if ($replacement1) {
                $sql1 = "INSERT INTO material_replacements (recipe_id, material_sku, is_original, original_sku, material_count) VALUES ('$recipeId', '$replacement1', '0', '$original', '$replacement1Count')";
                try {
                    $conn->query($sql1);
                } catch (Exception $e) {
                    // Обробка помилки, якщо запит не вдалося виконати
                    $response['error'] = "Помилка при додаванні заміни 1: " . $e->getMessage();
                }
            }
            if ($replacement2) {
                $sql2 = "INSERT INTO material_replacements (recipe_id, material_sku, is_original, original_sku, material_count) VALUES ('$recipeId', '$replacement2', '0', '$original', '$replacement2Count')";
                try {
                    $conn->query($sql2);
                } catch (Exception $e) {
                    // Обробка помилки, якщо запит не вдалося виконати
                    $response['error'] = "Помилка при додаванні заміни 2: " . $e->getMessage();
                }
            }
        }
    }
    // Всі SQL запити відпрацювали



    // Получение ID рецепта из POST-запроса
    $id = $recipeId;

// SQL-запрос для выбора рецепта по ID
    $sql_recipe = "SELECT * FROM recipes WHERE id = $id";
    $result_recipe = $conn->query($sql_recipe);

// SQL-запрос для выбора материалов рецепта по ID
    $sql_materials = "SELECT * FROM recipe_materials WHERE recipe_id = $id";
    $result_recipe_materials = $conn->query($sql_materials);

// SQL-запрос для выбора материалов рецепта по ID
    $sql_replacements = "SELECT * FROM material_replacements WHERE recipe_id = $id";
    $result_materials_replacements = $conn->query($sql_replacements);

    $response = [];

    if ($result_recipe === false || $result_recipe_materials === false || $result_materials_replacements === false) {
// Обработка ошибок в запросах к базе данных
        $response['error'] = "Помилка бази даних";
    } else {
        if ($result_recipe->num_rows > 0) {
// Если рецепт с указанным ID найден, добавляем его в ответ
            $row_recipe = $result_recipe->fetch_assoc();
            $response['recipe'] = $row_recipe;
        } else {
            $response['recipe'] = [];
        }

        if ($result_recipe_materials->num_rows > 0) {
// Если материалы для рецепта найдены, добавляем их в ответ
            $materials = [];
            while ($row_material = $result_recipe_materials->fetch_assoc()) {
                $sku = $row_material['material_sku'];
                $sql_material = "SELECT * FROM lisa_materials WHERE sku = '$sku'";
                $result_material = $conn->query($sql_material);

                while ($row_mat = $result_material->fetch_assoc()) {
                    $materials[] = array_merge($row_material, $row_mat);
                }
            }
            $response['recipe_materials'] = $materials;
        } else {
            $response['recipe_materials'] = [];
        }

        if ($result_materials_replacements->num_rows > 0) {
// Если материалы для рецепта найдены, добавляем их в ответ
            $replacements = [];
            while ($row_replacement = $result_materials_replacements->fetch_assoc()) {
                $sku = $row_replacement['material_sku'];
                $sql_material = "SELECT * FROM lisa_materials WHERE sku = '$sku'";
                $result_material = $conn->query($sql_material);

                while ($row_mat = $result_material->fetch_assoc()) {
                    $replacements[] = array_merge($row_replacement, $row_mat);
                }
            }
            $response['materials_replacements'] = $replacements;
        } else {
            $response['materials_replacements'] = [];
        }
    }

// Возвращаем ответ как JSON
    echo json_encode($response);
} else {
    echo "Помилка: Недостатньо даних для додавання матеріалів до рецепта.";
}


// Закриття з'єднання з базою даних
$conn->close();
?>

<?php
require_once('db_connect.php');

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение ID рецепта из POST-запроса
$id = $_POST['id'];

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
    $response['error'] = "Ошибка при выполнении запроса к базе данных.";
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

// Закрытие соединения с базой данных
$conn->close();
?>

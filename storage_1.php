<?php
require_once('components/login-check.php');
require('components/header.php');
echo  insertHeader('storage_1');
require ('requests/db_connect.php');
$sql_materials = "SELECT 
            COUNT(*) as total_count,
            SUM(CASE WHEN count >= 100 THEN 1 ELSE 0 END) as count_ge_100,
            SUM(CASE WHEN count < 100 AND count > 10 THEN 1 ELSE 0 END) as count_lt_100_gt_10,
            SUM(CASE WHEN count <= 10 THEN 1 ELSE 0 END) as count_le_10
        FROM lisa_materials";

// Виконання SQL-запиту
$result = $conn->query($sql_materials);


if ($result === false) {
    die("Помилка виконання запиту: " . $conn->error);
}
// Отримання результату
$row = $result->fetch_assoc();
?>
<div class="page page--storage-1">
    <a href="materials.php" class="btn-back">
        ← До матеріалів
    </a>
    <div class="page__container">
        <div class="storage-content">
            <div class="storage-content__title">
                Всього наявних матеріалів:
                <span class="storage-content__title-inner"><?php echo $row['total_count'];?></span>
            </div>
            <div class="storage-content__row">
                <div class="storage-content__text">Зелених (>100)</div>
                <div class="storage-content__number"><?php echo $row['count_ge_100'];?></div>
            </div>
            <div class="storage-content__row">
                <div class="storage-content__text">Жовтих (<100)</div>
                <div class="storage-content__number"><?php echo $row['count_lt_100_gt_10'];?></div>
            </div>
            <div class="storage-content__row">
                <div class="storage-content__text">Червоних (<10)</div>
                <div class="storage-content__number"><?php echo $row['count_le_10'];?></div>
            </div>
            <a class="storage-content__btn storage-content__btn--save" href="storage_2.php">сформувати</a>
        </div>
    </div>
</div>
<?php
require('components/footer.php');
?>
<?php
require_once('components/login-check.php');
require('components/header.php');
echo  insertHeader('storage_2');
require ('requests/db_connect.php');
$sql_l100 = "SELECT * FROM lisa_materials WHERE (count > 10 AND count < 100)";
$sql_l10 = "SELECT * FROM lisa_materials WHERE count <= 10";

// Виконання SQL-запиту
$result_l100 = $conn->query($sql_l100);
$result_l10 = $conn->query($sql_l10);



if ($result_l100 === false) {
    die("Помилка виконання запиту: " . $conn->error);
}
if ($result_l10 === false) {
    die("Помилка виконання запиту: " . $conn->error);
}
?>


<div class="page page--storage-2">
    <a href="materials.php" class="btn-back">
        ← До матеріалів
    </a>
    <div class="page__container">
        <div class="storage-creating">
            <div class="storage-creating__col storage-creating__col--red">
                <div class="storage-creating__title">
                    Червоних (<10)
                </div>
                <div class="storage-creating__table storage-creating-table" id="storage-creating-table--1">
                    <?php
                    while ($row = $result_l10->fetch_assoc()) {
                        echo '<div class="storage-creating-table__row">';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--1">' . $row['sku'] . '</div>';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--2"><img src="' . $row['image'] . '" alt="' . $row['name'] . '" class="material-table__img open-image"></div>';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--3">' . $row['name'] . '</div>';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--4">' . $row['size'] . ' см.</div>';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--5">' . $row['count'] . ' од.</div>';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--6">';
                        echo '<button class="btn-delete">X</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <button class="storage-creating__btn storage-creating__btn--save" id="download_1">
                    завантажити
                </button>
            </div>
            <div class="storage-creating__col storage-creating__col--yellow">
                <div class="storage-creating__title">
                    Жовтих (<100)
                </div>
                <div class="storage-creating__table storage-creating-table" id="storage-creating-table--2">
                    <?php
                    while ($row = $result_l100->fetch_assoc()) {
                        echo '<div class="storage-creating-table__row">';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--1">' . $row['sku'] . '</div>';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--2"><img src="' . $row['image'] . '" alt="' . $row['name'] . '" class="material-table__img open-image"></div>';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--3">' . $row['name'] . '</div>';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--4">' . $row['size'] . ' см.</div>';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--5">' . $row['count'] . ' од.</div>';
                        echo '<div class="storage-creating-table__col storage-creating-table__col--6">';
                        echo '<button class="btn-delete">X</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <button class="storage-creating__btn storage-creating__btn--save" id="download_2">
                    завантажити
                </button>
            </div>
        </div>
    </div>
</div>
<div class="overlay">
    <div class="overlay__container">
        <button class="overlay__close">X</button>
        <img src="img/img-material.jpg" alt="Зображення матеріалу">
    </div>
</div>

<?php
require('components/footer.php');
?>
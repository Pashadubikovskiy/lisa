<?php
require_once('components/login-check.php');
require('components/header.php');
echo  insertHeader('analitic-materials');
require ('requests/db_connect.php');
// SQL-запрос для выбора всех категорий
$sql_categories = "SELECT * FROM lisa_categories";
$result = $conn->query($sql_categories);
$sql_delete_old_records = "DELETE FROM lisa_materials_use WHERE date < DATE_SUB(NOW(), INTERVAL 30 DAY)";

// Виконання SQL-запиту на видалення
$conn->query($sql_delete_old_records);
?>
<div class="page page--analitics">
    <div class="page__sidebar">
        <div class="page__name">
            Аналітика матеріалів
        </div>
        <ul class="page__categories">
            <?php
            // Проверка наличия результатов
            $isFirstCategory = true;
            if ($result->num_rows > 0) {
                // Вывод данных
                while ($row = $result->fetch_assoc()) { ?>
                    <li class="page__category page-category">
                        <a href="#" class="page-category__link<?php if ($isFirstCategory) echo ' page-category__link--is-active'; ?>" data-id="<?php echo $row["id"];?>"><?php echo $row["name"];?></a>
                    </li>
                    <?php
                    $isFirstCategory = false;
                }
            } else {
                echo "Немає категорій.";
            }
            ?>
        </ul>
        <div class="page__burger burger">
            <button class="burger__btn">
                меню
            </button>
            <div class="burger__menu burger-menu">
                <button class="burger-menu__close">X</button>
                <ul class="burger-menu__list burger-menu-list">
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="materials.php" class="burger-menu-list-item__link">
                            матеріали
                        </a>
                    </li>
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="storage_1.php" class="burger-menu-list-item__link">
                            склад
                        </a>
                    </li>
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="recepts.php" class="burger-menu-list-item__link">
                            рецепти
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page__content page__content--analitics analitics">
        <div class="analitics__search analitics-search">
            <input type="text" class="analitics-search__input" name="analitics-search__input" placeholder="назва, артикул...">
        </div>
        <div class="analitics-table__header">
            <div class="analitics-table__col analitics-table__col--1"></div>
            <div class="analitics-table__col analitics-table__col--2"></div>
            <div class="analitics-table__col analitics-table__col--3"></div>
            <div class="analitics-table__col analitics-table__col--4"></div>
            <div class="analitics-table__col analitics-table__col--5"></div>
            <div class="analitics-table__col analitics-table__col--6 analitics-table__col--qty"></div>
            <div class="analitics-table__col analitics-table__col--7" style="padding: 10px 0">загальна сума, грн</div>
            <div class="analitics-table__col analitics-table__col--8 analitics-table__col--qty" style="padding: 10px 0">оборот за 30 дн., раз</div>
        </div>
        <div class="analitics__table analitics-table">
            <?php
            $sql_materials = "SELECT * FROM lisa_materials";
            $result2 = $conn->query($sql_materials);
            ?>

            <div class="analitics-table__body">
                <?php
                // Перевірка наявності результатів
                $isFirstCategory = true;
                if ($result2->num_rows > 0) {
                    // Вивід даних
                    while ($row = $result2->fetch_assoc()) {
                        // Отримання кількості використань матеріалу за останні 30 днів
                        $materialID = $row["sku"];
                        $today = date("Y-m-d");
                        $thirtyDaysAgo = date("Y-m-d", strtotime("-30 days"));
                        $usationCount = 0; // За замовчуванням 0
                        $totalUsation = 0; // За замовчуванням 0

                        $sql_usage = "SELECT COUNT(*) as usation_count, SUM(usation) as total_usation FROM lisa_materials_use WHERE sku = '$materialID' AND date BETWEEN '$thirtyDaysAgo' AND '$today'";
                        $result_usage = $conn->query($sql_usage);

                        if ($result_usage->num_rows > 0) {
                            $row_usage = $result_usage->fetch_assoc();
                            $totalUsation = $row_usage["total_usation"];
                        }
                        ?>
                        <div class="analitics-table__row <?php if (($row["count"] > 10 && $row["count"] < 100)) {
                            echo 'analitics-table__row--yellow';
                        } elseif (($row["count"] > 0 && $row["count"] < 10)) {
                            echo 'analitics-table__row--red';
                        } elseif (($row["count"] == 0)) {
                            echo 'analitics-table__row--empty';
                        } ?>">
                            <div class="analitics-table__col analitics-table__col--1"><?php echo $row["sku"]; ?></div>
                            <div class="analitics-table__col analitics-table__col--2"><img src="<?php echo $row["image"]; ?>"
                                                                                           alt="<?php echo $row["name"]; ?>"
                                                                                           class="analitics-table__img open-image"></div>
                            <div class="analitics-table__col analitics-table__col--3"><?php echo $row["name"]; ?></div>
                            <div class="analitics-table__col analitics-table__col--4"><?php echo $row["size"]; ?> см</div>
                            <div class="analitics-table__col analitics-table__col--5"><?php echo $row["placement"]; ?></div>
                            <div class="analitics-table__col analitics-table__col--6 analitics-table__col--qty"><?php echo $row["count"]; ?>
                                од.
                            </div>
                            <div class="analitics-table__col analitics-table__col--7"><?php echo ($row["count"] * $row["price"]); ?>
                                грн.
                            </div>
                            <div class="analitics-table__col analitics-table__col--8"><span class="usage-count" style="margin-right: 4px;"><?php echo 0 + $totalUsation; ?></span> од.
                            </div>
                        </div>
                        <?php
                    }

                    $isFirstCategory = false;
                } else {
                    echo "Немає матеріалів.";
                }
                ?>
            </div>

        </div>
        </div>
    </div>
</div>

    <div class="overlay overlay-photo">
        <div class="overlay__container">
            <button class="overlay__close">X</button>
            <img src="img/img-material.jpg" alt="Зображення матеріалу">
        </div>
    </div>
<?php
require('components/footer.php');
?>
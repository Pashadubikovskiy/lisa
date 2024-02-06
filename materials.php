<?php
require_once('components/login-check.php');
require('components/header.php');
echo insertHeader('materials');

require ('requests/db_connect.php');
// SQL-запрос для выбора всех категорий
$sql_categories = "SELECT * FROM lisa_categories";
$sql_materials = "SELECT * FROM lisa_materials";
$result = $conn->query($sql_categories);
?>
<div class="page page--materials">
    <div class="page__sidebar">
        <div class="page__name">
            База матеріалів
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
                        <a href="#" class="burger-menu-list-item__link burger-menu-list-item__link--categories">
                            категорії
                        </a>
                    </li>
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="#" class="burger-menu-list-item__link burger-menu-list-item__link--new-material">
                            додати новий матеріал
                        </a>
                    </li>
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="storage_1.php" class="burger-menu-list-item__link">
                            склад
                        </a>
                    </li>
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="analitic_materials.php" class="burger-menu-list-item__link">
                            аналітика
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
    <div class="page__content page__content--materials materials">
        <div class="materials__search materials-search">
            <input type="text" class="materials-search__input" name="materials-search__input" placeholder="назва, артикул...">
        </div>
        <div class="materials__table materials-table">
            <?php
            $result2 = $conn->query($sql_materials);
            ?>
            <div class="materials-table__body">

            </div>
        </div>
    </div>
</div>
<?php require('components/new_material.php'); ?>
<?php require('components/categories.php'); ?>
<?php require('components/recept_loaded.php'); ?>

    <div class="overlay overlay-photo">
        <div class="overlay__container">
            <button class="overlay__close">X</button>
            <img src="img/img-material.jpg" alt="Зображення матеріалу">
        </div>
    </div>
<?php
require('components/footer.php');
?>
<?php
require_once('components/login-check.php');
require('components/header.php');
echo  insertHeader('recepts');

require ('requests/db_connect.php');
$sql_categories = "SELECT * FROM lisa_recept_categories";
$sql_recipes = "SELECT * FROM recipes";
$result = $conn->query($sql_categories);
?>
<div class="page page--recepts">
    <div class="page__sidebar">
        <div class="page__name">
            Рецепти
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
                        <a href="#" class="burger-menu-list-item__link burger-menu-list-item__link--new-recept">
                            додати новий рецепт
                        </a>
                    </li>
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
                        <a href="analitic_materials.php" class="burger-menu-list-item__link">
                            аналітика
                        </a>
                    </li>
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="author_recept.php" class="burger-menu-list-item__link">
                            авторський рецепт
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page__content page__content--recepts recepts">
        <div class="recepts__search recepts-search">
            <input type="text" class="recepts-search__input" name="recepts-search__input" placeholder="назва">
        </div>
        <div class="recepts__table recepts-table">
            <?php
            $result2 = $conn->query($sql_recipes);
            ?>
            <div class="recepts-table__body">

            </div>
        </div>
    </div>
</div>

<?php require('components/recepts_categories.php'); ?>
<?php require('components/new_recept.php'); ?>
<?php require('components/opened_recept.php'); ?>
<?php require('components/change_recept.php'); ?>
<?php require('components/new_component_to_recept.php'); ?>
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
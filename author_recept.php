<?php
require_once('components/login-check.php');
require('components/header.php');
echo  insertHeader('author_recept');
require ('requests/db_connect.php');

$sql_materials = "SELECT * FROM lisa_materials";
$result2 = $conn->query($sql_materials);
?>
<div class="page page--author-recept">
    <a href="recepts.php" class="btn-back">
        ← До рецептів
    </a>
    <form class="page-form author-recept">
        <div class="author-recept__sidebar">
            <div class="author-recept__name">
                Авторська композиця
            </div>
            <ul class="author-recept__links">
                <li class="author-recept__link author-recept-link">
                    <a href="#" class="author-recept-link__label">
                        на головну
                    </a>
                </li>
                <li class="author-recept__link author-recept-link">
                    <a href="#" class="author-recept-link__label component-form author-recept-link__label--plus">
                        додати новий компонент
                    </a>
                </li>
            </ul>
            <button class="author-recept__btn author-recept__btn--save">завантажити</button>
        </div>
        <div class="author-recept__table author-recept-table">
            <div class="author-recept-table__body">

            </div>
        </div>
    </form>
</div>
    <div class="overlay overlay-component">
        <div class="overlay__container">
            <button class="overlay__close">X</button>
            <form class="new-component new-component-author">
                <h2 class="new-component__title">введіть назву або артикул</h2>
                <div class="new-component__row">
                    <label class="new-component__label">
                        матеріал
                        <input type="text" placeholder="..." class="new-component__input" list="materials-list" id="original" name="original">

                        <input type="number" placeholder="кількість" class="new-component__input" id="original-count" name="original-count">

                        <datalist id="materials-list">
                            <?php
                            if ($result2->num_rows > 0) {
                                // Вывод данных
                                while ($row = $result2->fetch_assoc()) { ?>
                                    <option value="<?php echo $row["sku"];?>"><?php echo $row["name"];?></option>
                                    <?php
                                    $isFirstCategory = false;
                                }
                            }
                            ?>
                        </datalist>
                    </label>
                </div>
                <input type="submit" value="Додати" class="new-component__btn">
            </form>
        </div>
    </div>
    <div class="overlay overlay-photo">
        <div class="overlay__container">
            <button class="overlay__close">X</button>
            <img src="img/img-material.jpg" alt="Зображення матеріалу">
        </div>
    </div>
<?php require('components/recept_loaded.php'); ?>
<?php
require('components/footer.php');
?>
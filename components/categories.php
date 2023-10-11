<?php

$sql_categories = "SELECT * FROM lisa_categories";
$result = $conn->query($sql_categories);
?>
<div class="page page--categories">
    <div class="page__container">
        <h1>Категорії матеріалів</h1>
        <ul class="categories">
            <?php
            // Проверка наличия результатов
            if ($result->num_rows > 0) {
                // Вывод данных
                while ($row = $result->fetch_assoc()) { ?>
                    <li>
                        <div class="categories__item" data-id="<?php echo $row["id"];?>">
                            <span class="categories__item-name">
                                <?php echo $row["name"];?>
                            </span>
                            <button class="btn btn--edit">
                                редагувати
                            </button>
                        </div>
                    </li>
                    <?php
                }
            } else {
                echo "Немає категорій.";
            }
            ?>
        </ul>
        <button class="btn btn--save">додати нову категорію</button>
        <form class="page__form page-form page-form--new-category">
            <button class="btn--close" type="button">X</button>
            <div class="page-form__col">
                <h2>Категорія:</h2>
                <div class="page-form__row">
                    <label class="page-form__label">
                        назва
                        <input type="text" class="page-form__input" id="new-category" name="new-category">
                    </label>
                    <input type="hidden" id="changes-category" name="changes-category">
                </div>
                <button class="page-form__btn page-form__btn--save" type="submit">зберегти</button>
            </div>
        </form>
    </div>

    <button class="page__close">X</button>
</div>
<link rel="stylesheet" href="scss/change_recept.css">
<?php
$sql_recept_categories = "SELECT * FROM lisa_recept_categories";
$result = $conn->query($sql_categories);
?>
<div class="page page--change-recept">
    <form class="page-form change-recept">
        <div class="change-recept__sidebar">
            <input type="text" placeholder="Ввведіть назву..." class="change-recept__input change-recept__input--name" name="receptname" id="receptname">
            <div class="change-recept__photo drop-zone drop-zone--change-recept">
                <span class="drop-zone__prompt">додати фото</span>
                <input type="file" name="myFile" id="myFile" class="drop-zone__input">
            </div>
            <select name="recept-category" id="recept-category" class="page-form__select">
                <?php
                if ($result->num_rows > 0) {
                    // Вывод данных
                    while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <button class="change-recept__btn change-recept__btn--save">зберегти</button>

            <div class="change-recept__row">
                <label class="change-recept__label">
                    etsy
                    <input type="text" class="change-recept__input" name="etsy-link" id="etsy-link">
                </label>
            </div>
            <textarea class="change-recept__textarea recept-textarea" placeholder="Коментар..." name="comment" id="comment"></textarea>

            <ul class="change-recept__links">
                <li class="change-recept__link change-recept-link">
                    <a href="#" class="change-recept-link__label">
                        на головну
                    </a>
                </li>
                <li class="change-recept__link change-recept-link">
                    <a href="#" class="change-recept-link__label delete-recept-change">
                        видалити
                    </a>
                </li>
                <li class="change-recept__link change-recept-link">
                    <a href="#" class="change-recept-link__label change-recept-link__label--plus change-recept-link__label--form component-form">
                        додати новий компонент
                    </a>
                </li>
                <li class="change-recept__link change-recept-link">
                    <a href="#" class="change-recept-link__label change-recept-link__label--plus replacement-form">
                        додати нову заміну
                    </a>
                </li>
            </ul>
        </div>
        <div class="change-recept__table change-recept-table">
            <div class="change-recept-table__body">

            </div>
        </div>
    </form>

    <button class="page__close">X</button>
</div>

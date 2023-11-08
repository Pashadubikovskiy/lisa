<link rel="stylesheet" href="scss/new_recept.css">
<?php
$sql_recept_categories = "SELECT * FROM lisa_recept_categories";
$result = $conn->query($sql_categories);
$sql = "SELECT MAX(id) + 1 AS new_id FROM recipes";
$result3 = $conn->query($sql);
if ($result3) {
    $row = $result3->fetch_assoc();
    $new_id = $row['new_id'];
    if (!$new_id) {
        $new_id = 1;
    }
    echo "Новий id: $new_id";
} else {
    $new_id = 1;
}
?>
<div class="page page--new-recept">
    <form class="page-form new-recept">
        <div class="new-recept__sidebar">
            <input type="hidden" value="<?php echo $new_id;?>" name="recept-id" id="recept-id">
            <input type="hidden" value="false" id="clicked">
            <input type="text" placeholder="Ввведіть назву..." class="new-recept__input new-recept__input--name" name="receptname" id="receptname">
            <div class="new-recept__photo drop-zone drop-zone--new-recept">
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
            <button class="new-recept__btn new-recept__btn--save">зберегти</button>

            <div class="new-recept__row">
                <label class="new-recept__label">
                    etsy
                    <input type="text" class="new-recept__input" name="etsy-link" id="etsy-link">
                </label>
            </div>
            <textarea class="new-recept__textarea recept-textarea" placeholder="Коментар..." name="comment" id="comment"></textarea>

            <ul class="new-recept__links">
                <li class="new-recept__link new-recept-link">
                    <a href="#" class="new-recept-link__label">
                        на головну
                    </a>
                </li>
                <li class="new-recept__link new-recept-link">
                    <a href="#" class="new-recept-link__label delete-recept-new">
                        видалити
                    </a>
                </li>
                <li class="new-recept__link new-recept-link">
                    <a href="#" class="new-recept-link__label new-recept-link__label--plus new-recept-link__label--form component-form">
                        додати новий компонент
                    </a>
                </li>
                <li class="new-recept__link new-recept-link">
                    <a href="#" class="new-recept-link__label new-recept-link__label--plus replacement-form">
                        додати нову заміну
                    </a>
                </li>
            </ul>
        </div>
        <div class="new-recept__table new-recept-table">
            <div class="new-recept-table__body">
                <div class="new-recept-table__row new-recept-table__row--empty">
                    <div class="new-recept-table__col new-recept-table__col--1">артикул</div>
                    <div class="new-recept-table__col new-recept-table__col--2"></div>
                    <div class="new-recept-table__col new-recept-table__col--3">назва</div>
                    <div class="new-recept-table__col new-recept-table__col--4">розмір</div>
                    <div class="new-recept-table__col new-recept-table__col--5">кількість</div>
                    <div class="new-recept-table__col new-recept-table__col--6">місце</div>
                    <div class="new-recept-table__col new-recept-table__col--7">
                        <button class="btn-delete">
                            X
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <button class="page__close">X</button>
</div>
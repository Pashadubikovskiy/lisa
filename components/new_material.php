<link rel="stylesheet" href="scss/new_material.css">
<?php

$sql_materials = "SELECT * FROM lisa_materials";
$result2 = $conn->query($sql_materials);

$sql_categories = "SELECT * FROM lisa_categories";
$result = $conn->query($sql_categories);
?>
<div class="page page--new-material">
    <div class="page__container">
        <form class="page__form page-form page-form--new-material">
            <div class="page-form__col">
                <select name="category" id="category" class="page-form__select">
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
                <div class="page-form__photo drop-zone">
                    <span class="drop-zone__prompt">додати фото</span>
                    <input type="file" name="myFile" id="myFile" class="drop-zone__input">
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        заміна
                        <input type="text" class="page-form__input" list="materials-list" id="analogs" name="analogs">

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
                <button class="page-form__btn page-form__btn--save" type="submit">зберегти</button>
                <button class="page-form__btn page-form__btn--delete" type="button">видалити</button>
            </div>

            <div class="page-form__col">
                <div class="page-form__row">
                    <label class="page-form__label">
                        артикул
                        <input type="text" class="page-form__input" name="sku" id="sku">
                    </label>
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        повна назва
                        <input type="text" class="page-form__input" name="materialname" id="materialname">
                    </label>
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        розмір (см)
                        <input type="number" class="page-form__input" name="size" id="size">
                    </label>
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        ціна (грн)
                        <input type="number" class="page-form__input" name="price" id="price">
                    </label>
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        повна кількість (од.)
                        <input type="number" class="page-form__input" name="qty" id="qty">
                    </label>
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        місцезнаходження в офісі
                        <input type="text" class="page-form__input" name="place" id="place">
                    </label>
                </div>
                <input type="hidden" id="changes" name="changes">
            </div>
        </form>
    </div>

    <button class="page__close">X</button>
</div>
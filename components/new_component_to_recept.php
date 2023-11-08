<?php
$sql_materials = "SELECT * FROM lisa_materials";
$result2 = $conn->query($sql_materials);
?>
<div class="overlay overlay-component">
    <div class="overlay__container">
        <button class="overlay__close">X</button>
        <form class="new-component new-component-form">
            <h2 class="new-component__title">введіть назву або артикул</h2>
            <div class="new-component__row">
                <label class="new-component__label">
                    головний
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
            <div class="new-component__row">
                <label class="new-component__label">
                    заміна 1
                    <input type="text" placeholder="..." class="new-component__input" list="materials-list" id="replacement-1" name="replacement-1">
                    <input type="number" placeholder="кількість" class="new-component__input" id="replacement-1-count" name="replacement-1-count">
                </label>
            </div>
            <div class="new-component__row">
                <label class="new-component__label">
                    заміна 2
                    <input type="text" placeholder="..." class="new-component__input" list="materials-list" id="replacement-2" name="replacement-2">
                    <input type="number" placeholder="кількість" class="new-component__input" id="replacement-2-count" name="replacement-2-count">
                </label>
            </div>
            <input type="submit" value="Додати" class="new-component__btn">
        </form>
    </div>
</div>
<div class="overlay overlay-replacement">
    <div class="overlay__container">
        <button class="overlay__close">X</button>
        <form class="new-component">
            <h2 class="new-component__title">введіть назву або артикул</h2>
            <div class="new-component__row">
                <label class="new-component__label">
                    Доданий оригінал
                    <input type="text" placeholder="..." class="new-component__input" list="contains-materials-list" id="original" name="original">
                    <datalist id="contains-materials-list"></datalist>
                </label>
            </div>
            <div class="new-component__row">
                <label class="new-component__label">
                    Заміна
                    <input type="text" placeholder="..." class="new-component__input" list="materials-list" id="replacement-1" name="replacement-1">
                    <input type="number" placeholder="кількість" class="new-component__input" id="replacement-1-count" name="replacement-1-count">
                </label>
            </div>
            <input type="submit" value="Додати" class="new-component__btn">
        </form>
    </div>
</div>
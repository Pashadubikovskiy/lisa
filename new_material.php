<?php
require_once('login-check.php');
require('header.php');
echo  insertHeader('new_material');
?>
<div class="page page--new-material">
    <div class="page__container">
        <form class="page__form page-form">
            <div class="page-form__col">
                <select name="category" id="category" class="page-form__select">
                    <option value="0">головки квітів текстильні</option>
                    <option value="1">головки квітів текстильні</option>
                    <option value="2">головки квітів текстильні</option>
                    <option value="3">головки квітів текстильні</option>
                </select>
                <div class="page-form__photo drop-zone">
                    <span class="drop-zone__prompt">додати фото</span>
                    <input type="file" name="myFile" class="drop-zone__input">
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        заміна
                        <input type="text" class="page-form__input"list="materials-list">
                        <datalist id="materials-list">
                            <option value="Chocolate">
                            <option value="Coconut">
                            <option value="Mint">
                            <option value="Strawberry">
                            <option value="Vanilla">
                        </datalist>
                    </label>
                </div>
                <button class="page-form__btn page-form__btn--save">зберегти</button>
                <button class="page-form__btn page-form__btn--delete">видалити</button>
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
                        <input type="text" class="page-form__input" name=" name" id=" name">
                    </label>
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        розмір
                        <input type="text" class="page-form__input" name="size" id="size">
                    </label>
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        ціна
                        <input type="text" class="page-form__input" name="price" id="price">
                    </label>
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        повна кількість
                        <input type="text" class="page-form__input" name="qty" id="qty">
                    </label>
                </div>
                <div class="page-form__row">
                    <label class="page-form__label">
                        місцезнаходження в офісі
                        <input type="text" class="page-form__input" name="place" id="place">
                    </label>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
require('footer.php');
?>
<?php
require_once('login-check.php');
require('components/header.php');
echo  insertHeader('opened_recept');
?>
<div class="page page--change-recept">
    <form class="page-form change-recept">
        <div class="change-recept__sidebar">
            <input type="text" placeholder="Ввведіть назву..." class="change-recept__input change-recept__input--name" value="Гребінь паперово-бордовий">
            <div class="change-recept__photo drop-zone drop-zone--change-recept" style="background-image: url('img/flower1.png');">
<!--                <span class="drop-zone__prompt">додати фото</span>-->
                <input type="file" name="myFile" class="drop-zone__input" value="">
            </div>
            <button class="change-recept__btn change-recept__btn--save">зберегти</button>

            <div class="change-recept__row">
                <label class="change-recept__label">
                    etsy
                    <input type="text" class="change-recept__input" name="sku" id="sku" value="https://www.google.com/ur">
                </label>
            </div>
            <textarea class="change-recept__textarea recept-textarea" placeholder="Коментар..."></textarea>

            <ul class="change-recept__links">
                <li class="change-recept__link change-recept-link">
                    <a href="#" class="change-recept-link__label">
                        назад до рецептів
                    </a>
                </li>
                <li class="change-recept__link change-recept-link">
                    <a href="#" class="change-recept-link__label">
                        на головну
                    </a>
                </li>
                <li class="change-recept__link change-recept-link">
                    <a href="#" class="change-recept-link__label">
                        редагувати
                    </a>
                </li>
                <li class="change-recept__link change-recept-link">
                     <a href="#" class="change-recept-link__label">
                        видалити
                    </a>
                </li>
            </ul>
        </div>
        <div class="change-recept__table change-recept-table">
            <div class="change-recept-table__body">
                <div class="change-recept-table__row">
                    <div class="change-recept-table__col change-recept-table__col--1">АА01</div>
                    <div class="change-recept-table__col change-recept-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="change-recept-table__img open-image">
                    </div>
                    <div class="change-recept-table__col change-recept-table__col--3">
                        <select name="variables_1" id="variables_1" class="variables-materials">
                            <option value="a001" selected>ранункулюс болотний</option>
                            <option value="a002" disabled>ранункулюс інший</option>
                            <option value="a003">ранункулюс інший</option>
                        </select>
                    </div>
                    <div class="change-recept-table__col change-recept-table__col--4">3 см</div>
                    <div class="change-recept-table__col change-recept-table__col--5">9 од.</div>
                    <div class="change-recept-table__col change-recept-table__col--6">F112</div>
                    <div class="change-recept-table__col change-recept-table__col--7">
                        <label class="checkbox-container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="change-recept-table__row">
                    <div class="change-recept-table__col change-recept-table__col--1">АА01</div>
                    <div class="change-recept-table__col change-recept-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="change-recept-table__img open-image">
                    </div>
                    <div class="change-recept-table__col change-recept-table__col--3">
                        <select name="variables_2" id="variables_2" class="variables-materials">
                            <option value="a001" selected>ранункулюс болотний</option>
                            <option value="a002" disabled>ранункулюс інший</option>
                            <option value="a003">ранункулюс інший</option>
                        </select>
                    </div>
                    <div class="change-recept-table__col change-recept-table__col--4">3 см</div>
                    <div class="change-recept-table__col change-recept-table__col--5">9 од.</div>
                    <div class="change-recept-table__col change-recept-table__col--6">F112</div>
                    <div class="change-recept-table__col change-recept-table__col--7">
                        <label class="checkbox-container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="change-recept-table__row">
                    <div class="change-recept-table__col change-recept-table__col--1">АА01</div>
                    <div class="change-recept-table__col change-recept-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="change-recept-table__img open-image">
                    </div>
                    <div class="change-recept-table__col change-recept-table__col--3">
                        <select name="variables_3" id="variables_3" class="variables-materials">
                            <option value="a001" selected>ранункулюс болотний</option>
                            <option value="a002" disabled>ранункулюс інший</option>
                            <option value="a003">ранункулюс інший</option>
                        </select>
                    </div>
                    <div class="change-recept-table__col change-recept-table__col--4">3 см</div>
                    <div class="change-recept-table__col change-recept-table__col--5">9 од.</div>
                    <div class="change-recept-table__col change-recept-table__col--6">F112</div>
                    <div class="change-recept-table__col change-recept-table__col--7">
                        <label class="checkbox-container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="change-recept-table__row">
                    <div class="change-recept-table__col change-recept-table__col--1">АА01</div>
                    <div class="change-recept-table__col change-recept-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="change-recept-table__img open-image">
                    </div>
                    <div class="change-recept-table__col change-recept-table__col--3">
                        <select name="variables_4" id="variables_4" class="variables-materials">
                            <option value="a001" selected>ранункулюс болотний</option>
                            <option value="a002" disabled>ранункулюс інший</option>
                            <option value="a003">ранункулюс інший</option>
                        </select>
                    </div>
                    <div class="change-recept-table__col change-recept-table__col--4">3 см</div>
                    <div class="change-recept-table__col change-recept-table__col--5">9 од.</div>
                    <div class="change-recept-table__col change-recept-table__col--6">F112</div>
                    <div class="change-recept-table__col change-recept-table__col--7">
                        <label class="checkbox-container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="overlay">
    <div class="overlay__container">
        <button class="overlay__close">X</button>
        <img src="img/img-material.jpg" alt="Зображення матеріалу">
        <form class="new-component">
            <h2 class="new-component__title">введіть назву або артикул</h2>
            <div class="new-component__row">
                <label class="new-component__label">
                    головний
                    <input type="text" placeholder="..." class="new-component__input">
                </label>
            </div>
            <div class="new-component__row">
                <label class="new-component__label">
                    заміна 1
                    <input type="text" placeholder="..." class="new-component__input">
                </label>
            </div>
            <div class="new-component__row">
                <label class="new-component__label">
                    заміна 2
                    <input type="text" placeholder="..." class="new-component__input">
                </label>
            </div>
            <input type="submit" value="Додати" class="new-component__btn">
        </form>
    </div>
</div>
<?php
require('components/footer.php');
?>
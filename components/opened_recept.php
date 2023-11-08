<link rel="stylesheet" href="scss/opened_recept.css">
<div class="page page--select-recept">
    <form class="page-form select-recept">
        <div class="select-recept__sidebar">
            <input type="text" placeholder="Ввведіть назву..." class="select-recept__input select-recept__input--name" value="Гребінь паперово-бордовий">
            <div class="select-recept__photo drop-zone drop-zone--select-recept" style="background-image: url('img/flower1.png');">
<!--                <span class="drop-zone__prompt">додати фото</span>-->
                <input type="file" name="myFile" class="drop-zone__input" value="">
            </div>
            <button class="select-recept__btn select-recept__btn--save" disabled>Зібрати</button>

            <div class="select-recept__row">
                <label class="select-recept__label">
                    etsy
                    <input type="text" class="select-recept__input" name="sku" id="sku" value="https://www.google.com/ur">
                </label>
            </div>
            <textarea class="select-recept__textarea recept-textarea" placeholder="Коментар..."></textarea>

            <ul class="select-recept__links">
                <li class="select-recept__link select-recept-link">
                    <a href="materials.php" class="select-recept-link__label">
                        на головну
                    </a>
                </li>
                <li class="select-recept__link select-recept-link">
                    <a href="#" class="select-recept-link__label recept-change-open">
                        редагувати
                    </a>
                </li>
                <li class="select-recept__link select-recept-link">
                     <a href="#" class="select-recept-link__label recept-delete">
                        видалити
                    </a>
                </li>
            </ul>
        </div>
        <div class="select-recept__table select-recept-table">
            <div class="select-recept-table__body">
<!--                <div class="select-recept-table__row">-->
<!--                    <div class="select-recept-table__col select-recept-table__col--1">АА01</div>-->
<!--                    <div class="select-recept-table__col select-recept-table__col--2">-->
<!--                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="select-recept-table__img open-image">-->
<!--                    </div>-->
<!--                    <div class="select-recept-table__col select-recept-table__col--3">-->
<!--                        <select name="variables_1" id="variables_1" class="variables-materials">-->
<!--                            <option value="a001" selected>ранункулюс болотний</option>-->
<!--                            <option value="a002" disabled>ранункулюс інший</option>-->
<!--                            <option value="a003">ранункулюс інший</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                    <div class="select-recept-table__col select-recept-table__col--4">3 см</div>-->
<!--                    <div class="select-recept-table__col select-recept-table__col--5">9 од.</div>-->
<!--                    <div class="select-recept-table__col select-recept-table__col--6">F112</div>-->
<!--                    <div class="select-recept-table__col select-recept-table__col--7">-->
<!--                        <label class="checkbox-container">-->
<!--                            <input type="checkbox">-->
<!--                            <span class="checkmark"></span>-->
<!--                        </label>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </form>

    <button class="page__close">X</button>
</div>
<?php
require_once('login-check.php');
require('components/header.php');
echo  insertHeader('author_recept');
?>
<div class="page page--author-recept">
    <form class="page-form author-recept">
        <div class="author-recept__sidebar">
            <div class="author-recept__name">
                Авторська композиця
            </div>
            <ul class="author-recept__links">
                <li class="author-recept__link author-recept-link">
                    <a href="#" class="author-recept-link__label">
                        назад до рецептів
                    </a>
                </li>
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
                <div class="author-recept-table__row">
                    <div class="author-recept-table__col author-recept-table__col--0">
                        <label class="checkbox-container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="author-recept-table__col author-recept-table__col--1">АА01</div>
                    <div class="author-recept-table__col author-recept-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="author-recept-table__img open-image">
                    </div>
                    <div class="author-recept-table__col author-recept-table__col--3">
                        <select name="variables_1" id="variables_1" class="variables-materials">
                            <option value="a001" selected>ранункулюс болотний</option>
                            <option value="a002" disabled>ранункулюс інший</option>
                            <option value="a003">ранункулюс інший</option>
                        </select>
                    </div>
                    <div class="author-recept-table__col author-recept-table__col--4">3 см</div>
                    <div class="author-recept-table__col author-recept-table__col--5">9 од.</div>
                    <div class="author-recept-table__col author-recept-table__col--6">F112</div>
                    <div class="author-recept-table__col author-recept-table__col--7">
                        <button class="btn-delete">
                            X
                        </button>
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
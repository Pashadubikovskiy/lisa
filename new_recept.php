<?php
require_once('login-check.php');
require('header.php');
echo  insertHeader('new_recept');
?>
<div class="page page--new-recept">
    <form class="page-form new-recept">
        <div class="new-recept__sidebar">
            <input type="text" placeholder="Ввведіть назву..." class="new-recept__input new-recept__input--name">
            <div class="new-recept__photo drop-zone drop-zone--new-recept">
                <span class="drop-zone__prompt">додати фото</span>
                <input type="file" name="myFile" class="drop-zone__input">
            </div>
            <button class="new-recept__btn new-recept__btn--save">зберегти</button>

            <div class="new-recept__row">
                <label class="new-recept__label">
                    etsy
                    <input type="text" class="new-recept__input" name="sku" id="sku">
                </label>
            </div>
            <textarea class="new-recept__textarea recept-textarea" placeholder="Коментар..."></textarea>

            <ul class="new-recept__links">
                <li class="new-recept__link new-recept-link">
                    <a href="#" class="new-recept-link__label">
                        назад до рецептів
                    </a>
                </li>
                <li class="new-recept__link new-recept-link">
                    <a href="#" class="new-recept-link__label">
                        на головну
                    </a>
                </li>
                <li class="new-recept__link new-recept-link">
                    <a href="#" class="new-recept-link__label">
                        видалити
                    </a>
                </li>
                <li class="new-recept__link new-recept-link">
                    <a href="#" class="new-recept-link__label new-recept-link__label--plus new-recept-link__label--form component-form">
                        додати новий компонент
                    </a>
                </li>
                <li class="new-recept__link new-recept-link">
                    <a href="#" class="new-recept-link__label new-recept-link__label--plus">
                        додати нову заміну
                    </a>
                </li>
                <li class="new-recept__link new-recept-link">
                    <a href="#" class="new-recept-link__label new-recept-link__label--plus new-recept-link__label--add-comment recept-add-comment">
                        додати коментар
                    </a>
                </li>
            </ul>
        </div>
        <div class="new-recept__table new-recept-table">
            <div class="new-recept-table__body">
                <div class="new-recept-table__row">
                    <div class="new-recept-table__col new-recept-table__col--1">АА01</div>
                    <div class="new-recept-table__col new-recept-table__col--2"><img src="img/img-material.jpg" alt="Ранункулюс болотний" class="new-recept-table__img open-image"></div>
                    <div class="new-recept-table__col new-recept-table__col--3">ранункулюс болотний</div>
                    <div class="new-recept-table__col new-recept-table__col--4">3 см</div>
                    <div class="new-recept-table__col new-recept-table__col--5">9 од.</div>
                    <div class="new-recept-table__col new-recept-table__col--6">F112</div>
                    <div class="new-recept-table__col new-recept-table__col--7">
                        <button class="btn-delete">
                            X
                        </button>
                    </div>
                </div>
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
require('footer.php');
?>
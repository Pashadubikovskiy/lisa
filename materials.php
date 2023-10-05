<?php
require_once('login-check.php');
require('header.php');
echo  insertHeader('materials');
?>
<div class="page page--materials">
    <div class="page__sidebar">
        <div class="page__name">
            База матеріалів
        </div>
        <ul class="page__categories">
            <li class="page__category page-category">
                <a href="#" class="page-category__link page-category__link--is-active">головки квітів</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">голови великі</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">бутоньєрки</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">букети квітів</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">гілки квітів</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">паперові квіти</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">букети зелені</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">зелень гілка</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">доповнювачі</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">квіти-доповнювачі</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">ягоди</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">фрукти</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">незабудки (тичинки)</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">тичинки на нитці</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">лоза</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">золоті, блискучі</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">сукуленти</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">листя</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">сухоцвіти</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">фурнітура</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">калина в цукрі</a>
            </li>
        </ul>
        <div class="page__burger burger">
            <button class="burger__btn">
                меню
            </button>
            <div class="burger__menu burger-menu">
                <button class="burger-menu__close">X</button>
                <ul class="burger-menu__list burger-menu-list">
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="#" class="burger-menu-list-item__link">
                            додати новий
                        </a>
                    </li>
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="#" class="burger-menu-list-item__link">
                            склад
                        </a>
                    </li>
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="#" class="burger-menu-list-item__link">
                            рецепти
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page__content page__content--materials materials">
        <div class="materials__search materials-search">
            <input type="text" class="materials-search__input" name="materials-search__input" placeholder="назва, артикул...">
        </div>
        <div class="materials__table materials-table">
<!--            <div class="materials-table__header">-->
<!--                <div class="materials-table__col materials-table__col&#45;&#45;1">Арт.</div>-->
<!--                <div class="materials-table__col materials-table__col&#45;&#45;2">Фото</div>-->
<!--                <div class="materials-table__col materials-table__col&#45;&#45;3">Назва</div>-->
<!--                <div class="materials-table__col materials-table__col&#45;&#45;4">Розмір</div>-->
<!--                <div class="materials-table__col materials-table__col&#45;&#45;5">Ціна</div>-->
<!--                <div class="materials-table__col materials-table__col&#45;&#45;6">Місце</div>-->
<!--                <div class="materials-table__col materials-table__col&#45;&#45;7">К-сть</div>-->
<!--            </div>-->
            <div class="materials-table__body">
                <div class="materials-table__row">
                    <div class="materials-table__col materials-table__col--1">АА01</div>
                    <div class="materials-table__col materials-table__col--2"><img src="img/img-material.jpg" alt="Ранункулюс болотний" class="materials-table__img open-image"></div>
                    <div class="materials-table__col materials-table__col--3">ранункулюс болотний</div>
                    <div class="materials-table__col materials-table__col--4">3 см</div>
                    <div class="materials-table__col materials-table__col--5">ранункулюс інший</div>
                    <div class="materials-table__col materials-table__col--6">БОКС 1</div>
                    <div class="materials-table__col materials-table__col--7 materials-table__col--qty">300 од.</div>
                </div>
                <div class="materials-table__row materials-table__row--yellow">
                    <div class="materials-table__col materials-table__col--1">АА01</div>
                    <div class="materials-table__col materials-table__col--2"><img src="img/img-material.jpg" alt="Ранункулюс болотний" class="materials-table__img open-image"></div>
                    <div class="materials-table__col materials-table__col--3">ранункулюс болотний</div>
                    <div class="materials-table__col materials-table__col--4">3 см</div>
                    <div class="materials-table__col materials-table__col--5">ранункулюс інший</div>
                    <div class="materials-table__col materials-table__col--6">БОКС 1</div>
                    <div class="materials-table__col materials-table__col--7 materials-table__col--qty">100 од.</div>
                </div>
                <div class="materials-table__row  materials-table__row--red">
                    <div class="materials-table__col materials-table__col--1">АА01</div>
                    <div class="materials-table__col materials-table__col--2"><img src="img/img-material.jpg" alt="Ранункулюс болотний" class="materials-table__img open-image"></div>
                    <div class="materials-table__col materials-table__col--3">ранункулюс болотний</div>
                    <div class="materials-table__col materials-table__col--4">3 см</div>
                    <div class="materials-table__col materials-table__col--5">ранункулюс інший</div>
                    <div class="materials-table__col materials-table__col--6">БОКС 1</div>
                    <div class="materials-table__col materials-table__col--7 materials-table__col--qty">10 од.</div>
                </div>
                <div class="materials-table__row materials-table__row--empty">
                    <div class="materials-table__col materials-table__col--1">АА01</div>
                    <div class="materials-table__col materials-table__col--2"><img src="img/img-material.jpg" alt="Ранункулюс болотний" class="materials-table__img open-image"></div>
                    <div class="materials-table__col materials-table__col--3">ранункулюс болотний</div>
                    <div class="materials-table__col materials-table__col--4">3 см</div>
                    <div class="materials-table__col materials-table__col--5">ранункулюс інший</div>
                    <div class="materials-table__col materials-table__col--6">БОКС 1</div>
                    <div class="materials-table__col materials-table__col--7 materials-table__col--qty">300 од.</div>
                </div>
                <div class="materials-table__row">
                    <div class="materials-table__col materials-table__col--1">АА01</div>
                    <div class="materials-table__col materials-table__col--2"><img src="img/img-material.jpg" alt="Ранункулюс болотний" class="materials-table__img open-image"></div>
                    <div class="materials-table__col materials-table__col--3">ранункулюс болотний</div>
                    <div class="materials-table__col materials-table__col--4">3 см</div>
                    <div class="materials-table__col materials-table__col--5">ранункулюс інший</div>
                    <div class="materials-table__col materials-table__col--6">БОКС 1</div>
                    <div class="materials-table__col materials-table__col--7 materials-table__col--qty">300 од.</div>
                </div>
                <div class="materials-table__row">
                    <div class="materials-table__col materials-table__col--1">АА01</div>
                    <div class="materials-table__col materials-table__col--2"><img src="img/img-material.jpg" alt="Ранункулюс болотний" class="materials-table__img open-image"></div>
                    <div class="materials-table__col materials-table__col--3">ранункулюс болотний</div>
                    <div class="materials-table__col materials-table__col--4">3 см</div>
                    <div class="materials-table__col materials-table__col--5">ранункулюс інший</div>
                    <div class="materials-table__col materials-table__col--6">БОКС 1</div>
                    <div class="materials-table__col materials-table__col--7 materials-table__col--qty">300 од.</div>
                </div>
                <div class="materials-table__row">
                    <div class="materials-table__col materials-table__col--1">АА01</div>
                    <div class="materials-table__col materials-table__col--2"><img src="img/img-material.jpg" alt="Ранункулюс болотний" class="materials-table__img open-image"></div>
                    <div class="materials-table__col materials-table__col--3">ранункулюс болотний</div>
                    <div class="materials-table__col materials-table__col--4">3 см</div>
                    <div class="materials-table__col materials-table__col--5">ранункулюс інший</div>
                    <div class="materials-table__col materials-table__col--6">БОКС 1</div>
                    <div class="materials-table__col materials-table__col--7 materials-table__col--qty">300 од.</div>
                </div>
                <div class="materials-table__row">
                    <div class="materials-table__col materials-table__col--1">АА01</div>
                    <div class="materials-table__col materials-table__col--2"><img src="img/img-material.jpg" alt="Ранункулюс болотний" class="materials-table__img open-image"></div>
                    <div class="materials-table__col materials-table__col--3">ранункулюс болотний</div>
                    <div class="materials-table__col materials-table__col--4">3 см</div>
                    <div class="materials-table__col materials-table__col--5">ранункулюс інший</div>
                    <div class="materials-table__col materials-table__col--6">БОКС 1</div>
                    <div class="materials-table__col materials-table__col--7 materials-table__col--qty">300 од.</div>
                </div>
                <div class="materials-table__row">
                <div class="materials-table__col materials-table__col--1">АА01</div>
                <div class="materials-table__col materials-table__col--2"><img src="img/img-material.jpg" alt="Ранункулюс болотний" class="materials-table__img open-image"></div>
                <div class="materials-table__col materials-table__col--3">ранункулюс болотний</div>
                <div class="materials-table__col materials-table__col--4">3 см</div>
                <div class="materials-table__col materials-table__col--5">ранункулюс інший</div>
                <div class="materials-table__col materials-table__col--6">БОКС 1</div>
                <div class="materials-table__col materials-table__col--7 materials-table__col--qty">300 од.</div>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay">
    <div class="overlay__container">
        <button class="overlay__close">X</button>
        <img src="img/img-material.jpg" alt="Зображення матеріалу">
    </div>
</div>
<?php
require('footer.php');
?>
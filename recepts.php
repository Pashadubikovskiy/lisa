<?php
require_once('login-check.php');
require('header.php');
echo  insertHeader('recepts');
?>
<div class="page page--recepts">
    <div class="page__sidebar">
        <div class="page__name">
            Рецепти
        </div>
        <ul class="page__categories">
            <li class="page__category page-category">
                <a href="#" class="page-category__link page-category__link--is-active">головки квітів</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">корони</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">бутоньєрки</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">браслети</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">гребні</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">сети</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">букети</a>
            </li>
            <li class="page__category page-category">
                <a href="#" class="page-category__link">авторське замовлення</a>
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
                            на головну
                        </a>
                    </li>
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="#" class="burger-menu-list-item__link">
                            склад
                        </a>
                    </li>
                    <li class="burger-menu-list__item burger-menu-list-item">
                        <a href="#" class="burger-menu-list-item__link">
                            аналітика
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page__content page__content--recepts recepts">
        <div class="recepts__search recepts-search">
            <input type="text" class="recepts-search__input" name="recepts-search__input" placeholder="назва, артикул...">
        </div>
        <div class="recepts__table recepts-table">
<!--            <div class="recepts-table__header">-->
<!--                <div class="recepts-table__col recepts-table__col&#45;&#45;1">Арт.</div>-->
<!--                <div class="recepts-table__col recepts-table__col&#45;&#45;2">Фото</div>-->
<!--                <div class="recepts-table__col recepts-table__col&#45;&#45;3">Назва</div>-->
<!--                <div class="recepts-table__col recepts-table__col&#45;&#45;4">Розмір</div>-->
<!--                <div class="recepts-table__col recepts-table__col&#45;&#45;5">Ціна</div>-->
<!--                <div class="recepts-table__col recepts-table__col&#45;&#45;6">Місце</div>-->
<!--                <div class="recepts-table__col recepts-table__col&#45;&#45;7">К-сть</div>-->
<!--            </div>-->
            <div class="recepts-table__body">
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
                </div>
                <div class="recepts-table__row">
                    <div class="recepts-table__col recepts-table__col--1 recepts-table__col--blue">etsy</div>
                    <div class="recepts-table__col recepts-table__col--2">
                        <img src="img/img-material.jpg" alt="Ранункулюс болотний" class="recepts-table__img open-image">
                    </div>
                    <div class="recepts-table__col recepts-table__col--3">гребінь паперово-бордова</div>
                    <div class="recepts-table__col recepts-table__col--4">
                        <button class="simple-btn simple-btn--green">відкрити</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--5">
                        <button class="simple-btn simple-btn--black">редагувати</button>
                    </div>
                    <div class="recepts-table__col recepts-table__col--6">
                        <button class="simple-btn simple-btn--black">видалити</button>
                    </div>
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
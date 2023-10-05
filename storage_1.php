<?php
require_once('login-check.php');
require('header.php');
echo  insertHeader('storage_1');
?>
<div class="page page--storage-1">
    <div class="page__container">
        <div class="storage-content">
            <div class="storage-content__title">
                Всього наявних матеріалів:
                <span class="storage-content__title-inner">965</span>
            </div>
            <div class="storage-content__row">
                <div class="storage-content__text">Зелених (>100)</div>
                <div class="storage-content__number">800</div>
            </div>
            <div class="storage-content__row">
                <div class="storage-content__text">Жовтих (<100)</div>
                <div class="storage-content__number">100</div>
            </div>
            <div class="storage-content__row">
                <div class="storage-content__text">Червоних (<10)</div>
                <div class="storage-content__number">65</div>
            </div>
            <button class="storage-content__btn storage-content__btn--save">сформувати</button>
        </div>
    </div>
</div>
<?php
require('footer.php');
?>
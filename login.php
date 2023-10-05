<?php
require('header.php');
echo  insertHeader('login');
?>
    <div class="page">
        <div class="page__decor page-decor">
        </div>
        <div class="page__content page__content--login login">
            <h1 class="login__title">Привіт, дорогенька!</h1>
            <div class="login__flex">
                <div class="login__logo">
                    <img src="img/logo.png" alt="Лого Лиси">
                </div>
                <div class="login__block">
                    <form class="login__form" id="login-form">
                        <label for="username" class="login__label">
                            логін
                            <input type="text" id="username" name="username" class="login__input" placeholder="адмін">
                        </label>
                        <label for="password" class="login__label">
                            пароль
                            <input type="password" id="password" name="password" class="login__input" placeholder="********">
                        </label>

                        <input type="submit" value="Вхід" class="login__btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="preloader">
        <img src="img/preloader.png" alt="Привіт!">
    </div>

<?php
require('footer.php');
?>
let loginForm = document.querySelector('.login__form');
if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        window.location.href = '/lisa/materials.html'
    })
}

let preloader = document.querySelector('.preloader');
if (preloader) {
    preloader.classList.add('loaded');
}

let burgerTriggers = document.querySelectorAll('.burger__btn, .burger-menu__close');
let burgerMenu = document.querySelector('.burger__menu');
if (burgerTriggers) {
    burgerTriggers.forEach(el => {
        el.addEventListener('click', (e) => {
            burgerMenu.classList.toggle('burger__menu--is-opened');
        })
    })
}

let materialsCategories = document.querySelectorAll('.page-category__link');
let materialImg = document.querySelectorAll('.material-table__img');
let overlay = document.querySelector('.overlay');
let overlayClose = document.querySelector('.overlay__close');
if (materialsCategories) {
    const materialsCategoryChange = (e) => {
        e.preventDefault();
        document.querySelector('.page-category__link--is-active').classList.remove('page-category__link--is-active')
        e.target.classList.add('page-category__link--is-active')
    }
    materialsCategories.forEach((el)=>{
        el.addEventListener('click', materialsCategoryChange)
    })
    materialImg.forEach(el=> {
        el.addEventListener('click', ()=> {
            overlay.classList.add('overlay--is-active');
            overlay.querySelector('img').src = el.getAttribute('src')
        })
    })
    overlayClose.addEventListener('click', ()=> {
        overlay.classList.remove('overlay--is-active');
    })
}
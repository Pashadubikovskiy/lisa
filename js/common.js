let loginForm = document.querySelector('.login__form');
let preloader = document.querySelector('.preloader');
console.log(preloader)
if (preloader) {
    preloader.classList.add('loaded');
}
if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        window.location.href = '/lisa/page.html'
    })
}
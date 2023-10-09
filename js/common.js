// let loginForm = document.querySelector('.login__form');
// if (loginForm) {
    // loginForm.addEventListener('submit', (e) => {
    //     e.preventDefault();
    //     window.location.href = '/lisa/materials.html'
    // })
// }

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

if (document.querySelector('.overlay')) {
    let materialsCategories = document.querySelectorAll('.page-category__link');
    let materialImg = document.querySelectorAll('.open-image');
    let overlay = document.querySelector('.overlay');
    let overlayClose = document.querySelector('.overlay__close');
    let overlayFormOpen = document.querySelector('.component-form');
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
                overlay.classList.add('overlay--photo');
                overlay.querySelector('img').src = el.getAttribute('src')
            })
        })
        overlayClose.addEventListener('click', ()=> {
            overlay.classList.remove('overlay--is-active');
            setTimeout(function (){
                overlay.classList.remove('overlay--photo');
                overlay.classList.remove('overlay--form');
            }, 500)
        })
    }
    if (overlayFormOpen) {
        overlayFormOpen.addEventListener('click', ()=> {
            overlay.classList.add('overlay--is-active');
            overlay.classList.add('overlay--form');
        })
    }
}

// add new material
document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");

    dropZoneElement.addEventListener("click", (e) => {
        inputElement.click();
    });

    inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
    });

    dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, (e) => {
            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

    dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();

        if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }

        dropZoneElement.classList.remove("drop-zone--over");
    });
});
/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    // First time - remove the prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }

    // First time - there is no thumbnail element, so lets create it
    if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;

    // Show thumbnail for image files
    if (file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
    } else {
        thumbnailElement.style.backgroundImage = null;
    }
}


if (document.querySelector('.recept-add-comment')) {
    document.querySelector('.recept-add-comment').addEventListener('click', function (){
        document.querySelector('.recept-textarea').classList.add('recept-textarea--show')
        document.querySelector('.recept-add-comment').remove()
    })
}



$(document).ready(function() {
    if ($('.page__close').length > 0) {
        $('.page__close').click(function (e) {
            e.preventDefault();
            $(this).closest('.page').removeClass('opened')
        })
    }
    if ($('.burger-menu-list-item__link--new-material').length > 0) {
        $('.burger-menu-list-item__link--new-material').click(function (e) {
            e.preventDefault();
            $('.page--new-material').addClass('opened')
        })
    }
    if ($('.page-form--new-material')) {
        $('.page-form--new-material').submit(function(e) {
            e.preventDefault();
            // Получение значений из формы
            var category = $("#category").val();
            var sku = $("#sku").val();
            var name = $("#name").val();
            var size = $("#size").val();
            var price = $("#price").val();
            var qty = $("#qty").val();
            var place = $("#place").val();
            var file = $("#myFile")[0].files[0];

            // Создание объекта FormData для передачи данных
            var formData = new FormData();
            formData.append("category", category);
            formData.append("sku", sku);
            formData.append("name", name);
            formData.append("size", size);
            formData.append("price", price);
            formData.append("qty", qty);
            formData.append("place", place);
            formData.append("myFile", file);

            // Отправка AJAX-запроса на сервер
            $.ajax({
                url: "requests/new-material.php", // Укажите путь к скрипту на сервере для обработки запроса
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Обработка ответа от сервера (например, вывод сообщения об успешной вставке)
                    alert(response);
                },
                error: function() {
                    // Обработка ошибок при запросе
                    alert("При отправке запроса произошла ошибка.");
                }
            });
        });
    }
    $("#login-form").submit(function(event) {
        event.preventDefault(); // Заборона перезавантаження сторінки при відправці форми
        var username = $("#username").val();
        var password = $("#password").val();

        $.ajax({
            type: "POST",
            url: "requests/login.php",
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                if (response === "success") {
                    // Вхід успішний
                    window.location.href = "materials.php"; // Перенаправлення на сторінку ласкаво просимо
                } else {
                    // Невірний логін або пароль
                    alert(response)
                }
            },
            error: function(response) {
                console.log(response); // Виведення тексту помилки у консоль
            }
        });
    });
});
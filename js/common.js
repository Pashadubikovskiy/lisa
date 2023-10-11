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
    if ($('.burger-menu-list-item__link--categories').length > 0) {
        $('.burger-menu-list-item__link--categories').click(function (e) {
            e.preventDefault();
            $('.page--categories').addClass('opened')
        })
    }
    if ($('.page-form--new-category').length > 0) {
        let $form = $('.page-form--new-category');
        $('.page--categories .btn--save').click(function (e) {
            e.preventDefault();
            $form[0].reset();
            $form.addClass('opened')
        })
        $('.page--categories .btn--close').click(function (e) {
            e.preventDefault();
            $form.removeClass('opened')
        })

        $('.btn--edit').click(function (e) {
            e.preventDefault();


            let $id = $(this).closest('.categories__item').data('id');
            let $name = $(this).closest('.categories__item').find('.categories__item-name').text().trim();

            $form.addClass('opened')

            $('#new-category').val($name)
            $('#new-category').data('id', $id)
        })
        $form.submit(function (e){
            e.preventDefault();
            let $id;
            if ($('#new-category').data('id')) {
                $id = $('#new-category').data('id');
            } else {
                $id = 0;
            }
            $.ajax({
                type: "POST",
                url: "requests/category.php",
                data: {
                    id: $id,
                    name: $('#new-category').val(),
                },
                success: function(data) {
                    alert(data)
                    $form[0].reset();
                    $form.removeClass('opened')
                },
                error: function() {
                    console.error('Помилка запиту');
                }
            });
        })
    }
    if ($('.page-form--new-material')) {
        $('.page-form--new-material .page-form__btn--delete').click(function(e) {
            e.preventDefault();
            let $form = $('.page-form--new-material');
            let $sku = $form.find('#sku').val()
            $.ajax({
                type: "POST",
                url: "requests/delete-material.php",
                data: {
                    sku: $sku,
                },
                success: function(response) {
                    $('.page-form--new-material')[0].reset();
                    $('.page--new-material').removeClass('opened');
                    alert(response);
                },
                error: function() {
                    console.error('Помилка запиту');
                }
            });
        })
        $('.page-form--new-material').submit(function(e) {
            e.preventDefault();
            // Получение значений из формы
            var category = $("#category").val();
            var sku = $("#sku").val();
            var name = $("#materialname").val();
            var size = $("#size").val();
            var price = $("#price").val();
            var qty = $("#qty").val();
            var analogs = $("#analogs").val();
            var place = $("#place").val();
            var file = $("#myFile")[0].files[0];
            var changes = $("#changes").val();

            // Создание объекта FormData для передачи данных
            var formData = new FormData();
            formData.append("category", category);
            formData.append("sku", sku);
            formData.append("name", name);
            formData.append("size", size);
            formData.append("price", price);
            formData.append("qty", qty);
            formData.append("analogs", analogs);
            formData.append("place", place);
            formData.append("changes", changes);
            if (file) {
                formData.append("myFile", file);
            }

            // Отправка AJAX-запроса на сервер
            $.ajax({
                url: "requests/new-material.php", // Укажите путь к скрипту на сервере для обработки запроса
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Обработка ответа от сервера (например, вывод сообщения об успешной вставке)
                    $('.page-form--new-material')[0].reset();
                    $('.page--new-material').removeClass('opened');
                },
                error: function() {
                    // Обработка ошибок при запросе
                    alert("При отправке запроса произошла ошибка.");
                }
            });
        });
    }

    $('.materials-table__row').click(function (){
        $sku = $(this).find('.materials-table__col--1').text()
        $.ajax({
            type: "POST",
            url: "requests/change-material.php",
            data: {
                sku: $sku,
            },
            dataType: 'json',
            success: function(data) {
                // Отримані дані у форматі JSON
                // Ви можете їх обробити, наприклад, вивести або використати для подальших дій
                console.log(data);
                $('.page--new-material').addClass('opened')
                $('#sku').val(data.sku)
                $('#qty').val(data.count)
                $('#place').val(data.placement)
                $('#analogs').val(data.analogs)
                $('#materialname').val(data.name)
                $('#size').val(data.size)
                $('#price').val(data.price)
                $('#category').val(data.category)
                $('#changes').val('true')

                let dropZoneElement = document.querySelector(".drop-zone");
                let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
                // First time - there is no thumbnail element, so lets create it
                if (!thumbnailElement && data.image) {
                    thumbnailElement = document.createElement("div");
                    thumbnailElement.classList.add("drop-zone__thumb");
                    dropZoneElement.appendChild(thumbnailElement);
                    $('.drop-zone__prompt').remove();
                    $('.drop-zone__thumb').css('background-image', 'url(' + data.image + ')');
                }


                // updateThumbnail(dropZoneElement, data.image);
            },
            error: function() {
                console.error('Помилка запиту');
            }
        });
    })
    $("#login-form").submit(function(event) {
        event.preventDefault(); // Заборона перезавантаження сторінки при відправці форми
        var $username = $("#username").val();
        var $password = $("#password").val();

        $.ajax({
            type: "POST",
            url: "requests/login.php",
            data: {
                username: $username,
                password: $password
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
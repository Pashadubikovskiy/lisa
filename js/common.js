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

// add new material
document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");

    if (dropZoneElement.classList.contains('select-recept__photo')) {
        return;
    }

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

$(document).ready(function() {
    if ($('.page__close').length > 0) {
        $('.page__close').click(function (e) {
            e.preventDefault();
            $(this).closest('.page').removeClass('opened')

            if ($('.select-recept-table__body').length > 0) {
                $('.select-recept-table__body').html('')
            }
            if ($('.change-recept-table__body').length > 0) {
                $('.change-recept-table__body').html('')
            }
        })
    }
    if ($('.burger-menu-list-item__link--new-material').length > 0) {
        $('.burger-menu-list-item__link--new-material').click(function (e) {
            e.preventDefault();
            $('.page--new-material').addClass('opened')
        })
    }
    if ($('.burger-menu-list-item__link--new-recept').length > 0) {
        $('.burger-menu-list-item__link--new-recept').click(function (e) {
            e.preventDefault();
            $('.page--new-recept').addClass('opened')
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
                dataType: 'json',
                data: {
                    id: $id,
                    name: $('#new-category').val(),
                },
                success: function(data) {
                    if (data.success) {
                        let $successPopup = $('.page--recept-loaded')
                        $successPopup.addClass('opened')
                        $successPopup.find('.page__text').text(data.success)
                    } else if (data.error) {
                        alert(data.error)
                        return;
                    }
                    $form[0].reset();
                    $form.removeClass('opened');

                    const $list = $('.page--categories .categories');
                    $list.empty();

                    data.categories.forEach(function(category) {
                        // Створення рядка HTML з використанням шаблонних рядків
                        const categoryHTML = `
            <li>
                <div class="categories__item" data-id="${category.id}">
                    <span class="categories__item-name">
                        ${category.name}
                    </span>
                    <button class="btn btn--edit">
                        редагувати
                    </button>
                </div>
            </li>
        `;

                        // Додавання створеного HTML в список категорій
                        $list.append(categoryHTML);
                    });
                },

                error: function() {
                    console.error('Помилка запиту');
                }
            });
        })
    }
    if ($('.page-form--new-category-recepts').length > 0) {
        let $form = $('.page-form--new-category-recepts');
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
                url: "requests/recept-category.php",
                dataType: 'json',
                data: {
                    id: $id,
                    name: $('#new-category').val(),
                },
                success: function(data) {
                    if (data.success) {
                        let $successPopup = $('.page--recept-loaded')
                        $successPopup.addClass('opened')
                        $successPopup.find('.page__text').text(data.success)
                    } else if (data.error) {
                        alert(data.error)
                        return;
                    }

                    $form[0].reset();
                    $form.removeClass('opened');

                    const $list = $('.page--categories .categories');
                    $list.empty();

                    data.categories.forEach(function(category) {
                        // Створення рядка HTML з використанням шаблонних рядків
                        const categoryHTML = `
            <li>
                <div class="categories__item" data-id="${category.id}">
                    <span class="categories__item-name">
                        ${category.name}
                    </span>
                    <button class="btn btn--edit">
                        редагувати
                    </button>
                </div>
            </li>
        `;

                        // Додавання створеного HTML в список категорій
                        $list.append(categoryHTML);
                    });
                },
                error: function() {
                    console.error('Помилка запиту');
                }
            });
        })
    }
    if ($('.new-recept-table__row').length > 0) {
        $('.new-recept-table__row .btn-delete').click(function (){
                $(this).closest('.new-recept-table__row').remove()
            }
        )
    }
    if ($('.recepts-table__body').length > 0) {
        // Функція, яка перевіряє стан чекбоксів і встановлює відповідний стан кнопки
        function updateSaveButtonState() {
            var $form = $('.page-form.select-recept');
            var $rows = $form.find('.select-recept-table__row');
            var $checkboxes = $rows.find('.checkbox-container input');
            var $saveButton = $form.find('.select-recept__btn--save');

            var allChecked = $checkboxes.length === $checkboxes.filter(':checked').length;

            if (allChecked) {
                $saveButton.prop('disabled', false);
            } else {
                $saveButton.prop('disabled', true);
            }
        }

// Викликати функцію при завантаженні сторінки та при зміні стану чекбоксів (з делегуванням подій)



        $(document).on('change', '.select-recept .checkbox-container input', updateSaveButtonState);

        $('.recept-close').click(function(e) {
            $(this).closest('.page--select-recept').removeClass('opened')
            $(this).closest('.page--change-recept').removeClass('opened')
        })
        $('.recept-change-open').click(function(e) {
            $(this).closest('.page--select-recept').removeClass('opened')
            $('.page--change-recept').addClass('opened')
        })
    }
    $(document).on('click', '.select-recept__btn--save', function (e) {

            e.preventDefault();
            // Масиви для збереження даних
            var skuValues = [];
            var countingValues = [];

            // Збір даних з елементів на сторінці
            $('.select-recept-table__row').each(function () {
                var sku = $(this).find('.variables-materials').val();
                var counting = parseInt($(this).find('.counting').text());

                skuValues.push(sku);
                countingValues.push(counting);
            });

            // Підготовка даних для відправки на сервер
            var requestData = {
                skuValues: skuValues,
                countingValues: countingValues
            };
        // console.log(!requestData.skuValues)
            if (requestData.skuValues) {
                alert('Недостатньо матеріалів (перевірте наявність)')
                return
            }

            // Відправка Ajax-запиту на сервер
            $.ajax({
                type: 'POST',
                url: 'requests/recept-uploading.php', // Замініть це на шлях до вашого серверного скрипту
                dataType: 'json',
                data: requestData,
                success: function (response) {
                    console.log(response)
                    if (response.success) {
                        let $successPopup = $('.page--recept-loaded')
                        $successPopup.addClass('opened')
                        $successPopup.find('.page__text').text(response.success)
                    } else if (response.error) {
                        alert(response.error)
                        return;
                    }

                    $('.page--select-recept').removeClass('opened')
                    $('.page--recept-loaded').addClass('opened')
                },
                error: function () {
                    // Обробка помилок (якщо потрібно)
                }
            });
    })
    $(document).on('click', '.open-recept', function (e) {
        e.preventDefault();
        const $id = $(this).closest('.recepts-table__row').data('recept')
        $('.page--select-recept').addClass('opened')

        let $modal = $('.page--select-recept')
        console.log($id)
        $.ajax({
            url: "requests/open-recept.php", // Укажите путь к скрипту на сервере для обработки запроса
            type: "POST",
            dataType: 'json',
            data: {
                id: $id
            },
            success: function(response) {
                // Обработка ответа от сервера (например, вывод сообщения об успешной вставке)
                $modal.find('.select-recept__input--name').val(response.recipe.recept_name)
                $modal.find('.select-recept__photo').data('image', response.recipe.image)

                $modal.find('.select-recept__photo').css('background-image', `url('${response.recipe.image}')`)
                $modal.find('.select-recept__input#sku').val(response.recipe.etsy_link)
                $modal.find('.recept-textarea').val(response.recipe.comment)
                var $tableBody = $modal.find('.select-recept-table__body');

                response.recipe_materials.forEach(function(recipe_material) {
                    var $row = $('<div>').addClass('select-recept-table__row');

                    // Створіть і додайте div-елементи з відповідними даними до рядка
                    $row.append($('<div>').addClass('select-recept-table__col select-recept-table__col--1').text(recipe_material.material_sku));
                    $row.append($('<div>').addClass('select-recept-table__col select-recept-table__col--2').append($('<img>').attr('src', recipe_material.image).attr('alt', recipe_material.name).addClass('select-recept-table__img open-image')));
                    var $col = $('<div>', { class: 'select-recept-table__col select-recept-table__col--3' });
                    var $select = $('<select>', { name: 'variables_1', id: 'variables_1', class: 'variables-materials' });
                    var $option = $('<option>', { value: recipe_material.material_sku, text: recipe_material.name, disabled: recipe_material.count < recipe_material.material_count, selected: 'true' });

                    var materialSkuToCheck = recipe_material.material_sku;
                    var materialsReplacements = response.materials_replacements;

                    var matchingObjects = materialsReplacements.filter(function(replacement) {
                        return replacement.original_sku === materialSkuToCheck;
                    });

                    if (matchingObjects.length > 0) {
                        matchingObjects.forEach(function(matchingObject) {
                            var $option = $('<option>', { value: matchingObject.material_sku, text: matchingObject.name, disabled: matchingObject.count < matchingObject.material_count });
                            $select.append($option);
                        });
                    }

                    $col.append($select.append($option));
                    $row.append($col)

                    $row.append($('<div>').addClass('select-recept-table__col select-recept-table__col--4').text(recipe_material.size + 'см'));
                    $row.append($('<div>').addClass('select-recept-table__col select-recept-table__col--5').html(`<span class="counting">${recipe_material.material_count}</span> од.`));
                    $row.append($('<div>').addClass('select-recept-table__col select-recept-table__col--6').text(recipe_material.placement));
                    var $col1 = $('<div>', { class: 'select-recept-table__col select-recept-table__col--7' });
                    var $label = $('<label>', { class: 'checkbox-container' });
                    var $input = $('<input>', { type: 'checkbox' });
                    var $span = $('<span>', { class: 'checkmark' });

                    $col1.append($label.append($input, $span));
                    $row.append($col1)


                    // Додайте створений рядок до .select-recept-table__body
                    $tableBody.append($row);
                });
            },
            error: function() {
                // Обработка ошибок при запросе
                alert("При отправке запроса произошла ошибка.");
            }
        });
    })
    $(document).on('click', '.author-recept-table__row .btn-delete', function (e) {
        e.preventDefault();
        $(this).closest('.author-recept-table__row').remove();
    })
    $(document).on('click', '.author-recept__btn--save', function (e) {
        e.preventDefault();

        // Масиви для збереження даних
        var skuValues = [];

        // Збір даних з рядків, де відмічений чекбокс
        $('.author-recept-table__row').each(function () {
            var $checkbox = $(this).find('input[type="checkbox"]');
            if ($checkbox.prop('checked')) {
                var sku = $(this).find('.author-recept-table__col--1').text();
                skuValues.push(sku);
            }
        });

        // Підготовка даних для відправки на сервер
        var requestData = {
            skuValues: skuValues
        };

        // Відправка Ajax-запиту на сервер
        $.ajax({
            type: 'POST',
            url: 'requests/recept-uploading-author.php', // Замініть це на шлях до вашого серверного скрипту
            dataType: 'json',
            data: requestData,
            success: function (response) {
                if (response.success) {
                    let $successPopup = $('.page--recept-loaded')
                    $successPopup.addClass('opened')
                    $successPopup.find('.page__text').text(response.success)

                    $('.author-recept-table__body').empty();
                } else if (response.error) {
                    alert(response.error)
                    return;
                }

                $('.page--select-recept').removeClass('opened')
                $('.page--recept-loaded').addClass('opened')
            },
            error: function () {
                // Обробка помилок (якщо потрібно)
            }
        });
    });

    $(document).on('click', '.remake-recept', function (e) {
            e.preventDefault();
            const $id = $(this).closest('.recepts-table__row').data('recept')
            $('.page--change-recept').addClass('opened').data('recept', $id)

            let $modal = $('.page--change-recept')
            $.ajax({
                url: "requests/open-recept.php", // Укажите путь к скрипту на сервере для обработки запроса
                type: "POST",
                dataType: 'json',
                data: {
                    id: $id
                },
                success: function(response) {
                    // Обработка ответа от сервера (например, вывод сообщения об успешной вставке)

                    $modal.find('.change-recept__input--name').val(response.recipe.recept_name)
                    $modal.find('.change-recept__photo').data('image', response.recipe.image)
                    $modal.find('.change-recept__photo').css('background-image', `url('${response.recipe.image}')`)
                    $modal.find('.change-recept__input#etsy-link').val(response.recipe.etsy_link)
                    $modal.find('.page-form__select').val(response.recipe.category)
                    $modal.find('.recept-textarea').val(response.recipe.comment)
                    var $tableBody = $modal.find('.change-recept-table__body');

                    response.recipe_materials.forEach(function(recipe_material) {
                        var $row = $('<div>').addClass('change-recept-table__row');

                        // Створіть і додайте div-елементи з відповідними даними до рядка
                        $row.append($('<div>').addClass('change-recept-table__col change-recept-table__col--1').text(recipe_material.material_sku));
                        $row.append($('<div>').addClass('change-recept-table__col change-recept-table__col--2').append($('<img>').attr('src', recipe_material.image).attr('alt', recipe_material.name).addClass('change-recept-table__img open-image')));
                        $row.append($('<div>').addClass('change-recept-table__col change-recept-table__col--3').text(recipe_material.name));
                        $row.append($('<div>').addClass('change-recept-table__col change-recept-table__col--4').text(recipe_material.size + 'см'));
                        $row.append($('<div>').addClass('change-recept-table__col change-recept-table__col--5').html(`<span class="counting">${recipe_material.material_count}</span> од.`));
                        $row.append($('<div>').addClass('change-recept-table__col change-recept-table__col--6').text(recipe_material.placement));
                        var $col1 = $('<div>', { class: 'change-recept-table__col change-recept-table__col--7' });
                        var $label = $('<button>', { class: 'btn-delete', text: 'X' });

                        $row.append($col1.append($label))


                        // Додайте створений рядок до .change-recept-table__body
                        $tableBody.append($row);
                        var materialSkuToCheck = recipe_material.material_sku;
                        var materialsReplacements = response.materials_replacements;

                        var matchingObjects = materialsReplacements.filter(function(replacement) {
                            return replacement.original_sku === materialSkuToCheck;
                        });

                        if (matchingObjects.length > 0) {
                            matchingObjects.forEach(function(matchingObject) {
                                var $rowReplacement = $('<div>').addClass('change-recept-table__row').addClass('change-recept-table__row--change');
                                $rowReplacement.append($('<input type="hidden" class="data-change">').val(matchingObject.original_sku));
                                // Створіть і додайте div-елементи з відповідними даними до рядка
                                $rowReplacement.append($('<div>').addClass('change-recept-table__col change-recept-table__col--1').text(matchingObject.material_sku));
                                $rowReplacement.append($('<div>').addClass('change-recept-table__col change-recept-table__col--2').append($('<img>').attr('src', matchingObject.image).attr('alt', matchingObject.name).addClass('change-recept-table__img open-image')));
                                $rowReplacement.append($('<div>').addClass('change-recept-table__col change-recept-table__col--3').html(matchingObject.name + ' <span style="color: red; margin-left: 3px;">(заміна)</span>'));
                                $rowReplacement.append($('<div>').addClass('change-recept-table__col change-recept-table__col--4').text(matchingObject.size + 'см'));
                                $rowReplacement.append($('<div>').addClass('change-recept-table__col change-recept-table__col--5').html(`<span class="counting">${matchingObject.material_count}</span> од.`));
                                $rowReplacement.append($('<div>').addClass('change-recept-table__col change-recept-table__col--6').text(matchingObject.placement));
                                var $colReplacement = $('<div>', { class: 'change-recept-table__col change-recept-table__col--7' });
                                var $label = $('<button>', { class: 'btn-delete', text: 'X' });

                                $rowReplacement.append($colReplacement.append($label))

                                $tableBody.append($rowReplacement);
                            });
                        }
                    });
                },
                error: function() {
                    // Обработка ошибок при запросе
                    alert("При отправке запроса произошла ошибка.");
                }
        })
    })
    $(document).on('click', '.delete-recept-change', function (e) {
        e.preventDefault();
        var $receptId = $('.page--change-recept').data('recept')
        $.ajax({
            url: "requests/delete-recept.php", // Укажите путь к скрипту на сервере для обработки запроса
            type: "POST",
            data: {
                recipeId: $receptId,
            },
            success: function(response) {
                // Обработка ответа от сервера (например, вывод сообщения об успешной вставке)

                if (response.success) {
                    let $successPopup = $('.page--recept-loaded')
                    $successPopup.addClass('opened')
                    $successPopup.find('.page__text').text(response.success)
                } else if (response.error) {
                    alert(response.error)
                    return;
                }
                $('.page--change-recept form')[0].reset()
                $('.page--change-recept .change-recept-table__row').remove()
                $('.page--change-recept .drop-zone--change-recept').attr('style', '')

                $('.recepts-table__row[data-recept="'+$receptId+'"]').remove()
                $('.page--change-recept').removeClass('opened')
            },
            error: function() {
                // Обработка ошибок при запросе
                alert("При отправке запроса произошла ошибка.");
            }
        });
    })
    $(document).on('click', '.delete-recept-new', function (e) {
        e.preventDefault();
        var $receptId = $('.page--new-recept #recept-id').val()
        $.ajax({
            url: "requests/delete-recept.php", // Укажите путь к скрипту на сервере для обработки запроса
            type: "POST",
            data: {
                recipeId: $receptId,
            },
            success: function(response) {
                // Обработка ответа от сервера (например, вывод сообщения об успешной вставке)

                if (response.success) {
                    let $successPopup = $('.page--recept-loaded')
                    $successPopup.addClass('opened')
                    $successPopup.find('.page__text').text(response.success)
                } else if (response.error) {
                    alert(response.error)
                    return;
                }
                $('.page--new-recept form')[0].reset()
                $('.page--new-recept .new-recept-table__row:not(.new-recept-table__row--empty)').remove()
                $('.page--new-recept .drop-zone__thumb').attr('style', '')
                $('.page--new-recept').removeClass('opened')
            },
            error: function() {
                // Обработка ошибок при запросе
                alert("При отправке запроса произошла ошибка.");
            }
        });
    })
    if ($('.change-recept-table__body').length > 0) {
        $(document).on('click', '.delete-recept', function (e) {
            e.preventDefault();
            var $receptId = $(this).closest('.recepts-table__row').data('recept')

            var receptRow = $(this).closest('.recepts-table__row').remove()
            $.ajax({
                url: "requests/delete-recept.php", // Укажите путь к скрипту на сервере для обработки запроса
                type: "POST",
                data: {
                    recipeId: $receptId,
                },
                success: function(response) {
                    // Обработка ответа от сервера (например, вывод сообщения об успешной вставке)

                    if (response.success) {
                        let $successPopup = $('.page--recept-loaded')
                        $successPopup.addClass('opened')
                        $successPopup.find('.page__text').text(response.success)
                    } else if (response.error) {
                        alert(response.error)
                        return;
                    }
                    receptRow.remove();
                },
                error: function() {
                    // Обработка ошибок при запросе
                    alert("При отправке запроса произошла ошибка.");
                }
            });
        })
        $(document).on('click', '.change-recept-table__row .btn-delete', function (e) {
            e.preventDefault();

            const $id = $(this).closest('.page--change-recept').data('recept')
            const $component = $(this).closest('.change-recept-table__row').find('.change-recept-table__col--1').text()

            let $modalElem = $(this).closest('.change-recept-table__row')

            if ($modalElem.hasClass('change-recept-table__row--change')) {
                $.ajax({
                    url: "requests/delete-replacement.php", // Укажите путь к скрипту на сервере для обработки запроса
                    type: "POST",
                    data: {
                        recipeId: $id,
                        component: $component
                    },
                    success: function(response) {
                        // Обработка ответа от сервера (например, вывод сообщения об успешной вставке)

                        if (response.success) {
                            let $successPopup = $('.page--recept-loaded')
                            $successPopup.addClass('opened')
                            $successPopup.find('.page__text').text(response.success)
                        } else if (response.error) {
                            alert(response.error)
                            return;
                        }
                        $modalElem.remove();
                    },
                    error: function() {
                        // Обработка ошибок при запросе
                        alert("При отправке запроса произошла ошибка.");
                    }
                });
            } else {
                $.ajax({
                    url: "requests/delete-component.php", // Укажите путь к скрипту на сервере для обработки запроса
                    type: "POST",
                    data: {
                        recipeId: $id,
                        component: $component
                    },
                    success: function(response) {
                        // Обработка ответа от сервера (например, вывод сообщения об успешной вставке)

                        if (response.success) {
                            let $successPopup = $('.page--recept-loaded')
                            $successPopup.addClass('opened')
                            $successPopup.find('.page__text').text(response.success)
                        } else if (response.error) {
                            alert(response.error)
                            return;
                        }

                        $modalElem.remove();
                        console.log($('.data-change[value="' + $component + '"]'));

                        $('.data-change[value="' + $component + '"]').closest('.change-recept-table__row').remove();

                    },
                    error: function() {
                        // Обработка ошибок при запросе
                        alert("При отправке запроса произошла ошибка.");
                    }
                });
            }
        });
    }
    if ($('.page-form--new-material').length > 0) {
        $('.page-form--new-material .page-form__btn--delete').click(function(e) {
            e.preventDefault();
            let $form = $('.page-form--new-material');
            let $sku = $form.find('#sku').val()
            $.ajax({
                type: "POST",
                url: "requests/delete-material.php",
                dataType: 'json',
                data: {
                    sku: $sku,
                },
                success: function(response) {
                    $('.page-form--new-material')[0].reset();
                    $('.page--new-material').removeClass('opened');

                    if (response.error) {
                        alert('Цей матеріал використовується в рецепті. Спочатку видаліть його з рецепту.')
                    }
                    if (response.success) {
                        let $successPopup = $('.page--recept-loaded')
                        $successPopup.addClass('opened')
                        $successPopup.find('.page__text').text(response.success)
                    }

                    if ($('.page--recepts .page-category__link').length > 0) {
                        $('.page--recepts .page-category__link')[0].click()
                    }
                    if ($('.page--materials .page-category__link').length > 0) {
                        $('.page--materials .page-category__link')[0].click()
                    }
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
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Обработка ответа от сервера (например, вывод сообщения об успешной вставке)

                    if (response.success) {
                        let $successPopup = $('.page--recept-loaded')
                        $successPopup.addClass('opened')
                        $successPopup.find('.page__text').text(response.success)
                    } else if (response.error) {
                        alert(response.error)
                        return;
                    }
                    $('.page-form--new-material')[0].reset();
                    $('.page--new-material').removeClass('opened');


                    if ($('.page--recepts .page-category__link').length > 0) {
                        $('.page--recepts .page-category__link')[0].click()
                    }
                    if ($('.page--materials .page-category__link').length > 0) {
                        $('.page--materials .page-category__link')[0].click()
                    }
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
    $('.storage-creating-table__row .btn-delete').click(function () {
        $(this).closest('.storage-creating-table__row').remove()
    })
    function createPDF(tableId, filename, size) {
        var docDefinition = {
            content: [
                { text: 'Матеріали, яких менше '+size+' в наявності:', style: 'header' },
            ],
            styles: {
                header: {
                    fontSize: 16,
                    bold: true
                }
            }
        };

        var tableRows = $(tableId + " .storage-creating-table__row");

        if (tableRows.length === 0) {
            alert("Не знайдено жодного рядка для створення PDF.");
            return;
        }

        tableRows.each(function() {
            var columns = $(this).find(".storage-creating-table__col");

            if (columns.length >= 4) {
                var article = columns.eq(0).text();
                var name = columns.eq(2).text();
                var size = columns.eq(3).text();

                docDefinition.content.push('\n', article + '     ' + name + '     ' + size);
            }
        });

        if (docDefinition.content.length <= 1) {
            alert("Не знайдено даних для створення PDF.");
            return;
        }

        pdfMake.createPdf(docDefinition).download(filename);
    }
    // Обробник для кнопки "Завантажити PDF 1"
    $("#download_1").click(function() {
        createPDF("#storage-creating-table--1", 'матеріали_менше_10.pdf', '10');
    });
    // Обробник для кнопки "Завантажити PDF 2"
    $("#download_2").click(function() {
        createPDF("#storage-creating-table--2", 'матеріали_менше_100.pdf', '100');
    });
    // Обробник для кнопки "Завантажити PDF 2"
    $(".burger-menu-list-item__link").click(function() {
        $('.burger__menu').removeClass('burger__menu--is-opened')
    });
    let overlayPhoto = $('.overlay-photo');
    let overlayComponent = $('.overlay-component');
    let overlayReplacement = $('.overlay-replacement');
    let overlayClose = $('.overlay__close');
    $('.page-category__link').click(function (e){
        e.preventDefault();
        $('.page-category__link--is-active').removeClass('page-category__link--is-active');
        $(this).addClass('page-category__link--is-active')
    })
    $(document).on('click', '.materials-table__row', function () {
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
    });
    $(document).on('click', '.open-image', function () {
        overlayPhoto.addClass('overlay--photo');
        overlayPhoto.addClass('overlay--is-active');
        overlayPhoto.find('img').attr('src', $(this).attr('src'));
    });
    $(document).on('click', '.select-recept__photo', function () {
        overlayPhoto.addClass('overlay--photo');
        overlayPhoto.addClass('overlay--is-active');
        overlayPhoto.find('img').attr('src', $(this).data('image'));
    });
    overlayClose.click(function (){
        overlayPhoto.removeClass('overlay--is-active');
        overlayComponent.removeClass('overlay--is-active');
        overlayReplacement.removeClass('overlay--is-active');
        setTimeout(function (){
            overlayPhoto.removeClass('overlay--photo');
            overlayComponent.removeClass('overlay--form');
            overlayReplacement.removeClass('overlay--form');
        }, 500)
    })
    $('.component-form').click(function (){
        overlayComponent.addClass('overlay--is-active');
        overlayComponent.addClass('overlay--form');

        if ($(this).closest('.new-recept ').length > 0) {
            $('.new-recept').submit();
        }
    })
    $('.replacement-form').click(function () {
        overlayReplacement.addClass('overlay--is-active');
        overlayReplacement.addClass('overlay--form');

        var $containsMaterialsList = $('#contains-materials-list');

        // Очищаємо список перед додаванням нових опцій
        $containsMaterialsList.empty();

        // Отримуємо всі .change-recept-table__row, які не мають класу .change-recept-table__row--change
        var $rows = $('.change-recept-table__row:not(.change-recept-table__row--change)');

        $rows.each(function () {
            var $row = $(this);
            var value = $row.find('.change-recept-table__col--1').text();
            var text = $row.find('.change-recept-table__col--3').text();

            // Створюємо та додаємо новий варіант до вибору
            $containsMaterialsList.append($('<option>').val(value).text(text));
        });
    });

    $('.change-recept').submit(function(e) {
        e.preventDefault();
        // Получение значений из формы

        $form = $(this);

        var $category = $form.find("#recept-category").val();
        var $receptId =  $('.page--change-recept').data('recept');
        var $link = $form.find("#etsy-link").val();
        var $receptname = $form.find("#receptname").val();
        var $comment = $form.find("#comment").val();
        var file = $form.find("#myFile")[0].files[0] || $('.change-recept__photo').data('image');
        var changes = $form.find("#changes").val();

        // Создание объекта FormData для передачи данных
        var formData = new FormData();
        formData.append("receptCategory", $category);
        formData.append("receptId", $receptId);
        formData.append("etsyLink", $link);
        formData.append("receptName", $receptname);
        formData.append("comment", $comment);
        formData.append("changes", changes);
        if (file) {
            formData.append("myFile", file);
        }

        // Отправка AJAX-запроса на сервер
        $.ajax({
            url: "requests/recept-new.php", // Укажите путь к скрипту на сервере для обработки запроса
            type: "POST",
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                if ($('.page--recepts .page-category__link').length > 0) {
                    $('.page--recepts .page-category__link')[0].click()
                }
                if ($('.page--materials .page-category__link').length > 0) {
                    $('.page--materials .page-category__link')[0].click()
                }
            },
            error: function() {
                // Обработка ошибок при запросе
                alert("При отправке запроса произошла ошибка.");
            }
        });
    });
    $('.new-recept__btn--save').click(function (){
        $('#clicked').val('true')
        setTimeout(function () {
            $('.page--new-recept form')[0].reset()
            $('.page--new-recept .new-recept-table__row:not(.new-recept-table__row--empty)').remove()
            $('.page--new-recept .new-recept-table__body').html('<div class="new-recept-table__row new-recept-table__row--empty">\n' +
                '                    <div class="new-recept-table__col new-recept-table__col--1">артикул</div>\n' +
                '                    <div class="new-recept-table__col new-recept-table__col--2"></div>\n' +
                '                    <div class="new-recept-table__col new-recept-table__col--3">назва</div>\n' +
                '                    <div class="new-recept-table__col new-recept-table__col--4">розмір</div>\n' +
                '                    <div class="new-recept-table__col new-recept-table__col--5">кількість</div>\n' +
                '                    <div class="new-recept-table__col new-recept-table__col--6">місце</div>\n' +
                '                    <div class="new-recept-table__col new-recept-table__col--7">\n' +
                '                        <button class="btn-delete">\n' +
                '                            X\n' +
                '                        </button>\n' +
                '                    </div>\n' +
                '                </div>')
            $('.page--new-recept .drop-zone__thumb').remove();
            $('.page--new-recept .drop-zone').prepend('<span class="drop-zone__prompt">додати фото</span>')
            $('.page--new-recept').removeClass('opened')
        }, 300)
    })
    $('.new-recept').submit(function(e) {
        e.preventDefault();
        // Получение значений из формы

        $form = $(this);

        var $category = $form.find("#recept-category").val();
        var $receptId = $form.find("#recept-id").val();
        var $link = $form.find("#etsy-link").val();
        var $receptname = $form.find("#receptname").val();
        var $comment = $form.find("#comment").val();
        var file = $form.find("#myFile")[0].files[0];
        var changes = $form.find("#changes").val();

        // Создание объекта FormData для передачи данных
        var formData = new FormData();
        formData.append("receptCategory", $category);
        formData.append("receptId", $receptId);
        formData.append("etsyLink", $link);
        formData.append("receptName", $receptname);
        formData.append("comment", $comment);
        formData.append("changes", changes);
        if (file) {
            formData.append("myFile", file);
        }

        // Отправка AJAX-запроса на сервер
        $.ajax({
            url: "requests/recept-new.php", // Укажите путь к скрипту на сервере для обработки запроса
            type: "POST",
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
               if ($form.find('#clicked').val() === 'true') {
                    if (response.success) {
                        let $successPopup = $('.page--recept-loaded')
                        $successPopup.addClass('opened')
                        $successPopup.find('.page__text').text(response.success)
                    } else if (response.error) {
                        alert(response.error)
                        return;
                    }
                }

                if ($('.page--recepts .page-category__link').length > 0) {
                    $('.page--recepts .page-category__link')[0].click()
                }
                if ($('.page--materials .page-category__link').length > 0) {
                    $('.page--materials .page-category__link')[0].click()
                }
            },
            error: function() {
                // Обработка ошибок при запросе
                alert("При отправке запроса произошла ошибка.");
            }
        });
    });
    $('.new-component-form').submit(function(e) {
        e.preventDefault();

        let $filledForm = $(this)

        // Отримання значень з форми
        let recipeId = $('.page.opened').find('[name="recept-id"]').val() || $('.page.opened').data('recept');

        let components = [];

        // $('.new-component__row').each(function() {
        let original = $(this).find('[name="original"]').val();
        let originalCount = $(this).find('[name="original-count"]').val();
        let replacement1 = $(this).find('[name="replacement-1"]').val();
        let replacementCount1 = $(this).find('[name="replacement-1-count"]').val();
        let replacement2 = $(this).find('[name="replacement-2"]').val();
        let replacementCount2 = $(this).find('[name="replacement-2-count"]').val();

        if (original) {
            let component = {
                original: original,
                originalCount: originalCount,
                replacement1: replacement1,
                replacementCount1: replacementCount1,
                replacement2: replacement2,
                replacementCount2: replacementCount2,
            };

            components.push(component);
        }

        let $modal = $('.page.opened')
        let $tableClass = '';
        if ($modal.hasClass('page--new-recept')) {
            $tableClass = 'new-recept';
        } else {
            $tableClass = 'change-recept';
        }
        // Додавання матеріалів до рецепта
        if (recipeId && components.length > 0) {
            $.ajax({
                url: 'requests/new-component-recept.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    recipeId: recipeId,
                    components: JSON.stringify(components)
                },
                success: function(response) {
                    // Обробка успішного додавання матеріалів до рецепта
                    // console.log(response);
                    var $tableBody = $modal.find('.'+$tableClass + '-table__body');

                    $tableBody.empty();
                    $filledForm[0].reset();
                    overlayClose.click();

                    $('.new-recept-table__row--empty').remove()


                    response.recipe_materials.forEach(function(recipe_material) {
                        var $row = $('<div>').addClass($tableClass + '-table__row');

                        // Створіть і додайте div-елементи з відповідними даними до рядка
                        $row.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--1').text(recipe_material.material_sku));
                        $row.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--2').append($('<img>').attr('src', recipe_material.image).attr('alt', recipe_material.name).addClass($tableClass + '-table__img open-image')));
                        $row.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--3').text(recipe_material.name));
                        $row.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--4').text(recipe_material.size + 'см'));
                        $row.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--5').html(`<span class="counting">${recipe_material.material_count}</span> од.`));
                        $row.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--6').text(recipe_material.placement));
                        var $col1 = $('<div>', { class: $tableClass + '-table__col '+$tableClass+'-table__col--7' });
                        var $label = $('<button>', { class: 'btn-delete', text: 'X' });

                        $row.append($col1.append($label))


                        // Додайте створений рядок до .change-recept-table__body
                        $tableBody.append($row);
                        var materialSkuToCheck = recipe_material.material_sku;
                        var materialsReplacements = response.materials_replacements;

                        var matchingObjects = materialsReplacements.filter(function(replacement) {
                            return replacement.original_sku === materialSkuToCheck;
                        });

                        if (matchingObjects.length > 0) {
                            matchingObjects.forEach(function(matchingObject) {
                                var $rowReplacement = $('<div>').addClass($tableClass + '-table__row').addClass($tableClass + '-table__row--change');
                                $rowReplacement.append($('<input type="hidden" class="data-change">').val(matchingObject.original_sku));
                                // Створіть і додайте div-елементи з відповідними даними до рядка
                                $rowReplacement.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--1').text(matchingObject.material_sku));
                                $rowReplacement.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--2').append($('<img>').attr('src', matchingObject.image).attr('alt', matchingObject.name).addClass($tableClass + '-table__img open-image')));
                                $rowReplacement.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--3').html(matchingObject.name + ' <span style="color: red; margin-left: 3px;">(заміна)</span>'));
                                $rowReplacement.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--4').text(matchingObject.size + 'см'));
                                $rowReplacement.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--5').html(`<span class="counting">${matchingObject.material_count}</span> од.`));
                                $rowReplacement.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--6').text(matchingObject.placement));
                                var $colReplacement = $('<div>', { class: $tableClass + '-table__col '+$tableClass+'-table__col--7' });
                                var $label = $('<button>', { class: 'btn-delete', text: 'X' });

                                $rowReplacement.append($colReplacement.append($label))

                                $tableBody.append($rowReplacement);
                            });
                        }
                    });
                },
                error: function(error) {
                    // Обробка помилки
                    console.error(error);
                }
            });
        }
    });
    $('.new-component-author').submit(function(e) {
        e.preventDefault();

        let $filledForm = $(this)

        // $('.new-component__row').each(function() {
        let original = $(this).find('[name="original"]').val();
        let originalCount = $(this).find('[name="original-count"]').val();

        let $modal = $('.page--author-recept')
        let $tableClass = 'author-recept';
        // Додавання матеріалів до рецепта
            $.ajax({
                url: 'requests/new-component-author.php',
                method: 'POST',
                dataType: 'json',
                data: { sku: original }, // Передайте SKU на сервер
                success: function(response) {
                    // Обробка успішного додавання матеріалів до рецепта
                    // console.log(response);
                    var $tableBody = $modal.find('.'+$tableClass + '-table__body');

                    var sku = response.sku;
                    var image = response.image;
                    var name = response.name;
                    var size = response.size;
                    var placement = response.placement;

                    // Створіть новий рядок та додайте його в контейнер
                    var $tableRow = $('<div class="author-recept-table__row"></div>');
                    $tableRow.append('<div class="author-recept-table__col author-recept-table__col--0"><label class="checkbox-container"><input type="checkbox"><span class="checkmark"></span></label></div>');
                    $tableRow.append('<div class="author-recept-table__col author-recept-table__col--1">' + sku + '</div>');
                    $tableRow.append('<div class="author-recept-table__col author-recept-table__col--2"><img src="' + image + '" alt="' + name + '" class="author-recept-table__img open-image"></div>');
                    $tableRow.append('<div class="author-recept-table__col author-recept-table__col--3">' + name + '</div>');
                    $tableRow.append('<div class="author-recept-table__col author-recept-table__col--4">' + size + ' см</div>');
                    $tableRow.append('<div class="author-recept-table__col author-recept-table__col--5">' + originalCount + ' од.</div>');
                    $tableRow.append('<div class="author-recept-table__col author-recept-table__col--6">' + placement + '</div>');
                    $tableRow.append('<div class="author-recept-table__col author-recept-table__col--7"><button class="btn-delete">X</button></div>');

                    $tableBody.append($tableRow);

                    $filledForm[0].reset();
                    overlayClose.click();
                },
                error: function(error) {
                    // Обробка помилки
                    console.error(error);
                }
            });
    });
    $('.new-replacement').submit(function(e) {
        e.preventDefault();

        // Отримання значень з форми
        let recipeId = $('.page.opened').find('[name="recept-id"]').val() || $('.page.opened').data('recept');

        let components = [];

        // $('.new-component__row').each(function() {
        let original = $(this).find('[name="original"]').val();
        let replacement1 = $(this).find('[name="replacement-1"]').val();
        let replacementCount1 = $(this).find('[name="replacement-1-count"]').val();

        if (original) {
            let component = {
                original: original,
                replacement1: replacement1,
                replacementCount1: replacementCount1,
            };

            components.push(component);
        }

        // Додавання матеріалів до рецепта
        if (recipeId && components.length > 0) {
            $.ajax({
                url: 'requests/new-replacement-recept.php',
                method: 'POST',
                data: {
                    recipeId: recipeId,
                    components: JSON.stringify(components)
                },
                success: function(response) {
                    // Обробка успішного додавання матеріалів до рецепта
                    console.log(response);
                },
                error: function(error) {
                    // Обробка помилки
                    console.error(error);
                }
            });
        }
    });

    // пошуки
    $('.recepts-search__input').on('input', function() {
        var searchText = $(this).val().trim().toLowerCase();

        $('.recepts-table__row').each(function() {
            var $row = $(this);
            var $col = $row.find('.recepts-table__col--3');
            var rowText = $col.text().toLowerCase();

            if (rowText.includes(searchText)) {
                $row.show();
            } else {
                $row.hide();
            }
        });
    });
    $('.analitics-search__input').on('input', function() {
        var searchText = $(this).val().trim().toLowerCase();

        $('.analitics-table__row').each(function() {
            var $row = $(this);
            var $col1 = $row.find('.analitics-table__col.analitics-table__col--1');
            var $col3 = $row.find('.analitics-table__col.analitics-table__col--3');
            var rowText1 = $col1.text().toLowerCase();
            var rowText3 = $col3.text().toLowerCase();

            if (rowText1.includes(searchText) || rowText3.includes(searchText)) {
                $row.show();
            } else {
                $row.hide();
            }
        });
    });
    $('.materials-search__input').on('input', function() {
        var searchText = $(this).val().trim().toLowerCase();

        $('.materials-table__row').each(function() {
            var $row = $(this);
            var $col1 = $row.find('.materials-table__col.materials-table__col--1');
            var $col3 = $row.find('.materials-table__col.materials-table__col--3');
            var rowText1 = $col1.text().toLowerCase();
            var rowText3 = $col3.text().toLowerCase();

            if (rowText1.includes(searchText) || rowText3.includes(searchText)) {
                $row.show();
            } else {
                $row.hide();
            }
        });
    });


//    відкриття категорій рецептів
    $('.page--recepts .page-category__link').on('click', function(e) {
        e.preventDefault();
        let $category = $(this).data('id');

        $.ajax({
            url: 'requests/recepts-by-category.php',
            method: 'POST',
            dataType: 'json',
            data: {
                category: $category,
            },
            success: function(response) {
                var $tableBody = $('.recepts-table__body');

                $tableBody.empty();

                $tableClass = 'recepts';
                if (response.recipes.length < 1) {
                    $tableBody.append('Немає рецептів в категорії.');
                }
                response.recipes.forEach(function(recipe) {
                    var $row = $('<div>').addClass($tableClass + '-table__row').data('recept', recipe.id);

                    // Створіть і додайте div-елементи з відповідними даними до рядка
                    $row.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--1').text('etsy'));
                    $row.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--2').append($('<img>').attr('src', recipe.image).attr('alt', recipe.name).addClass($tableClass + '-table__img open-image')));
                    $row.append($('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--3').text(recipe.recept_name));

                    var $btn = $('<button>', { class: 'simple-btn simple-btn--green open-recept', text: 'відкрити' });
                    var $col = $('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--4');
                    $row.append($col.append($btn))

                    $btn = $('<button>', { class: 'simple-btn simple-btn--black remake-recept', text: 'редагувати' });
                    $col = $('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--5');
                    $row.append($col.append($btn))

                    $btn = $('<button>', { class: 'simple-btn simple-btn--black delete-recept', text: 'видалити' });
                    $col = $('<div>').addClass($tableClass + '-table__col '+$tableClass+'-table__col--6');
                    $row.append($col.append($btn))

                    $tableBody.append($row);
                })
            },
            error: function(error) {
                // Обробка помилки
                console.error(error);
            }
        });
    });
//    відкриття категорій матеріалів
    $('.page--materials .page-category__link').on('click', function(e) {
        e.preventDefault();
        let $category = $(this).data('id');

        $.ajax({
            url: 'requests/materials-by-category.php',
            method: 'POST',
            dataType: 'json',
            data: {
                category: $category,
            },
            success: function(response) {
                var $tableBody = $('.materials-table__body');

                $tableBody.empty();

                $tableClass = 'materials';
                if (response.materials.length < 1) {
                    $tableBody.append('Немає матеріалів в категорії.');
                }
                response.materials.forEach(function(material) {
                    const materialHTML = `
            <div class="materials-table__row
                ${material.count > 10 && material.count < 100 ? 'materials-table__row--yellow' :
                        (material.count > 0 && material.count < 10 ? 'materials-table__row--red' :
                            (material.count === 0 ? 'materials-table__row--empty' : ''))}">
                <div class="materials-table__col materials-table__col--1">${material.sku}</div>
                <div class="materials-table__col materials-table__col--2">
                    <img src="${material.image}" alt="${material.name}" class="materials-table__img open-image">
                </div>
                <div class="materials-table__col materials-table__col--3">${material.name}</div>
                <div class="materials-table__col materials-table__col--4">${material.size} см</div>
                <div class="materials-table__col materials-table__col--5">${material.analogs}</div>
                <div class="materials-table__col materials-table__col--6">${material.placement}</div>
                <div class="materials-table__col materials-table__col--7 materials-table__col--qty">
                    ${material.count} од.
                </div>
            </div>
        `;

                    // Додавання HTML матеріала в тіло таблиці
                    $tableBody.append(materialHTML);
                });

            },
            error: function(error) {
                // Обробка помилки
                console.error(error);
            }
        });
    });
    if ($('.page--recepts .page-category__link').length > 0) {
        $('.page--recepts .page-category__link')[0].click()
    }
    if ($('.page--materials .page-category__link').length > 0) {
        $('.page--materials .page-category__link')[0].click()
    }
});
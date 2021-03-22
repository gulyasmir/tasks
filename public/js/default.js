$(document).ready(function () {
    let heightWindow = document.documentElement.clientHeight
    let heightListInserts = heightWindow - 150 + 'px';
    $("#listInserts").css('height',heightListInserts )
    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
// Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

    $(function () {

    $.get('index/xhrPagination', function (pagination) {
        let link =  getCookie('link')
        let countPage = Math.round(pagination)
        let thisPage = getCookie('page')
        let page = Math.round(thisPage)
        let pageBefore =  (page - 1) ?  Math.round(page - 1) : 1
        let pageNext =  (page < countPage) ?  Math.round(page + 1) : countPage
        let paginationBlock = '<nav>' +
            '    <ul class="pagination">' +
            '        <li class="page-item">' +
            '            <a class="page-link" href="' + link + 'index?page=1" aria-label="Previous">' +
            '                <span aria-hidden="true">&laquo;</span>' +
            '            </a>' +
            '        </li>' +
            '        <li class="page-item">' +
            '            <a class="page-link" href="' + link + 'index?page=' + pageBefore + '" aria-label="Previous">' +
            '                <span aria-hidden="true"><</span>' +
            '            </a>' +
            '        </li>' +
            '        <li class="page-item"><a class="page-link " href="' + link + 'index?page=' + page + '">' + page + '</a></li>' +
            '        <li class="page-item">' +
            '            <a class="page-link" href="' + link + 'index?page=' + pageNext + '" aria-label="Next">' +
            '                <span aria-hidden="true"> > </span>' +
            '            </a>' +
            '        </li>' +
            '        <li class="page-item">' +
            '            <a class="page-link" href="' + link + 'index?page=' + countPage + '" aria-label="Next">' +
            '                <span aria-hidden="true">&raquo;</span>' +
            '            </a>' +
            '        </li>' +
            '    </ul>' +
            '</nav>';

        $('#paginationBlock').append(paginationBlock)

    }, 'json');

        $.get('index/xhrGetListings', function (tasks) {

            let logged = getCookie('logged')
            let link =  getCookie('link')

            logged ? $('#listInserts').append('<h1>Редактировать задачи</h1>') : $('#listInserts').append('<h1>Список задач</h1>')
            for (var i = 0; i <tasks.length; i++) {
               let updated =  tasks[i].updated ? '(Отредактировано администратором)' : ''
                var list_for_admin = '<div class="item status-' + tasks[i].status + '">' +
                    '<div class="name"><span class="title">Имя </span> ' + tasks[i].name +
                    ' -  <a  href="' + link + 'index/update/' + tasks[i].id + '">Редактировать</a></div>' +
                    '<div class="email"><span class="title">Email </span>' + tasks[i].email + '</div>' +
                    '<div><p class="title">Текст задачи  <span class="updated">' + updated + '</span> </p>' + tasks[i].text + '</div>' +
                    '</div>';
                var list_for_all =   '<div class="item status-' + tasks[i].status + '">' +
                    '<div class="name"><span class="title">Имя </span> ' + tasks[i].name +
                    '</div>' +
                    '<div class="email"><span class="title">Email </span>' + tasks[i].email + '</div>' +
                    '<div><p class="title">Текст задачи  <span class="updated">' + updated + '</span> </p>' + tasks[i].text + '</div>' +
                    '</div>';
                logged ? $('#listInserts').append(list_for_admin) : $('#listInserts').append(list_for_all)

            }
        }, 'json');

        $('#taskUpdate').submit(function (event) {

            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                alert('Ошибка!');
            } else {
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(){
                        alert('Задача отредактирована!');
                    }
                });
            }

            return false;
        })
        $('#taskInsert').submit(function (event) {

            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                alert('ошибка!');
            } else {
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(){
                        alert('Задача отправлена!');
                        $('#taskInsert')[0].reset();
                    }
                });
            }

            return false;
        })
    });

});
$(document).ready(function () {
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

        $.get('index/xhrGetListings', function (o) {

            var logged = getCookie('logged')

            logged ? $('#listInserts').append('<h1>Редактировать задачи</h1>') : $('#listInserts').append('<h1>Список задач</h1>')
            for (var i = 0; i <o.length; i++) {
                var list_for_admin =  '<div class="item status-' + o[i].status + '">' +
                    '<div class="title"> ' + o[i].name + ' -  <a  href="/index/update/' + o[i].id + '">Редактировать</a></div>' +
                    '<div class="email">' + o[i].email + '</div>' +
                    '<div>' + o[i].text + '</div>' +
                    '</div>';
                var list_for_all =  '<div class="item status-' + o[i].status + '">' +
                    '<div class="title">' + o[i].name + '</div>' +
                    '<div class="email">' + o[i].email + '</div>' +
                    '<div>' + o[i].text + '</div>' +
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
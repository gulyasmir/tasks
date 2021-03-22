$(document).ready(function () {
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

                $('#listInserts').append(list_for_all);
                $('#listInsertsUpdate').append(list_for_admin);
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
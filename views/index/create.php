<h1>Добавление задачи</h1>
<form id="taskInsert" action="<?php echo URL; ?>index/xhrInsert" method="post" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Имя</label>
        <input type="text" name="name" required class="form-control" id="exampleFormControlInput1" placeholder="Имя">
        <div class="invalid-feedback">
           Пожалуйста, введите имя
        </div>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">Email</label>
        <input type="email" name="email" required class="form-control" id="exampleFormControlInput2" placeholder="Email">
        <div class="invalid-feedback">
            Email не валиден
        </div>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput3" class="form-label">Текст задачи</label>
        <textarea name="text" required class="form-control" id="exampleFormControlInput3" placeholder="Напишите текст задачи"></textarea>
        <div class="invalid-feedback">
            Пожалуйста, введите текст задачи
        </div>
    </div>

    <div class="mb-3">
        <input type="submit" class="btn btn-primary">
    </div>
</form>



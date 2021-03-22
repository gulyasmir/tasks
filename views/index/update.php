<h1>Редактирование задачи <?=$this->index['name'];?></h1>
<form id="taskUpdate" action="<?php echo URL; ?>index/xhrUpdate/<?=$this->index['id'];?>" method="post" class="needs-validation" novalidate>

    <div class="mb-3">
        <input class="form-check-input"  name="status" type="checkbox" value="<?php if (checked =='checked') { echo '1';}?>" id="flexCheckDefault" <?php if ($this->index['status']) {echo 'checked';}?>>
        <label class="form-check-label" for="flexCheckDefault">
            Задача выполнена
        </label>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Имя</label>
        <input type="text" name="name" required class="form-control" id="exampleFormControlInput1" value="<?=$this->index['name'];?>">
        <div class="invalid-feedback">
            Пожалуйста, введите имя
        </div>
    </div>


    <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">Email</label>
        <input type="email" name="email" required class="form-control" id="exampleFormControlInput2" value="<?=$this->index['email'];?>">
        <div class="invalid-feedback">
            Пожалуйста, введите Email
        </div>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput3" class="form-label">Текст задачи</label>
        <textarea name="text" required class="form-control" id="exampleFormControlInput3" ><?=$this->index['text'];?></textarea>
        <div class="invalid-feedback">
            Пожалуйста, введите текст задачи
        </div>
    </div


    <div class="mb-3">
        <input type="submit" class="btn btn-primary">
    </div>
</form>



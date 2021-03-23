<h1>Редактирование задачи <?=$this->index['name'];?></h1>
<form id="taskUpdate" action="<?php echo URL; ?>index/xhrUpdate/<?=$this->index['id'];?>" method="post" class="needs-validation" novalidate>
    <input  id="isUpdated" name="updated" type="hidden" value="" />
    <div class="mb-3">
        <input class="form-check-input"  name="status" type="checkbox" value="<?php if (checked =='checked') { echo '1';}?>" id="flexCheckDefault" <?php if ($this->index['status']) {echo 'checked';}?>>
        <label class="form-check-label" for="flexCheckDefault">
            Задача выполнена
        </label>
    </div>

    <div class="mb-3">
        <label for="textTaskUpdate" class="form-label">Текст задачи</label>
        <textarea name="text" required class="form-control" onchange="isUpdated.value=1" ><?=$this->index['text'];?></textarea>
        <div class="invalid-feedback">
            Пожалуйста, введите текст задачи
        </div>
    </div

    <div class="mb-3">
        <input type="submit" class="btn btn-primary">
    </div>
</form>



<?php
$logged = Session::get('loggedIn');
if($logged == true):?>
    <h1>Редактировать задачи</h1>
    <div id="listInsertsUpdate"></div>
<?php else: ?>
    <h1>Список задач</h1>
    <div id="listInserts"></div>
<?php endif; ?>
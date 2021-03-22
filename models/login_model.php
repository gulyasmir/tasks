<?php

class Login_Model extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function run() {
        $sth = $this->db->prepare("SELECT id FROM pr_user WHERE login = :login AND password = MD5(:password)");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));


        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if($count > 0) {
            Session::init();
            Session::set('loggedIn', true);
            header('Location: '.URL.'/index');
        } else {
            echo '<div
                        style="padding-top: 10%;
                        color:#ff0000;
                        text-align: center;
                        font-size:120%;"
                        >
                        Логин или  пароль неверен! <br><br>
                         <a class="nav-link" aria-current="page" href="'. URL.'"index">
                        На главную</a></div>';
        }

    }
}
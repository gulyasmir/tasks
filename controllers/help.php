<?php
class Help extends Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('help/index');
    }

    public function other($arg = false) {
        echo "<br> Мы в методе other контроллера Help <br>";
        echo "Параметры: ".$arg;

        require 'models/help_model.php';
        $model = new Help_Model();
    }
}
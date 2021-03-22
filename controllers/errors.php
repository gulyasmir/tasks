<?php
class Errors extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->msg = 'Страницы не существует!';
        $this->view->render('errors/index');
    }

}

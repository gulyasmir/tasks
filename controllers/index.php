<?php
class Index extends Controller {
    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged == false) {
            Session::destroy();
        }
        $this->view->js = array('default.js');
    }

    public function index() {

       $this->view->render('index/index');
    }

    public function create() {
        $this->view->render('index/create');
    }

    public function update($id) {
        $logged = Session::get('loggedIn');
        if($logged) {
            $this->view->index = $this->model->xhrGetSingle($id);
            $this->view->render('index/update');
        } else{
            header('Location: /index');
        }
    }


    public function logout() {
        Session::destroy();
        header('Location: ../login');
        exit();
    }
    function xhrInsert() {
        $this->model->xhrInsert();
        header('Location: /index');
    }

    public function xhrUpdate($id) {
        $this->model->xhrUpdate($id);
        header('Location: /index');
    }

    public function xhrGetListings() {
        $this->model->xhrGetListings();
    }


}

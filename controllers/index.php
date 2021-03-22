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
        if ($_GET["sort"]){
            $sort = htmlspecialchars($_GET["sort"]);
            setcookie('sort',$sort);
        }
        if ($_GET["order"]){
        $order = htmlspecialchars($_GET["order"]);
        setcookie('order', $order);
        }
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
            header('Location: '.URL.'/index');
        }
    }


    public function logout() {
        Session::destroy();
        header('Location: '.URL.'/login');
        exit();
    }
    function xhrInsert() {
        $this->model->xhrInsert();
        header('Location: '.URL.'/index');
    }

    public function xhrUpdate($id) {
        $this->model->xhrUpdate($id);
        header('Location: '.URL.'/index');
    }

    public function xhrGetListings() {
        if(isset($_COOKIE['sort'])){
            $sort = $_COOKIE['sort'];
        }else{
            $sort = 'id';
        }
        if(isset($_COOKIE['order'])){
            $order = $_COOKIE['order'];
        }else{
            $order = 'asc';
        }
        $this->model->xhrGetListings($sort, $order);
    }


}

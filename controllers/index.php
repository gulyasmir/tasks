<?php
class Index extends Controller {
    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        setcookie('logged', true);
        if($logged == false) {
            Session::destroy();
            setcookie('logged', false);
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
        if ($_GET["page"]){
            $page = htmlspecialchars($_GET["page"]);
            setcookie('page',$page);
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
        setcookie('logged', false);
        Session::destroy();
        header('Location: '.URL.'/login');
        exit();
    }

    public function xhrInsert() {
        $this->model->xhrInsert();
        header('Location: '.URL.'/index');
    }

    public function xhrUpdate($id) {
        $this->model->xhrUpdate($id);
        header('Location: '.URL.'/index');
    }

    public function xhrPagination(){
        $count_pages  = $this->model->xhrGetCount();
        echo  $count_pages;
    }

    public function xhrGetListings() {

        isset($_COOKIE['sort']) ? $sort = $_COOKIE['sort'] :  $sort = 'id';
        isset($_COOKIE['order']) ? $order = $_COOKIE['order'] : $order = 'asc';
        isset($_COOKIE['page']) ? $page = $_COOKIE['page'] : $page =  1;

        $size_page = SIZE_PAGE;

        $offset = ($page - 1) * $size_page;

        $this->model->xhrGetListings($sort, $order, $offset, $size_page);
    }


}

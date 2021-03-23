<?php
class Index extends Controller {
    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $cookies_logged =  time() + 10;


        $time_delete =  time() - 10;

        setcookie('logged', 1, $time_delete);
        setcookie('logged', true, $cookies_logged);

        if($logged == false) {
            Session::destroy();
            setcookie('logged', false,$time_delete);
        }

        if (isset($_COOKIE['page'])){
            setcookie('page', 1, $time_delete);
        }

        if (!isset($_COOKIE['link'])){
            setcookie('link', URL);
        }
        $this->view->js = array('default.js');
    }

    public function index() {
        $cookies_time =  time() + 1000;
        if ($_GET["sort"]){
            $sort = htmlspecialchars($_GET["sort"]);
            setcookie('sort', $sort, $cookies_time);
        }
        if ($_GET["order"]){
            $order = htmlspecialchars($_GET["order"]);
            setcookie('order', $order, $cookies_time);
        }
        if ($_GET["page"]){
            $page = htmlspecialchars($_GET["page"]);
            setcookie('page',$page, $cookies_time);
        } else {
            setcookie('page', 1, $cookies_time);
        }
        if ($_GET["message"]){
            if  ($_GET["message"] == 'success' ) { echo '<script type="text/javascript"> alert("Задача добавлена!")</script>';}
            if  ($_GET["message"] == 'updated' ) { echo '<script type="text/javascript"> alert("Задача отредактирована!")</script>';}
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
            header('Location: '.URL.'login');
        }
    }

    public function logout() {
        setcookie('logged', false);
        Session::destroy();
        header('Location: '.URL.'login');
        exit();
    }

    public function xhrInsert() {
        $this->model->xhrInsert();
        header('Location: '.URL.'index?message=success');
    }

    public function xhrUpdate($id) {
        $logged = Session::get('loggedIn');
        if($logged) {
            $this->model->xhrUpdate($id);
            header('Location: ' . URL . 'index?message=updated');
        } else {
            header('Location: '.URL.'login');
        }
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

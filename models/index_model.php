<?php
class Index_Model extends Model {
    function __construct() {
        parent::__construct();
    }

  function xhrInsert() {
       $name = htmlspecialchars($_POST['name']);
       $email = htmlspecialchars($_POST['email']);
       $text = htmlspecialchars($_POST['text']);

       $query = "INSERT INTO `".DB_PREFIX."task` (`name`, `email`, `text`, `status`) VALUES ('".$name."', '".$email."', '".$text."', '0');";
       $sth = $this->db->prepare($query );
       $sth->execute(array(':name' => $name,':email' => $email,':text' => $text, ':status' =>'0'));
  }
    function xhrGetSingle($id) {
        $query = "SELECT `id`, `text`, `status` FROM `".DB_PREFIX."task` WHERE `id` = '".$id."'";
        $sth = $this->db->prepare($query );
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function xhrUpdate($id) {
        $text = htmlspecialchars($_POST['text']);
        $status = htmlspecialchars($_POST['status']);
        $updated = htmlspecialchars($_POST['updated']);

        if (!$status){
            $status = 0;
        }
        $query = "UPDATE `".DB_PREFIX."task` SET `text`= '".$text."' ,`status`= '".$status."' , `updated`= '".$updated."'  WHERE  `id`= '".$id."' ";

        $sth = $this->db->prepare($query );
        $sth->execute(array(':text' => $text, ':status' => $status, ':updated' => $updated));
    }

    public function xhrGetListings($sort,$order, $offset, $size_page) {
        $sth = $this->db->prepare("SELECT  `id`, `name`, `email`, `text`, `status`, `updated` FROM `".DB_PREFIX."task` WHERE 1 ORDER BY `".$sort."` $order  LIMIT $offset, $size_page");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }

    function xhrGetCount() {
        $query = "SELECT COUNT(*) FROM `".DB_PREFIX."task`";
        $count = $this->db->prepare($query );
        $count->execute();
        $data = $count->fetch();
        $result = $data[0]/SIZE_PAGE;
        return json_encode($result);

    }

}

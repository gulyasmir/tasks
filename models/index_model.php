<?php
class Index_Model extends Model {
    function __construct() {
        parent::__construct();
    }

  function xhrInsert() {
       $name = htmlspecialchars($_POST['name']);
       $email = htmlspecialchars($_POST['email']);
       $text = htmlspecialchars($_POST['text']);

       $query = "INSERT INTO `pr_task` (`name`, `email`, `text`, `status`) VALUES ('".$name."', '".$email."', '".$text."', '0');";
       $sth = $this->db->prepare($query );
       $sth->execute(array(':name' => $name,':email' => $email,':text' => $text, ':status' => $status));

  }
    function xhrGetSingle($id) {
        $query = "SELECT `id`, `name`, `email`, `text`, `status` FROM `pr_task` WHERE `id` = '".$id."'";
        $sth = $this->db->prepare($query );
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function xhrUpdate($id) {

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $text = htmlspecialchars($_POST['text']);
        $updated = '1';
        $status = $_POST['status'];
        if (!$status){
            $status = 0;
        }
        $query = "UPDATE `pr_task` SET  `name`= '".$name."' ,`email`= '".$email."' ,`text`= '".$text."' ,`status`= '".$status."' , `updated`= '".$updated."'  WHERE  `id`= '".$id."' ";

        $sth = $this->db->prepare($query );
        $sth->execute(array(':name' => $name,':email' => $email,':text' => $text, ':status' => $status));
    }

    public function xhrGetListings($sort,$order, $offset, $size_page) {
        $sth = $this->db->prepare("SELECT * FROM `pr_task` WHERE 1 ORDER BY `".$sort."` $order  LIMIT $offset, $size_page");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }

    function xhrGetCount() {
        $query = "SELECT COUNT(*) FROM `pr_task`";
        $count = $this->db->prepare($query );
        $count->execute();
        $data = $count->fetch();
        $result = $data[0]/SIZE_PAGE;
        return json_encode($result);

    }

}

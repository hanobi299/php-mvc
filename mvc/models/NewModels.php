<?php
    include_once './mvc/models/DB.php';
class NewModels extends DB {
    public $con =null;
    public function __construct() {
        $this->con = new DB();
    }
    public function getList_new()
    {
        $str="SELECT * FROM  news ";
		$data= $this->con->Select($str);
		return $data;
    }
    public function insert_new($dataArr,$name){
	    $sql ="INSERT INTO `news`( `title`, `description`, `image`, `status`, `author`, `created_at`,`updated_at`) 
                VALUES ('".$dataArr['title']."','".$dataArr['des']."','".$dataArr['image']."','".$dataArr['status']."','".$name."','".$dataArr['created_at']."','NULL')";
        $var = $this->con->execute_news($sql);
        return $var;
         
       
	}

    public function update_new($id_news,$dataArr)
    {
        $sql = " UPDATE `news` SET `title`='".$dataArr['title']."',`description`='".$dataArr['des']."',`image`='".$dataArr['image']."',`status`='".$dataArr['status']."',`updated_at`='".$dataArr['updated_at']."' WHERE id_news = $id_news";    
        $this->con->select($sql);

    }
    public function select_id_new($id){
		$str="SELECT * FROM  news  WHERE id_news ='".$id."'";
		$data=$this->con->Select($str);
	}
    public function delete_news($id_news)
    { 
        $sql = "DELETE FROM news WHERE id_news= '$id_news'";
        $this->con->Select($sql);
    }  

}
?>
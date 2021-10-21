<?php
    require_once './mvc/models/DB.php';
    class model extends DB {
        protected $con;
        public function __construct() {
            $this->con = new DB();
        }

            // thực hiện câu lệnh truy vấn

            public function signup($name,$email,$pass1,$ngaydangky)
            {
                $sql="INSERT INTO `user`(`name`, `email`, `password`, `created_at`) VALUES ('$name','$email','$pass1','$ngaydangky')";
                $this->con->execute($sql);
            }

            public function login($name,$pass){
                $sql="select *from user where name ='".$name."'and password='".$pass."'";
                $data=$this->con->Select($sql);
                return $data;

            }
            public function count_user($name,$pass){
                $sql="select*from user where name = '".$name."' and password = '".$pass."'";
                $this->result=$this->con->execute($sql);
                if (!empty($this->result->num_rows)==0) {
                     $count=0;
                }else{
                     $count=1;
                 }
                 return $count;
            }
            public function checkuser($name){
                $sql="select*from user where name='".$name."'";
                $this->result=$this->con->execute($sql); 
                if(!empty($this->result->num_rows)==0){
                    return 0;
                }else{
                    return 1;
    
                    }  
            }
            public function getAllnews1($limit, $page)
            {
                $sql="select *, (select count(id_news) from news ) as total from news LIMIT ".(($page - 1) * $limit).", ".'3'."";
                $this->result=$this->conn->query($sql);
                if ($this->result->num_rows==0) {
                    $data=0;
                }else{
                    while ($row=$this->result->fetch_assoc()) {
                        $data[]=$row;
                    }
                }
                return $data;
            }
            // public function getAllnews(){
            //     $sql = "SELECT * FROM `news`";
            //     $this->result=$this->con->Select($sql);
            //     if ($this->result->num_rows==0) {
            //         $data=0;
            //     }else{
            //         while ($row=$this->result->fetch_assoc()) {
            //             $data[]=$row;
            //             }
            //         }
            //     return $data;

            // }
            public function getAllnewscttag($limit,$page){
                    $sql = "SELECT n.* ,user.name,nt.id_newsterm,
                    GROUP_CONCAT(tc.name SEPARATOR ', ' ) AS Category,
                    GROUP_CONCAT(t.name SEPARATOR ', ') AS Tag
                    FROM user,news n
                    LEFT JOIN newsterm nt ON n.id_news = nt.id_news
                    LEFT JOIN term tc ON nt.id_term = tc.id_term AND tc.key_term ='category'
                    LEFT JOIN term t ON nt.id_term = t.id_term AND t.key_term ='tag'
                    WHERE
                    user.id_user =nt.id_user
                    GROUP BY n.id_news  LIMIT ".(($page - 1) * $limit).", ".'3'."";
                    $this->result=$this->con->execute($sql);
                    if ($this->result->num_rows==0) {
                        $data=0;
                     }else{
                       while ($row=$this->result->fetch_assoc()) {
                          $data[]=$row;
                                   }
                               }
                    return $data;
                
            }
            public function getAlltermpage($limit,$page){
                $sql = "select *, (select count(id_term) from term ) as total from term LIMIT ".(($page - 1) * $limit).", ".'5'."";
                $this->result=$this->con->execute($sql);
                if ($this->result->num_rows==0) {
                      $data=0;
                   }else{
                     while ($row=$this->result->fetch_assoc()) {
                        $data[]=$row;
                                 }
                             }
                  return $data;
            }
            public function getTermid($id_term){
                $sql = "SELECT * FROM `term` WHERE id_term = $id_term";
                $this->result=$this->con->execute($sql);
                if ($this->result->num_rows==0) {
                      $data=0;
                   }else{
                     while ($row=$this->result->fetch_assoc()) {
                        $data[]=$row;
                                 }
                             }
                  return $data;
            }

            public function getUser(){
                $sql ="SELECT * FROM `user`";
                $this->result=$this->conn->query($sql);
                if ($this->result->num_rows==0) {
                      $data=0;
                   }else{
                     while ($row=$this->result->fetch_assoc()) {
                        $data[]=$row;
                                 }
                             }
                  return $data;
            }
            public function getAllcategory(){
                $sql = "SELECT* FROM term WHERE term.key_term = 'category'";
                $this->result=$this->con->execute($sql);
                if ($this->result->num_rows==0) {
                    $data=0;
                }else{
                    while ($row=$this->result->fetch_assoc()) {
                        $data[]=$row;
                        }
                    }
                return $data;

            }
            public function getAlltags(){
                $sql = "SELECT * FROM term WHERE term.key_term = 'tag'";
                $this->result=$this->con->execute($sql);
                if($this->result->num_rows==0) {
                    $data=0;
                }else{
                    while ($row=$this->result->fetch_assoc()) {
                        $data[]=$row;
                        }
                    }
                return $data;

            }
            public function getUser_id($id){
                $sql ="SELECT * FROM user where id_user = $id ";
                $this->result=$this->con->execute($sql);
                if($this->result->num_rows==0) {
                      $data=0;
                   }else{
                while ($row=$this->result->fetch_assoc())
                      {
                        $data[]=$row;
                                 }
                             }
                  return $data;
            }
            public function edituser($id,$pass,$email,$update){
                $sql ="UPDATE `user` SET `email`='$email',`password`='$pass',`updated_at`='$update' WHERE id_user = $id";
                $this->result=$this->con->execute($sql);
                if($this->result->num_rows==0) {
                      $data=0;
                   }else{
                     while ($row=$this->result->fetch_assoc()) {
                        $data[]=$row;
                                 }
                             }
                  return $data;
            }
            public function getAllterm(){
                $sql = "SELECT * FROM `term`";
                $result=$this->con->Select($sql);
                return $result;
     
            }
            public function addterm($name_term,$key_term){
                $sql =" INSERT INTO `term`( `name`, `key_term`) VALUES ('".$name_term."','".$key_term."')";
                $result=$this->con->Select($sql);
            
            }
            public function editterm($id_term,$name_term,$key_term){
                $sql ="UPDATE `term` SET `name`='".$name_term."',key_term ='".$key_term."' WHERE id_term ='".$id_term."'";
                $this->result=$this->con->Select($sql);
            }
            public function delete_term($id_term){
                $sql = "DELETE FROM `term` WHERE id_term = $id_term";
                $result=$this->con->Create_Update_tb($sql);


            }
            // public function addnews($dataArr,$name){
            //     $sql ="INSERT INTO `news`( `title`, `description`, `image`, `status`, `author`, `created_at`,`updated_at`) 
            //     VALUES ('".$dataArr['title']."','".$dataArr['des']."','".$dataArr['image']."','".$dataArr['status']."','".$name."','".$dataArr['created_at']."','NULL')";
            //     $result=$this->conn->query($sql);
                
            //       return $this->conn->insert_id;

            // }

            public function getnewscttagid($id_news){
                $sql = "SELECT n.* ,user.name,nt.id_term,
                GROUP_CONCAT(tc.name SEPARATOR ', ' ) AS Category,
                GROUP_CONCAT(t.name SEPARATOR ', ') AS Tag
                FROM user,news n
                LEFT JOIN newsterm nt ON n.id_news = nt.id_news
                LEFT JOIN term tc ON nt.id_term = tc.id_term AND tc.key_term ='category'
                LEFT JOIN term t ON nt.id_term = t.id_term AND t.key_term ='tag'
                WHERE
                user.id_user =nt.id_user
                AND n.id_news = $id_news";
                $this->result=$this->con->execute($sql);
                if($this->result->num_rows==0) {
                      $data=0;
                   }else{
                     while ($row=$this->result->fetch_assoc()) {
                        $data[]=$row;
                                 }
                             }
                  return $data;
            }
            public function editnewsterm($id_newsterm,$value){
                $sql ="UPDATE `newsterm` SET `id_term`='".$value."' WHERE `id_newsterm`='".$id_newsterm."',";
                $result=$this->con->execute($sql);
                if($this->result->num_rows==0) {
                    $data=0;
                 }else{
                   while ($row=$this->result->fetch_assoc()) {
                      $data[]=$row;
                               }
                           }
                return $data;
            }
            // public function editnews($id_news,$dataArr){
            //     $sql = " UPDATE `news` SET `title`='".$dataArr['title']."',`description`='".$dataArr['des']."',`image`='".$dataArr['image']."',`status`='".$dataArr['status']."',`updated_at`='".$dataArr['updated_at']."' WHERE id_news = $id_news";
            //     $result=$this->conn->query($sql);
            //     return $result;
            // }
            public function deletenewsterm($id_newsterm){
                $sql ="DELETE FROM `newsterm` WHERE id_newsterm = $id_newsterm";
                $result=$this->con->select($sql);
                return $result;
            }
            // public function deletenews($id_news){
            //     $sql ="DELETE FROM `news` WHERE id_news = $id_news";
            //     $result=$this->conn->query($sql);
            //     return $result;
            // } 
            public function addnewsterm($new_id,$value,$id){
                    $sql="INSERT INTO `newsterm`( `id_news`, `id_term`, `id_user`) VALUES ($new_id,$value,$id)";
                    $result=$this->con->select($sql);

            }
            

     }
?>
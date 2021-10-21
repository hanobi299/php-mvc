<?php 
session_start();

 ?>
<?php
require_once './mvc/models/models.php';
require_once './mvc/models/NewModels.php';

    class Controller{
        public $models;
		function __construct()
		{
			$this->models =new model();
            $this->newmodels = new NewModels();
		}	


        public function Controller(){
            if(isset($_GET['action'])){
                switch($_GET['action']){
                    case 'home-admin':
                        require_once './mvc/views/home.php';
                    break;
                    case 'login': 
                        include_once('./mvc/views/admin/login.php');
                        if (isset($_POST['login'])) {
                            $name= $_POST['name'];
                            echo $name;
                            $pass=md5($_POST['pass']);
                            echo $pass;
                            $data=$this->models->login($name,$pass);
                            $count =$this->models->count_user($name,$pass);
                                if ($count==0) {
                                    echo '<script type="text/javascript">';
                                    echo ' alert("đăng nhập thất bại!")';
                                    echo '</script>';
                                } else {
                                    $_SESSION['name']= $name;
                                    $_SESSION['email']= $data[0]['email'];
                                    $_SESSION['id']= $data[0]['id_user'];
                                        header('Location:index.php?action=home-admin');
                                    }
                            }    
                        break;
                    case 'signup':
                        require_once 'views/admin/signup.php';
                        if(isset($_POST['submit'])){
                           $name       = $_POST["name"];
                           $pass1      = md5($_POST["pass"]);
                           $pass2      = md5($_POST["pass1"]);
                           $email      = $_POST["email"];
                           $ngaydangky = date("Y-m-d");
                           if ($name==""||$pass1==""||$email=="") {
                               echo "Yêu cầu nhập đủ dữ liệu";
                           }
                           else{
                               $sql="select*from user where name='".$name."'";
                               $this->result = $this->models->checkuser($name);
                               if($this->result==0&&$pass1==$pass2){
                                   $this->models->signup($name,$email,$pass1,$ngaydangky);
                                   header("location:index.php?action=login&message=success");
                             
                               }else{ 
                                   if ($this->result!=0) {
                                       echo '<script type="text/javascript">';
                                         echo ' alert("Tài khoản đã tồn tại!")';  //not showing an alert box.
                                         echo '</script>';
                                   
                                   }
                                   if ($pass1!=$pass2) {
                                        echo '<script type="text/javascript">';
                                         echo ' alert("Mật khẩu không khớp !")';  //not showing an alert box.
                                         echo '</script>';
                                   }
                               }

                           }

                       }	

                       break;
                    case 'my-account':
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $data = $this->models->getUser_id($id);
                            require_once('./mvc/views/admin/my-account.php');
                            if (isset($_POST['edit'])) {
                                $id = $_GET['id'];
                                $pass = md5($_POST['pass']);
                                $email = $_POST['email'];
                                $update = date('Y-m-d');
                                $this->models->edituser($id,$pass,$email,$update);
                                header('Location:index.php?action=login&message=update');
                            }
                        }
                            
                           
                            
                    break;
                    case 'manage-news':
                        $data = $this->newmodels->getList_new();
                        $number = count($data);
                        $ketqua = $this->models->getAllnewscttag(3, isset($_GET['page'])? $_GET['page'] : 1);
                        $page = isset($ketqua)?  $number < 3? 1 : ( $number % 3 > 0)? ($number / 3) + 1:  $number/3 : 0;
                        require_once ('./mvc/views/news/manage-news.php');
                    break;
                    case 'addnews':
                            $id_user = $_SESSION['id'];
                            $name = $_SESSION['name'];
                            $cate = $this->models->getAllcategory();
                            $tag = $this->models->getAlltags();
                           
                            require_once 'views/news/addnews.php';
                            if(isset($_POST['add'])){
                                if(!empty($_POST['title'])){
                                    
                                    $title = $_POST['title'];
                                }
                                if(!empty($_POST['des'])){
                                    
                                    $des = $_POST['des'];
                                }
                                if(!empty($_POST['image'])){
                                    $image= $_POST['image'];

                                }
                                // if(!empty($_POST['status'])){
                                //     $status = $_POST['status'];
                                //     var_dump($status);
                                // }      
                              
                                $category = $_POST['category'];    
                                $tags  = $_POST['tag'];
                                
                                $created_at = date('Y-m-d');
                                $status = $_POST['status'];
                                $dataArr = array(
                                    'title' => $title,
                                    'des' => $des,
                                    'image' => $image,
                                    'status' => $status,
                                    'created_at' => $created_at
                                );
                                $new_id = "";
                                $new_id = $this->newmodels->insert_new($dataArr,$name);
                               
                                // if (!is_array($category)) {
                                //     $categories = [$category];
                                // }
                                // if (!is_array($tags)) {
                                //     $tag = [$tags];
                                // }
                                $data_term = array_merge($category,$tags);
                                if ($data_term) {
                                    foreach ($data_term as $value) {
                                     $this->models->addnewsterm($new_id,$value,$id_user);
                                    
                                 }
                                    header('Location:index.php?action=manage-news&message=success');
                                }
                            }
                        
                    break;
                    case 'edit-news':
                        if(isset($_GET['id_news'])||isset($_GET['id_newsterm'])){
                            $id_news = $_GET['id_news'];
                            $id_newsterm = $_GET['id_newsterm'];
                            $cate = $this->models->getAllcategory();
                            $tag = $this->models->getAlltags();
                            $getnewscttag = $this->models->getnewscttagid($id_news);
                            require_once './mvc/views/news/editnews.php';
                            if(isset($_POST['edit'])){
                                if(!empty($_POST['title'])){
                                    
                                    $title = $_POST['title'];
                                }
                                if(!empty($_POST['des'])){
                                    
                                    $des = $_POST['des'];
                                }
                                if(!empty($_POST['image'])){
                                    
                                    $image= $_POST['image'];
                                }else{
                                    $image= $_POST['images'];
                                }
                                // if(!empty($_POST['status'])){
                                //     $status = $_POST['status'];
                                //     var_dump($status);
                                // }      
                              
                                $category = $_POST['category'];    
                                $tags  = $_POST['tag'];
                                
                                $updated_at = date('Y-m-d');
                                $status = $_POST['status'];
                                $dataArr = array(
                                    'title' => $title,
                                    'des' => $des,
                                    'image' => $image,
                                    'status' => $status,
                                    'updated_at' => $updated_at
                                );
                                 $this->newmodels->update_new($id_news,$dataArr);                               
                                $data_term = array_merge($category,$tags);
                                if ($data_term) {
                                    foreach ($data_term as $value) {
                                     $this->models->editnewsterm($id_newsterm,$value);
                                    }
                                    header('Location:index.php?action=manage-news&message=success');
                                }
                            }



                        }


                    break;
                    case 'delete-news':
                        $id_news = $_GET['id_news'];
                        $id_newsterm = $_GET['id_newsterm'];
                        $this->newmodels->delete_news($id_news);
                        $this->models->deletenewsterm($id_newsterm);
                        header('Location:index.php?action=manage-news&message=success');


                    break;
                    case 'manage-term':
                        $data_term = $this->models->getAllterm();
                        $number = count($data_term);
                        $result = $this->models->getAlltermpage(5, isset($_GET['page'])? $_GET['page'] : 1);
                        $page = isset($result)?$number < 5? 1 : ( $number % 5 > 0) ? ( $number /5) + 1:  $number/5 : 0;
                        require_once './mvc/views/term/manage-term.php';
                        break;
                    case 'add-term':
                        require_once './mvc/views/term/addterm.php';
                        if(isset($_POST['add'])){
                            $name_term = $_POST['name_term'];
                            $key_term  = $_POST['key_term'];
                            $this->models->addterm($name_term,$key_term);
                            header('Location:index.php?action=manage-term&message=success');
                        }else{
                            echo 'Lỗi';
                        }
                    break;
                    case 'edit-term':
                        if(isset($_GET['id_term'])){
                            $id_term = $_GET['id_term'];
                            $data_term = $this->models->getTermid($id_term);
                            require_once './mvc/views/term/edit-term.php ';
                            if (isset($_POST['edit'])) {
                                $name_term = $_POST['name_term'];
                                $key_term  = $_POST['key_term'];
                                $this->models->editterm($id_term, $name_term, $key_term);
                                header('Location:index.php?action=manage-term&message=success');
                            }
                        }
                    break;
                    case 'delete-term':
                        if(isset($_GET['id_term'])){
                            $id_term = $_GET['id_term'];
                            $this->models->delete_term($id_term);
                            header('Location:index.php?action=manage-term&message=success');
                        }
                    break;
                }
            }else{
                header('Location:index.php?action=login');
            }
        }
    }

?>

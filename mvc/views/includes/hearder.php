<?php
if (isset($_POST['nutdx'])) {
	session_unset();
	header("location:index.php?action=login");
}
?>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quản lý</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/themsua.css">
    <link rel="stylesheet" type="text/css" href="css/quanly.css">

</head>
<body>
    <div class="container_12">
        <div class="khung">   
          <div class="khung1">
            
          <div class="phai">
                <div class="usertrai">
                </div>
                <div class="userphai">
                    <ul>
                      <li><?php echo $_SESSION['name']?></li>
                    <li><form class="dangxuat" method="POST"><button name="nutdx" type="submit" class="btn btn-warning">Logout</button></form></li>
                    </ul>
                </div>
            </div>
      
        </div>
        <div class="clear">
        </div>
       <div class="khung2">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
              </div>
              <ul class="nav navbar-nav">
               <li><a href="index.php?action=home-admin">Home</a></li>
              <li><a href="index.php?action=my-account&id=<?php echo $_SESSION['id'] ?>">My Account</a></li>
              <li><a href="index.php?action=manage-news">Manage News</a></li>
              <li><a href="index.php?action=manage-term">Manage Term</a></li>
              <!-- <li><a href="index.php?action=add-term">Add Term</a> -->
                  <ul class="menu_sub">
                      <li><a href=""></a></li>
                  </ul>
            
            
            </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
          <div class="menutrai">
             <ul>
            
            
           </ul>
        </div>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="from-login">
                <form class="boxlogin" method="post">
                <?php 
        if(isset($_GET['message']) && $_GET['message'] == 'update' )
        {
            echo '<script type="text/javascript">';
  			echo ' alert("update thành công! Hãy đăng nhập lại.")';  //not showing an alert box.
  			echo '</script>';;
        }
    ?>
                      <header class="title"> Đăng Nhập </header>
                        <div class="nameuser">
                            <input class="name" type="text" name="name" placeholder="Nhập tên người dùng">
                        </div>
                        <div class="password">
                            <input class="pass" type="password" name="pass" placeholder="Nhập mật khẩu">
                        </div>
                    <div class="button">
                        <button type="submit" name="login" class="bn">LOGIN</button>
                        <button class="bn" ><a href="index.php?action=signup">Đăng ký</a></button>
                    </div>
                </form> 
            </div>

        </div>

    </div>
    
</body>
</html>
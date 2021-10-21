
<?php include ('./mvc/views/includes/hearder.php') ?> 
	        <div class="nd">

       
        <form class="boxsua" method="POST">
        <h1 style="text-align: center;color:black">Thông Tin Cá Nhân</h1>
                        <p>( Sửa và ấn UPDATE để thay đổi thông tin cá nhân )</p>
		<div class="dong">
			<div class="cot1">Mật Khẩu</div>
			<div class="cot2">
				<input class="td" type="text" name="pass" value="<?php echo $data[0]['password'];?>">

			</div>
		</div>
        <div class="dong">
		        <div class="cot1">Email</div>
                <div class="cot2">
                    <input class="td" type="text" name="email" value="<?php echo $data[0]['email'];?>">

                </div>
        </div>
                <input id="nut" type="submit" name="edit" value="SỬA">
	    </form>
		</div>
</body>
</html>
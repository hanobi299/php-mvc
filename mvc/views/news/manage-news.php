
<?php include ('./mvc/views/includes/hearder.php') ?>
	<?php 
        if(isset($_GET['message']) && $_GET['message'] == 'success' )
        {
            echo '<script type="text/javascript">';
  			echo ' alert("Thao tác thành công !")';  //not showing an alert box.
  			echo '</script>';;
        }
    ?>
		<?php 
        if(isset($_GET['message']) && $_GET['message'] == 'fail' )
        {
            echo '<script type="text/javascript">';
  			echo ' alert("Thao tác thất bại. Xin hãy kiểm tra lại !")';  //not showing an alert box.
  			echo '</script>';;
        }
    ?>
	        <div class="nd">
	        	<p>Danh sách tin tức (<?php echo count($data);  ?> tin tức)<a href="index.php?action=addnews"> ADD </a></p>
	        	<table class="table table-striped">
	        		<thead>
	        		<tr>
	        			<th>STT</th> 	
	        			<th>ID</th>
	        			<th>Title</th>
	        			<th>description</th>
						<th>image</th>
						<th>status</th>
	        			<th>author</th>
	        			<th>category</th>
	        			<th>Tags</th>
						<th>created_at</th>
	        			<th>updated_at</th>
	        			<th>Thao Tác</th>
	        		</tr>
	        		</thead>
	        		<tbody>
				
	        			<?php 
	        				$i=1;
	        				foreach ($ketqua as $value) {		
	        			  ?>
	        			 	<tr>
	        			 		<td><?php echo $i++; ?></td>
	        			 		<td><?php echo $value['id_news']; ?></td>
	        			 		<td><?php echo $value['title']; ?></td>
	        			 		<td><?php echo $value['description']; ?></td>
								 <td><?php echo $value['image'] ?></td>
	        			 		<td><?php switch($value['status']){
									case 1:{ echo '<span>Hiện</span>'; break;} 
									case 0:{ echo '<span>Ẩn</span>'; break;} 
								}
								?>       
								</td>
	        			 	    <td><?php echo $value['name']; ?></td>
								<td><?php echo $value['Category']; ?></td>
								<td><?php echo $value['Tag']; ?></td>
	        			 		<td ><?php echo $value['created_at']; ?></td>
	        			 		<td ><?php echo $value['updated_at']; ?></td>
	        			 		<td>
	        			 	
	        			 		 <form class="quanly">	
									<li><a href="index.php?action=edit-news&id_news=<?php echo $value['id_news'];?>&id_newsterm=<?php echo $value['id_newsterm'];?> "><i class="glyphicon glyphicon-edit"></i></a></li>
									
									<li><a href="index.php?action=delete-news&id_news=<?php echo $value['id_news'];?>&id_newsterm=<?php echo $value['id_newsterm'];?> " onclick="return confirm('Bạn có chắc chắn muốn tin tức này?');"><i class="glyphicon glyphicon-trash"></i></a></li>
								</form>	
						       </td>
	        			 	</tr> 
	        			
	        			  <?php 
	        			  	}

	        			   ?>
	        		</tbody>		
	        	</table>
				 <?php
                  if($ketqua != NULL)
                  {
                    ?>
                <div class="container1">
                  <div class="pagination" id="comment">
                    <?php 
                    for ($i=1; $i <=  $page ; $i++) { 
                      echo '<a href="index.php?action=manage-news&page='.$i.'#comment">'.$i.'</a>';
                    }
                     ?>
                </div>
              </div>

                    <?php
                  }
                 ?> 
                </div>
              </div>	
	        </div>
	        <div class="clear">
        	</div>
        </div>
    </div>
</body>
</html>

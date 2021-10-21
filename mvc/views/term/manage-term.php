
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
  			echo ' alert("Thao tác thất bài. Xin hãy kiểm tra lại !")';  //not showing an alert box.
  			echo '</script>';;
        }
    ?>
	        <div class="nd">
	        	<p>List term (<?php echo count($data_term);  ?> tin tức)<a href="index.php?action=add-term"> ADD </a></p>
	        	<table class="table table-striped">
	        		<thead>
	        		<tr>
	        			<th>STT</th> 	
	        			<th>ID</th>
	        			<th>name</th>
	        			<th>key term</th>
	        			<th>Thao Tác</th>
	        		</tr>
	        		</thead>
	        		<tbody>
				
	        			<?php 
	        				$i=1;
	        				foreach ($result as $value) {
								
	        			  ?>
	        			 	<tr>
	        			 		<td><?php echo $i++; ?></td>
	        			 		<td><?php echo $value['id_term']; ?></td>
	        			 		<td><?php echo $value['name']; ?></td>
	        			 		<td><?php echo $value['key_term']; ?></td>
					
	        			 		<td>
	        			 		 <form class="quanly">	
									<li><a href="index.php?action=edit-term&id_term=<?php echo $value['id_term'];?> "><i class="glyphicon glyphicon-edit"></i></a></li>
									
									<li><a href="index.php?action=delete-term&id_term=<?php echo $value['id_term'];?>" onclick="return confirm('Do want to delete this term?');"><i class="glyphicon glyphicon-trash"></i></a></li>
								</form>	
						       </td>
	        			 	</tr> 
	        			
	        			  <?php 
	        			  	}

	        			   ?>
	        		</tbody>		
	        	</table>
				  <?php
                  if($result != NULL)
                  {
                    ?>
                <div class="container1">
                  <div class="pagination" id="comment">
                    <?php 
                    for ($i=1; $i <= $page ; $i++) { 
                      echo '<a href="index.php?action=manage-term&page='.$i.'#comment">'.$i.'</a>';
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

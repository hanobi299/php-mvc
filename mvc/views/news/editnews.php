<?php include ('./mvc/views/includes/hearder.php') ?>
<form class="boxthem" method="POST">
	
		<div class="nhantrang">EDIT TIN TỨC</div>
		<div class="dong">
			<div class="cot1">Title	</div>
			<div class="cot2">
				<input class="td" type="text" name="title" value="<?php echo $getnewscttag[0]['title'] ?>" required>
			</div>
		</div>
		<div class="dong">
			<div class="cot1">Description</div>
			<div class="cot2">
				<textarea  textarea rows="9" cols="30" class="td" type="text" name="des"  required><?php echo $getnewscttag[0]['description'] ?></textarea>  
			</div>
			
		</div>
        <div class="dong" style="width: 700px;">
			<div class="cot1">Hình ảnh </div>
            
			<input  class="ha" type="file" name="image" accept="image/*" >
            <input style="display: none;" type="text" name="images" value="<?php echo $getnewscttag[0]['image'] ?>">
            
  
            <div>
                <img style="max-width:50px" src="image/<?php echo $getnewscttag[0]['image'] ?>" alt=""> 
            </div>
			
		</div>
		<div class="dong">
			<div class="cot1">Category</div>
			<div class="cot2">
				<select class="form-control" name="category[]" multiple = "multiple"  required>
                <option hidden value="<?php echo $getnewscttag[0]['Category'] ?>" ></option>
                       <?php
                        if(isset($cate)){
                            $var = explode(', ', $getnewscttag[0]['Category']);
                           foreach($cate as $row){?>
                           
                               <option value="<?php echo $row['id_term'] ?>" <?php foreach($var as $item){
                                   
                                if($item == $row['name']){
                                    echo "selected";
                                }
                                  } ?>><?php echo $row['name'] ?></option>
                          <?php }?>
                     <?php
                        } 
                        ?>
                       
				</select>
			</div>
		</div>
		<div class="dong">
			<div class="cot1">Tag</div>
			<div class="cot2">
            <select class="form-control" name="tag[]" multiple = "multiple"  required>
                <option hidden value="<?php echo $getnewscttag[0]['Tag'] ?>" required></option>
                 <?php
               
                        if(isset($tag)){
                            
                            $var = explode(', ',$getnewscttag[0]['Tag']);
                            var_dump($var);
                           foreach($tag as $row){?>
                               <option value="<?php echo $row['id_term'] ?>"
                               <?php
                                if(in_array($row['name'], $var)){ ?>
                                    selected="selected"
                                <?php }
                               ?>><?php echo $row['name'] ?></option>
                          <?php } ?>
                        <?php
                        } 
                        ?>
				</select>
				
			</div>
		</div>
        <div class="dong">
			<div class="cot1">Status</div>
			<div class="cot2">
                            <select  name="status" class="form-control" style="width:120px;">
							<option  hidden value="<?php echo $new[0]['status']; ?>" required >type</option>
                             <?php 
                                  $var = array('Ẩn','Hiện');
                                  for ($i=0; $i <=1 ; $i++) {  
                                  if($getnewscttag[0]['status']==$i) {	?>	
									<option  value ="<?php echo $i ?>" selected><?php echo $var[$i];?></option>                                       
                                <?php  }else{
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $var[$i]; ?></option>
                                    <?php
                                    }
                                }
                               ?> 
                            </select>
			</div>
		</div>
		<input id="nut" type="submit" name="edit" value="EDIT">
	</form>
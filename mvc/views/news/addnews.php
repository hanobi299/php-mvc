<?php include ('./mvc/views/includes/hearder.php') ?>
<form class="boxthem" method="POST">
	
		<div class="nhantrang">THÊM TIN TỨC</div>
		<div class="dong">
			<div class="cot1">Title	</div>
			<div class="cot2">
				<input class="td" type="text" name="title" placeholder=" Title..." required="">

			</div>
		</div>
		<div class="dong">
			<div class="cot1">Description</div>
			<div class="cot2">
				<textarea  textarea rows="9" cols="30" class="td" type="text" name="des" placeholder=" Description...." required></textarea>  

			</div>
			
		</div>
        <div class="dong" style="width: 700px;">
			<div class="cot1">Hình ảnh </div>
			<input class="ha" type="file" name="image" accept="image/*" required>
			
		</div>
		<div class="dong">
			<div class="cot1">Category</div>
			<div class="cot2">
				<select class="form-control" name="category[]" multiple = "multiple"  required>
                <option hidden value=""></option>
                        <?php foreach ($cate as $key) { ?>
                            <option  value="<?php echo $key['id_term'] ?>"><?php echo $key['name'] ?></option>
                        <?php } ?>
				</select>
			</div>
		</div>
		<div class="dong">
			<div class="cot1">Tag</div>
			<div class="cot2">
            <select class="form-control" name="tag[]" multiple = "multiple"  required>
                <option hidden value="" required></option>
                        <?php foreach ($tag as $key) { ?>
                            <option  value="<?php echo $key['id_term'] ?>"><?php echo $key['name'] ?></option>
                        <?php } ?>
				</select>
				
			</div>
		</div>
        <div class="dong">
			<div class="cot1">Status</div>
			<div class="cot2">
                            <select  name="status" class="form-control" style="width:120px;">
							<option  hidden value="" required >type</option>
                             <?php 
                                  $var = array('Ẩn','Hiện');
                                  for ($i=0; $i <=1 ; $i++) { ?>  		
									<option  value ="<?php echo $i ?>"><?php echo $var[$i];?></option>                                       
                                <?php  }
                               ?> 
                            </select>
			</div>
		</div>
		<input id="nut" type="submit" name="add" value="ADD">
	</form>
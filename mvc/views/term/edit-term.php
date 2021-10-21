<?php include ('./mvc/views/includes/hearder.php') ?>
<form class="boxthem" method="POST">
		<div class="nhantrang">EDIT TERM</div>
		<div class="dong">
			<div class="cot1">Name_term</div>
			<div class="cot2">
				<input class="td" type="text" name="name_term" value="<?php echo $data_term[0]['name'];?>" required="">

			</div>
		</div>
        <div class="dong">
			<div class="cot1">Key Term</div>
			<div class="cot2">
                            <select  name="key_term" class="form-control" style="width:120px;">
							<option  hidden value="" required >type</option>
                            <?php 
                                  $var = array('Category','Tag');
                                  for ($i=0; $i < 2 ; $i++) { 
                                    if ($data_term[0]['key_term']==$i) {
                                      ?>
                                    <option value="<?php echo $var[$i]; ?>"selected><?php echo $var[$i]; ?></option>
                                    <?php  
                                    }
                                    else {
                                      ?>
                                        <option value="<?php echo $var[$i]; ?>"><?php echo $var[$i]; ?></option>
                                     <?php

                                    }
                                  }
                               ?> 
                            </select>
			</div>
		</div>
		<input id="nut" type="submit" name="edit" value="Edit">
	</form>
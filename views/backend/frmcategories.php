	<h3 class="tit"><?=$title;?></h3>
	<?php
	   $mode=$this->uri->segment(4);
	   if($mode=='insert'):
	   		$id ='';
	   		$nm_cat = '';
	   		$desk = '';
	   else :	   		
	   		$id = $categories->CategoryID;
	   		$nm_cat = $categories->CategoryName;
	   		$desk = $categories->Description;
	   endif;		

	?>
			<!-- Table (TABLE) -->
			<br /><br />
			
      <form id="commentForm" name="commentForm"  method="post" action="<?=site_url('backend/categories/process/'.$mode.'/'.$id);?>">
      		<input type="hidden" name='id' value="<?=$id;?>">
      		<input type="hidden" name='mode' value="<?=$mode;?>">
			<fieldset>				
				<table class="nostyle">
					<tr>
						<td style="width:100px;">Category Name:</td>
						<td><input type="text" value="<?=$nm_cat;?>" size="40" name="CategoryName" class="input-text" required="required" /></td>
					</tr>					
					<tr>
						<td class="va-top">Description:</td>
						<td><textarea cols="75" rows="7" required="required" name="Description" class="input-text"><?=$desk;?></textarea></td>
					</tr>					
					<tr>
						<td colspan="2" class="t-right">
							<input type="submit" name="btnSimpan"  class="input-submit" value="Submit" /></td>
					</tr>
				</table>
			</fieldset>
      </form>

		
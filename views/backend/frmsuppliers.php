	<h3 class="tit"><?=$title;?></h3>
	<?php
	   $mode=$this->uri->segment(4);
	   if($mode=='insert'):
	   		$id ='';
	   		$company = '';
	   		$contact = '';
			$address = '';
			$phone = '';
	   else :	   		
	   		$id = $suppliers->SupplierID;
	   		$company = $suppliers->CompanyName;
			$contact = $suppliers->ContactName;
			$address = $suppliers->Address;
	   		$phone = $suppliers->Phone;
	   endif;		

	?>
			<!-- Table (TABLE) -->
			<br /><br />
			
      <form id="commentForm" name="commentForm"  method="post" action="<?=site_url('backend/suppliers/process/'.$mode.'/'.$id);?>">
      		<input type="hidden" name='id' value="<?=$id;?>">
      		<input type="hidden" name='mode' value="<?=$mode;?>">
			<fieldset>				
				<table class="nostyle">
					<tr>
						<td style="width:100px;">Company Name:</td>
						<td><input type="text" value="<?=$company;?>" size="40" name="CompanyName" class="input-text" required="required" /></td>
					</tr>
					<tr>
						<td style="width:100px;">Contact Name:</td>
						<td><input type="text" value="<?=$contact;?>" size="40" name="ContactName" class="input-text" required="required" /></td>
					</tr>
					<tr>
						<td style="width:100px;">Address:</td>
						<td><input type="text" value="<?=$address;?>" size="40" name="Address" class="input-text" required="required" /></td>
					</tr>					
					<tr>
						<td class="va-top">Phone:</td>
						<td><textarea cols="75" rows="7" required="required" name="Phone" class="input-text"><?=$phone;?></textarea></td>
					</tr>					
					<tr>
						<td colspan="2" class="t-right">
							<input type="submit" name="btnSimpan"  class="input-submit" value="Submit" /></td>
					</tr>
				</table>
			</fieldset>
      </form>

		
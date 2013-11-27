			<h1><?=$title;?></h1>

			<!-- Table (TABLE) -->
			<br /><br />
			<table>
				<tr>
					<th>No</th>
					<th>Actions</th>					    
				    <th>Company Name</th>
					<th>Contact Name</th>
					<th>Address</th>
				    <th>Phone</th>
					
				</tr>
				<?php
					$no=0;
					foreach($array_suppliers as $row):	
					$id=$row->SupplierID;	
					$no++;	
					$css=($no%2==1)? '' : 'class="bg"';
				?>
				<tr <?=$css;?> >
					<td><?=$no;?>.</td>
				     <td><?=anchor(site_url('backend/suppliers/form/insert/'.$id),'[insert]').' | '.
				    	   anchor(site_url('backend/suppliers/form/update/'.$id),'[update]')
						   .' | '.anchor(site_url('backend/suppliers/process/delete/'.$id),'[delete]');?></td>				    
				    <td><?=$row->CompanyName;?></td>
					<td><?=$row->ContactName;?></td>
					<td><?=$row->Address;?></td>
				    <td><?=$row->Phone;?></td>				    
				</tr>
				<?php  endforeach; ?>
			</table>

		
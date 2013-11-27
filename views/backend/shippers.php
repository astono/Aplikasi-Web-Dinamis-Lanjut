			<h1><?=$title;?></h1>

			<!-- Table (TABLE) -->
			<br /><br />
			<table>
				<tr>
					<th>No</th>
					<th>Actions</th>					    
				    <th>Company Name</th>
				    <th>Phone</th>				   				   
				</tr>
				<?php
					$no=0;
					foreach($array_shippers as $row):	
					$id=$row->ShipperID;	
					$no++;	
					$css=($no%2==1)? '' : 'class="bg"';
				?>
				<tr <?=$css;?> >
					<td><?=$no;?>.</td>
				     <td><?=anchor(site_url('backend/shippers/form/insert/'.$id),'[insert]').' | '.
				    	   anchor(site_url('backend/shippers/form/update/'.$id),'[update]')
						   .' | '.anchor(site_url('backend/shippers/process/delete/'.$id),'[delete]');?></td>				    
				    <td><?=$row->CompanyName;?></td>
				    <td><?=$row->Phone;?></td>				    
				</tr>
				<?php  endforeach; ?>
			</table>

		
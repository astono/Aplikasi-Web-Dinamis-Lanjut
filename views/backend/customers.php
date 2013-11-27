			<h1><?=$title;?></h1>

			<!-- Table (TABLE) -->
			<br /><br />
			<table>
				<tr>
					<th>No</th>
					<th>Actions</th>					    
				    <th>Company Name</th>
				    <th>Contact Name</th>				   				   
				</tr>
				<?php
					$no=0;
					foreach($array_customers as $row):	
					$id=$row->CustomerID;	
					$no++;	
					$css=($no%2==1)? '' : 'class="bg"';
				?>
				<tr <?=$css;?> >
					<td><?=$no;?>.</td>
				     <td><?=anchor(site_url('backend/customers/form/insert/'.$id),'[insert]').' | '.
				    	   anchor(site_url('backend/customers/form/update/'.$id),'[update]')
						   .' | '.anchor(site_url('backend/customers/process/delete/'.$id),'[delete]');?></td>				    
				    <td><?=$row->CompanyName;?></td>
				    <td><?=$row->ContactName;?></td>				    
				</tr>
				<?php  endforeach; ?>
			</table>

		
			<h1><?=$title;?></h1>

			<!-- Table (TABLE) -->
			<br /><br />
			
			
			<table>
				<tr>
					<th>No</th>
					<th>Actions</th>
					<th>Product ID</th>
				    <th>Product Name</th>
				    <th>Category ID</th>
					<th>Quantity Per Unit</th>
				</tr>
				<?php
					$no=0;
					foreach($array_products as $row):	
					$id=$row->ProductID;	
					$no++;	
					$css=($no%2==1)? '' : 'class="bg"';
				?>
				<tr <?=$css;?> >
					<td><?=$no;?>.</td>
				     <td><?=anchor(site_url('backend/products/form/insert/'.$id),'[insert]').' | '.
				    	   anchor(site_url('backend/products/form/update/'.$id),'[update]')
						   .' | '.anchor(site_url('backend/products/process/delete/'.$id),'[delete]');?></td>				    
				    <td><?=$row->ProductID;?></td>
					<td><?=$row->ProductName;?></td>
				    <td><?=$row->CategoryID;?></td>
					<td><?=$row->QuantityPerUnit;?></td>				    
				</tr>
				
				<?php  endforeach; ?>
			</table>
			<div class="halaman">Halaman :<?php echo $halaman; ?></div> 
			
	
			
		
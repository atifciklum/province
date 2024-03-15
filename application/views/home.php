<?php 
	$this->load->view('header');?>
	<table class="table table-striped table-hover">
				<thead>
					<tr>
					
						<th>First Name</th>
						<th>Last Name</th>
						<th>Country</th>
						<th>Province</th>
						<th>User Avatar</th>
                        <th>Gender</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	if(!empty($allcitizens))
	{
		foreach ($allcitizens as $citizen): ?>
		<tr>

			<td><?php echo $citizen['first_name']; ?></td>
			<td><?php echo $citizen['last_name']; ?></td>
			<td><?php echo $this->Country_model->get_country_name($citizen['country']);  ?></td>
			<td><?php echo $this->Province_model->get_province_name($citizen['province']);?></td>
			<td><img src="<?php echo base_url('images/').$citizen['user_avatar']; ?>" class="rounded user_avatar" width="50" height="50"></td>
			<td><?php echo $citizen['gender']; ?></td>
			<td>
				<a href="<?php echo site_url('home/load_edit_view/').$citizen['ID']; ?>" data-id ="<?php echo $citizen['ID']; ?>" class="edit"  id="eee"><i class="material-icons"  title="Edit">&#xE254;</i></a>
				<a href="#deleteEmployeeModal" data-id ="<?php echo $citizen['ID']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
			</td>
		</tr>
		<?php endforeach;
	} else{?>
		<tr>
			<td> no record!</td>
		</tr>
		</tbody>
			</table>
		<?php }
			$this->load->view('footer');
		?>
				
				
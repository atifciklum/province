<?php
$this->load->view('header');
?>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" >
	<div class="modal-dialog">
		<div class="modal-content">
		<?php echo form_open_multipart('home/update_citizen_info');?>
			<!-- <form  action="<?php //echo site_url('home/update_citizen_info');?>" method="post"> -->
			<div class="modal-header">						
					<h4 class="modal-title">Edit Citizen</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>First Name</label>
						<input type="text" value= "<?php echo $citizen_records->first_name ?>" id="first_name" name="first_name" class="form-control">
						<?php echo form_error('first_name'); ?>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" value= "<?php echo $citizen_records->last_name ?>" id="last_name" name="last_name" class="form-control">
						<?php echo form_error('last_name'); ?>
						<input type="hidden"  value= "<?php echo $citizen_records->ID ?>" id="citizen_id" name="citizen_id" class="form-control">
					</div>
					<div class="form-group">
						<label>User Avtar</label>
						<input type="file" id="profile_image" name="profile_image" size="20" />
					<img id="edit_user_avatar" src="<?php echo base_url('images/').$citizen_records->user_avatar ?>" class="rounded user_avatar" width="50" height="50">
					</div>
					<div class="form-group">
						<label>Country</label>
                        <select name="country" id="edittcountry" class="country">
                            <option value="">Select Country</option>
                             <?php foreach ($countries as $country): ?>
                                <option <?php echo ($citizen_records->country == $country['country_id']) ? 'selected' : ''; ?> value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
                                <?php endforeach; ?>
                        </select>
						<?php echo form_error('country'); ?>
					</div>
					<div class="form-group">
						<label>Province</label>
                        <select name="province" id="editprovince" class="province">
                            <option value="">Select Province</option>
                             <?php foreach ($provinces as $province): ?>
                                <option <?php echo ($citizen_records->province == $province['province_id']) ? 'selected' : ''; ?> value="<?php echo $province['province_id']; ?>"><?php echo $province['province_name']; ?></option>
                                <?php endforeach; ?>
                        </select>
						<?php echo form_error('province'); ?>

					</div>	
                    <div class="form-group">
						<label>Gender</label>
                    
						<select name="gender" id="editgender">
							<option value="male"> Male </option>
							<option value="female"> Female </option>  
                        <select>
						<?php echo form_error('gender'); ?>
                      
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
			$this->load->view('footer');
		?>
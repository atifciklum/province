<?php
$this->load->view('header');
?>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal">
	<div class="modal-dialog">
		<div class="modal-content">
		<?php echo form_open_multipart('home/add_citizen_info');?>
			<!-- <form id="add-citizen-form" action="<?php echo base_url('home/add_citizen_info');?>" method="post"> -->
				<div class="modal-header">						
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="first_name" class="form-control" value="<?php echo set_value("first_name") ?>">
                        <?php echo form_error('first_name'); ?>
					</div>
                   
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="last_name" class="form-control" value="<?php echo set_value("last_name") ?>">
                        <?php echo form_error('last_name'); ?>
					</div>
					<div class="form-group">
						<label>User Avtar</label>
					<input type="file" name="profile_image" size="20" />
					</div>
					<div class="form-group">
						<label>Country</label>
                        <select name="country" id="country" class="country">
                            <option value="">Select Country</option>
                             <?php foreach ($countries as $country): ?>
                                <option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
                                <?php endforeach; ?>
                        </select>
                        <?php echo form_error('country'); ?>
					</div>
					<div class="form-group">
						<label>Province</label>
                        <select name="province" id="province" class="province">
                            <option value="">Select Province</option>
                             <?php foreach ($provinces as $province): ?>
                                <option value="<?php echo $province['province_name']; ?>" <?php echo set_select('province', $province['province_name']); ?>><?php echo $province['province_name']; ?></option>
                                <?php endforeach; ?>
                        </select>
                        <?php echo form_error('province'); ?>
					</div>	
                    <div class="form-group">
						<label>Gender</label>
                    
						<select name="gender">
                            <option value="">Select Gender</option>
                            <option value="male" <?php echo set_select('gender', 'male'); ?>> Male </option>
                            <option value="female" <?php echo set_select('gender', 'female'); ?>> Female </option>  
                        <select>
                        <?php echo form_error('gender'); ?>
                      
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
			$this->load->view('footer');
		?>
</tbody>
			</table>
		
		</div>
	</div>        
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?php echo site_url('home/delete_citizen_info');?>" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="hidden" name="delete_id" id="delete_id" value="">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>

<script>

$(document).ready(function() {
    $('.country').change(function() {
        var country_id = $(this).val();
        if (country_id !== '') {
            $.ajax({
                url: '<?php echo site_url('home/get_provinces');?>',
                type: 'post',
                data: {country_id: country_id},
                dataType: 'json',
                success: function(response) {
                    var options = '<option value="">Select Province</option>';
                    $.each(response, function(index, province) {
                        options += '<option value="' + province.province_id + '">' + province.province_name + '</option>';
                    });
                    $('.province').html(options);
                }
            });
        } else {
            $('.province').html('<option value="">Select Province</option>');
        }
    });
});

$('.delete').click(function(){
		var citizenId = $(this).data('id');
		document.getElementById("delete_id").value = citizenId;
})

</script>
</body>
</html>
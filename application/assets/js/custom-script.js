$(document).ready(function() {
    $('#country').change(function() {
        var country_id = $(this).val();
        if (country_id !== '') {
            $.ajax({
                url: '<?php echo "http://localhost/province/index.php/home/get_provinces"; ?>',
                type: 'post',
                data: {country_id: country_id},
                dataType: 'json',
                success: function(response) {
                    var options = '<option value="">Select Province</option>';
                    $.each(response, function(index, province) {
                        options += '<option value="' + province.province_id + '">' + province.province_name + '</option>';
                    });
                    $('#province').html(options);
                }
            });
        } else {
            $('#province').html('<option value="">Select Province</option>');
        }
    });
});

// add citizen form submission 
$('#add-citizen-form').submit(function(e) {
        e.preventDefault();  
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                alert('Citizen added successfully!');
            },
            error: function(xhr, status, error) {
                alert('Error occurred while adding citizen!');
            }
        });
    });
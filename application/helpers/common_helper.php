<?php


function debug($arg)
{
    echo "<pre>";

    print_r($arg);

    echo "</pre>";
}

function do_upload_avatar()
{
    $CI =& get_instance();

    $config['upload_path'] = FCPATH . 'images'; //base_url().'images/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2000;
    $config['max_width'] = 3000;
    $config['max_height'] = 3000;

    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);

    if (!$CI->upload->do_upload('profile_image')) {
        $error = array('error' => $CI->upload->display_errors());
        $CI->load->view('home', $error);
        print_r($error);
        exit("rrr");
    } else {
        $data = array('image_metadata' => $CI->upload->data());
        return $user_avatar_url = $data['image_metadata']['file_name'];
    }
}


?>
<?php
class Custom_output
{
    private $CI;
    public function __construct()
	{
        $this->CI =& get_instance();
	}
  
    public function display_override()
    {
 
        $data['current_date'] = date('Y-m-d');
        $this->CI->load->vars($data);        

    }


}
?>
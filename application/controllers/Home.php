<?php
class Home extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->library('upload');
                $this->load->library('form_validation');
                $this->load->model('Home_model');
                $this->load->model('Country_model');
                $this->load->model('Province_model');
        }

        
        public function index()
        {
         
                $data = $this->get_view_data();
                debug($data);
                $this->load->view('home' , $data);  
        }
       
        public function add_citizen_info()
        {
                   
                if ($this->input->post()) 
                {
                        $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
                        $this->form_validation->set_rules('first_name', 'First name', 'required');
                        $this->form_validation->set_rules('last_name', 'Last name', 'required');
                        $this->form_validation->set_rules('country', 'Country', 'required');
                        $this->form_validation->set_rules('province', 'Province', 'required');
                        $this->form_validation->set_rules('gender', 'Gender', 'required');

                        if ($this->form_validation->run() === FALSE) 
                        {
                                $data = $this->get_view_data();
                                $this->load->view('add',$data); 
                        } 
                        else 
                        {

                                $first_name = $this->security->xss_clean($this->input->post('first_name'));
                                $last_name = $this->security->xss_clean($this->input->post('last_name'));
                                $country_id = $this->security->xss_clean($this->input->post('country'));
                                $province_id = $this->security->xss_clean($this->input->post('province'));
                                $gender = $this->security->xss_clean($this->input->post('gender'));

                                //$country_name = $this->Country_model->get_country_name($country_id);
                                //$province_name = $this->Province_model->get_province_name($province_id);
                                
                                if ($_FILES['profile_image']['name']) 
                                {
                                        
                                        
                                        $user_avatar_url = do_upload_avatar();
                                        // $citizenData = $this->Home_model->getcitizenById($citizen_id);
                                        // $citizenDataArray = get_object_vars($citizenData);

                                        // $file_path = FCPATH . 'images/'.$citizenDataArray['user_avatar'];
                                        
                                        // if ($file_path && file_exists($file_path)) 
                                        // {
                                        //         unlink($file_path);
                                        
                                        // }

                                        $citizen_data = array(
                                                'first_name' => $first_name,
                                                'last_name' => $last_name,
                                                'country' => $country_id,
                                                'province' => $province_id,
                                                'user_avatar' => $user_avatar_url,
                                                'gender' => $gender
                                        );
                                } 
                                else 
                                {
                                        
                                        $citizen_data = array(
                                                'first_name' => $first_name,
                                                'last_name' => $last_name,
                                                'country' => $country_id,
                                                'province' => $province_id,
                                                'gender' => $gender
                                        );
                                }               
                                $this->Home_model->add_citizen($citizen_data);
                                $data = $this->get_view_data();

                               
                               
                                $this->load->view('home' , $data); 
                        }
                }

                
        }

        public function load_add_view() 
        {
                $data = $this->get_view_data();
                $this->load->view('add', $data );  
        }

        public function load_edit_view($citizen_id = "") 
        {
                if(!$citizen_id)
                $citizen_id = $this->uri->segment(3);
                // echo $citizen_id;
                
                $records = json_decode($this->getcitizenData($citizen_id));
                $recordsArray = (array) $records;

                $data['citizen_records'] = $records;

                $data['countries'] = $this->Country_model->get_countries();
                $data['provinces'] = $this->Province_model->get_provinces();
                $this->load->view('edit' , $data);  
        }
                

        public function get_provinces() 
        {
                $country_id = $this->input->post('country_id');
                $provinces = $this->Province_model->get_provinces_by_country($country_id);
                echo json_encode($provinces);  
        }

        private function get_view_data()
        {
                $data['allcitizens'] = $this->Home_model->get_allcitizens();
                $data['countries'] = $this->Country_model->get_countries();
                $data['provinces'] = $this->Province_model->get_provinces();
                return $data;
        }

        public function getcitizenData($citizenId = 0) 
        {

                if(empty($citizenId)){
                        $citizenId = $this->input->get('id');
                }
                $citizenData = $this->Home_model->getcitizenById($citizenId);
            
                if ($citizenData) { 
                    $citizenDataArray = get_object_vars($citizenData);
                    return json_encode($citizenDataArray);
                } else {
                        return json_encode(array());
                }
            }

        public function update_citizen_info()
        {
                if ($this->input->post()) 
                {
                        $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
                        $this->form_validation->set_rules('first_name', 'First name', 'required');
                        $this->form_validation->set_rules('last_name', 'Last name', 'required');
                        $this->form_validation->set_rules('country', 'Country', 'required');
                        $this->form_validation->set_rules('province', 'Province', 'required');
                        $this->form_validation->set_rules('gender', 'Gender', 'required');
                        $citizen_id = $this->security->xss_clean($this->input->post('citizen_id'));

                        if ($this->form_validation->run() === FALSE) 
                        {
                                $data = $this->get_view_data();
                               $this->load_edit_view($citizen_id);
                        } 
                        else
                        {
                
                                $first_name = $this->security->xss_clean($this->input->post('first_name'));
                                $last_name = $this->security->xss_clean($this->input->post('last_name'));
                                $country_id = $this->security->xss_clean($this->input->post('country'));
                                $province_id = $this->security->xss_clean($this->input->post('province'));
                                $gender = $this->security->xss_clean($this->input->post('gender'));
                                $citizen_id = $this->security->xss_clean($this->input->post('citizen_id'));
        
                                if ($_FILES['profile_image']['name']) 
                                {
                                        
                                        $user_avatar_url = do_upload_avatar();
                                        $citizenData = $this->Home_model->getcitizenById($citizen_id);
                                        $citizenDataArray = get_object_vars($citizenData);

                                        $file_path = FCPATH . 'images/'.$citizenDataArray['user_avatar'];
                                        
                                        if ($file_path && file_exists($file_path)) 
                                        {
                                                unlink($file_path);
                                        
                                        }

                                        $citizen_data = array(
                                                'first_name' => $first_name,
                                                'last_name' => $last_name,
                                                'country' => $country_id,
                                                'province' => $province_id,
                                                'user_avatar' => $user_avatar_url,
                                                'gender' => $gender
                                        );
                                } 
                                else 
                                {
                                        
                                        $citizen_data = array(
                                                'first_name' => $first_name,
                                                'last_name' => $last_name,
                                                'country' => $country_id,
                                                'province' => $province_id,
                                                'gender' => $gender
                                        );
                                }
                                $this->Home_model->update_citizen( $citizen_id ,$citizen_data);
                                $data = $this->get_view_data();
                                
                                $this->load->view('home' , $data); 
                        }
                       
                }

                
        }

        public function delete_citizen_info()
        {

                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                        $citizen_id = $this->security->xss_clean($this->input->post('delete_id'));
                        $citizenData = $this->Home_model->getcitizenById($citizen_id);
                        $citizenDataArray = get_object_vars($citizenData);

                        $file_path = FCPATH . 'images/'.$citizenDataArray['user_avatar'];
                   
                        if ($file_path && file_exists($file_path)) 
                        {
                           unlink($file_path);
                       
                        }
                
                        $this->Home_model->delete_citizen( $citizen_id);

                }   
                $data = $this->get_view_data();
                redirect('home/index');  


        }
}
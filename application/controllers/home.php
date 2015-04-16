<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
    parent::__construct();
  }

	public function index(){
		isLoggedOut();
		$this->form_validation->set_rules(
		 	'userid',
		 	'User ID',
		 	'trim|required|min_length[6]|max_length[25]|xss_clean|htmlspecialchars');

   $this->form_validation->set_rules(
   	'password',
   	'Password',
   	'trim|required');
        
   if($this->form_validation->run()==FALSE){
            $this->load->view('login');
        }else{

        	$table_name = "users";
        	$condition = array('companyID'=>$this->input->post('userid'),
        		                  'pwd'=>$this->input->post('password'));
        	$limit = 1;
        	$query = $this->app_model->get_all_where($table_name, $condition, $limit, $offset=null);

        	if($query->num_rows() > 0){
        		$row = $query->row();
								   if($row->status == "active"){
								   	$data = array('companyID'=> $row->companyID,
                 						'loggedin'=>TRUE,
														'page' => "dashboard",
														'rights' => $row->accesslevel,
														'location' => $row->location);
						   			$this->session->set_userdata($data);
						   			redirect('dashboard');
								   }else{
								   	$data = array('no_user'=>"You have been deactivated from accessing the system, please contact the administrator.");
        				$this->load->view('login',$data);
								   }

        	}else{
        		$data = array('no_user'=>"Please correct your login credentials and try again");
        		$this->load->view('login',$data);
        	}
        }
	}


  public function logout(){
    logout();
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/home.php */
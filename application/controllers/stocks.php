<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stocks extends MY_Controller {
			public function __construct() {
		parent::__construct();
		js();
		$this->javascript_functions();
	}

		public function index(){
			isLoggedIn();
			$this->viewAllStocks();
		}

		public function viewAllStocks($offset=0){
  $config['base_url'] = 'http://192.168.100.50/wellness/stocks/';
			$totalRows = $this->app_model->get_all_where('stockstatus',array('user'=>$this->session->userdata('rights')));

			$config['total_rows'] = $totalRows->num_rows();
			$config['per_page'] = 100;
			//$config['anchor_class'] = "class='dropDownMoreClients'";
			$this->pagination->initialize($config);
			$query = $this->app_model->get_all_where('stockstatus',array('user'=>$this->session->userdata('rights')),100,$offset);
			$data = array('stocks'=>$query);
   $this->_views('dashboard',$data);
		}

		public function add(){
  $this->form_validation->set_rules('itemname', 'itemname', 'required|trim|max_length[255]');			
		$this->form_validation->set_rules('description', 'description', '');			
		$this->form_validation->set_rules('ammount', 'ammount', 'required|trim|is_numeric|max_length[255]');
		$this->form_validation->set_rules('measurement', 'measurement', 'required|trim|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

			if($this->form_validation->run()==FALSE){
				$this->_views('dashboard_addstock');
			}else{
					$query = $this->app_model->get_all_where('stockstatus',array('title'=>$_POST['itemname'],'user'=>$this->session->userdata('rights')));
					if($query->num_rows()>0){
						$data = array('error'=>'that item already exists, please add a different one.');
						$this->_views('dashboard_addstock',$data);
					}else{
						$id = substr(uniqid('', true), -5);
						$data = array('code'=>$id,
							             'title'=>$_POST['itemname'],
							             'description'=>$_POST['description'],
							             'instock'=>$_POST['ammount'],
							             'measurement'=>$_POST['measurement'],
							             'user'=>$this->session->userdata('rights'));
						$this->app_model->insert('stockstatus',$data);

						$data = array('code'=>$id,
							             'date'=>getCalendarDateTodayFull(),
							             'ammount'=> '+'.$_POST['ammount'],
							             'user'=>$this->session->userdata('rights'));
						$this->app_model->insert('stocktransactions',$data);
						redirect('stocks');						
					}
			}

		}

		public function update($id){
		$this->form_validation->set_rules('ammount', 'ammount', 'required|trim|is_numeric|max_length[255]');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

			if($this->form_validation->run()==FALSE){
				$query = $this->app_model->get_all_where('stockstatus',array('code'=>$id),1);
				$data = array('stock'=>$query->row());
				$this->_views('dashboard_updatestock',$data);
			}else{
					 $query = $this->app_model->get_all_where('stockstatus',array('code'=>$id),1);
				  $currentAmmount = (double)$query->row()->instock;
				  $newStock = $currentAmmount + (double)$_POST['ammount'];

						$data = array('instock'=> $newStock);
						$condition = array('code'=>$id,'user'=>$this->session->userdata('rights'));
						$this->app_model->update('stockstatus', $data, $condition);

						$data = array('code'=>$id,
							             'date'=>getCalendarDateTodayFull(),
							             'ammount'=> '+'.$_POST['ammount'],
							             'user'=>$this->session->userdata('rights'));
						$this->app_model->insert('stocktransactions',$data);
						redirect('stocks');						
					}
		}

		public function deduct($id){		
		$this->form_validation->set_rules('ammount', 'ammount', 'required|trim|is_numeric|max_length[255]');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

			if($this->form_validation->run()==FALSE){
				$query = $this->app_model->get_all_where('stockstatus',array('code'=>$id));
				$data = array('stock'=>$query->row());
				$this->_views('dashboard_deductstock',$data);
			}else{
							$query = $this->app_model->get_all_where('stockstatus',array('code'=>$id),1);
							$currentStock = (double)$query->row()->instock;
							$deductedAmmount = (double)$_POST['ammount'];

							if($deductedAmmount > $currentStock){
								$error = "sorry you can not deduct beyond the current float balance. Max deductable items ammount to ".$currentStock;
								$query = $this->app_model->get_all_where('stockstatus',array('code'=>$id));
								$data = array('stock'=>$query->row(),'error'=>$error);
								$this->_views('dashboard_deductstock',$data);
							}else{
				    $newStock = $currentStock - $deductedAmmount;
						  $data = array('instock'=> $newStock);
						  $condition = array('code'=>$id,'user'=>$this->session->userdata('rights'));
						  $this->app_model->update('stockstatus', $data, $condition);

								$data = array('code'=>$id,
									             'date'=>getCalendarDateTodayFull(),
									             'ammount'=> '-'.$_POST['ammount'],
									             'user'=>$this->session->userdata('rights'));
								$this->app_model->insert('stocktransactions',$data);
								redirect('stocks');		
							}						
										
					}
		}

		public function transactions($year=null,$month=null){
			if($year != null && $month != null){
				$date = $year.'/'.$month;
			}else{
				$date = getCalendarDateTodayFull();
			}

			$month = explode('/', $date);
			$like_condition = array('date'=>$month[0].'/'.$month[1]);

			$next = (int)$month[1] +1;
			$prev = (int)$month[1] -1;
			(strlen($next)<2) ? $next = '0'.$next: $next = $next;
			(strlen($prev)<2) ? $prev = '0'.$prev: $prev = $prev;

			$this->db->like($like_condition);
   $this->db->order_by("stocktransactions.id", "desc");
   $this->db->where(array('stocktransactions.user' => $this->session->userdata('rights')));
   $this->db->join('stockstatus', 'stockstatus.code = stocktransactions.code');
   $query = $this->db->get("stocktransactions");

   $data = array('transactions' => $query,
   														'year' => $month[0], 
   	             'month'=>$month[1], 
   	             'next'=> $next,
   	             'prev'=> $prev);

   $this->_views('dashboard_transactions',$data);
		}

		private function _views($view, $data=null){
					switch($this->session->userdata('rights')){

		   case "clinician":
		    $this->load->view('js');
						$this->load->view('header');		
						$this->load->view('clinician/stock/'.$view,$data);
						$this->load->view('footer');
		   break;

		   case "reception":
			   	$this->load->view('js');
			   	$this->load->view('header');			
							$this->load->view('reception/stock/dashboard',$data);
							$this->load->view('footer');
		   break;

		   case "scientist":
		    $this->load->view('js');
						$this->load->view('header');		
						$this->load->view('scientist/stock/'.$view,$data);
						$this->load->view('footer');	   	
		   break;

		  }					
		}

  

	}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
			public function __construct() {
		parent::__construct();
		js();
		$this->javascript_functions();
	}

		public function index(){
			isLoggedIn();
			$this->calendar();
		}


		public function calendar($year=null, $month=null){
			
			if($year != null && $month != null){

					$query 	= $this->calendar_model->getBookings($year,$month);
					$query2 = $this->app_model->get_all("patientdetails");
					$query3 = $year."/".$month;
					
					$data = array('bookings'	=>$query,
						             'patients'	=>$query2,
						             'dates'		  =>	$query3);

					$this->load->view('js');
					$this->load->view('dashboard',$data);
			}else{

				$dates = explode("/", getCalendarDateToday());
				$query 	= $this->calendar_model->getBookings($dates[0],$dates[1]);
				$query2 = $this->app_model->get_all("patientdetails");
				$query3 = getCalendarDateToday();

				$data = array('bookings'	=>$query,
						             'patients'	=>$query2,
						             'dates'		  =>	$query3);

				$this->load->view('js');		
				$this->load->view('dashboard',$data);
			}
		}

		public function bookClient($thedate,$status,$clientnumber){
			$table_name = "calendar";
			$data = array(
					'clientnumber'=>$clientnumber,
					'thedate' => $thedate,
					'status' => $status
					);

			$query = $this->app_model->get_all_where($table_name, $condition);

			if($query->num_rows > 0){
				echo "<script type='text/javascript'>alert('You cannot book a client twice with the same status.');</script>";
			}else{
					$this->app_model->insert($table_name, $data);
			}	
		}

		public function javascript_functions(){

			$hideForm = "$('#hidden-form').hide();";

			$click_function ="alert('ok');";

			$getDay = "$('#hidden-form').fadeIn(600);
						$('.day').removeClass('selected');
						$(this).addClass('selected');
				";

				$bookClient = "
					var selectedDay = $('.selected').text().trim();
					
					if(selectedDay == ''){	
						alert('Please select a valid day.')
						$('.day_listing').removeClass('selected')
					}else{
						selectedDay = $('#dates').text().toString()+'/'+selectedDay
						alert(selectedDay)
					}
					
					";


			

			$this->javascript->output($hideForm);
			$this->javascript->click('.day',$getDay);
			$this->javascript->click('.clickBook',$bookClient);	
			$this->javascript->compile();
		}


}
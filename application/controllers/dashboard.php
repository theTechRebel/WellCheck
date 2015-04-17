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

		public function bookClient(){

			$table_name = "patientrecord";
			$condition 	= array('idnumber'=>$_POST['idnumber']);
			$query 					= $this->app_model->get_all_where($table_name, $condition);

			$clientNumber = $query->row()->clientnumber;
			if(strlen($_POST['day']) < 2){
				$_POST['day'] = "0".$_POST['day']; 
			}
			$thedate = $_POST['date'].'/'.$_POST['day'];
			$status = $_POST['status'];

			$table_name = "calendar";
			$condition = array(
					'clientnumber'=>$clientNumber,
					'thedate' => $thedate,
					'status' => $status
					);

			$query = $this->app_model->get_all_where($table_name, $condition);

			if($query->num_rows > 0){
				//the client is already booked so we cant book them twice
				//var_dump($condition);
				echo 'you cannot book a client twice sorry select another date.';
				die();
			}else{
				//the client is not booked, book them
				//var_dump($condition);
				//echo 'we are about to book you';

				$this->app_model->insert($table_name, $condition);
				$query = $this->app_model->get_all_where("calendarcount",array('thedate'=>$thedate));

				if($query->num_rows() > 0){
					//if there are other bookings already for that date
						$qued = intval($query->row()->qued);
						$qued ++;
				}else{
					//there are no bookings for that date
						$qued = 1;
				}

				$this->app_model->insert("calendarcount", array('thedate'=>$thedate,'qued'=>$qued));
				echo 'succesfully booked client.';
				die();
			}
			}	

		public function javascript_functions(){

			$hideForm = "$('#hidden-form').hide();";

			$click_function ="alert('ok');";

			$getDay = "$('#hidden-form').fadeIn(600);
						$('.day').removeClass('selected');
						$(this).addClass('selected');
				";

				$bookRequest = "
					var selectedDay = $('.selected .d').text().trim();
		
					console.log(selectedDay)

					if(selectedDay == ''){	
						alert('Please select a valid day.')
						$('.day_listing').removeClass('selected')
					}else{

						var data = {
						'idnumber' : $(this).attr('id'),
						'status'			:	'qued',
						'day'						:	selectedDay,
						'date'					: $('#dates').text().toString()}

						//provide full domain URL because we are using controllers and url mapping
						//request could get lost in space
						$.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/bookClient/',
        crossDomain: true,
        data: data,
        success: function (data) {
            alert(data)
            location.reload(true)
        },
        error: function (err) {
            console.log(err)
        }
    });

						//$.post('dashboard/bookClient/',data,function(data){
							//console.log(data)
						//})

						//alert('client booked.')
					};";


			

			$this->javascript->output($hideForm);
			$this->javascript->click('.day',$getDay);
			$this->javascript->click('.clickBook',$bookRequest);	
			$this->javascript->compile();
		}


}
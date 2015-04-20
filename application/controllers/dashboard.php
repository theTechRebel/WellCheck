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


					switch($this->session->userdata('rights')){

		   case "clinician":
		    $this->load->view('js');
						$this->load->view('header');		
						$this->load->view('clinician/dashboard',$data);
						$this->load->view('footer');
		   break;

		   case "reception":
							$this->load->view('js');
							$this->load->view('dashboard',$data);
		   break;

		  }
			}else{

				$dates = explode("/", getCalendarDateToday());
				$query 	= $this->calendar_model->getBookings($dates[0],$dates[1]);
				$query2 = $this->app_model->get_all("patientdetails");
				$query3 = getCalendarDateToday();

				$data = array('bookings'	=>$query,
						             'patients'	=>$query2,
						             'dates'		  =>	$query3);

						switch($this->session->userdata('rights')){

			   case "clinician":
			    $this->load->view('js');
							$this->load->view('header');		
							$this->load->view('clinician/dashboard',$data);
							$this->load->view('footer');
			   break;

			   case "reception":
			   	$this->load->view('js');		
							$this->load->view('dashboard',$data);
			   break;

			  }
			}
		}

		public function booking($id=null){
				if($id==null){
					//no id specified
				}else{
						$table_name = "calendar";
				$condition = array(
						'clientnumber'=>$id,
						'thedate' => getCalendarDateTodayFull(),
						'status' => 'qued'
						);

				$query = $this->app_model->get_all_where($table_name, $condition);

				if($query->num_rows > 0){
					//the client is already booked so we cant book them twice
					//var_dump($condition);
						$this->clients('You cannot book a client twice sorry select another date or another client.');
				}else{
					//the client is not booked, book them
					//var_dump($condition);
					//echo 'we are about to book you';
					$condition = array(
						'clientnumber'=>$id,
						'thedate' => getCalendarDateTodayFull(),
						'status' => 'qued',
						'time' => date('H:i:s')
						);

					$this->app_model->insert($table_name, $condition);
					$query = $this->app_model->get_all_where("calendarcount",array('thedate'=>getCalendarDateTodayFull()));

					if($query->num_rows() > 0){
						//if there are other bookings already for that date
							$qued = intval($query->row()->qued);
							$qued ++;
							$this->app_model->update("calendarcount", array('qued'=>$qued), array('thedate'=>getCalendarDateTodayFull()));
					}else{
						//there are no bookings for that date
							$qued = 1;
							$this->app_model->insert("calendarcount", array('thedate'=>getCalendarDateTodayFull(),'qued'=>$qued));
					}
					$this->clients('Succesfully booked client with assigned WellCheck ID: '.$id);
				}
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
						$this->app_model->update("calendarcount", array('qued'=>$qued), array('thedate'=>$thedate));
				}else{
					//there are no bookings for that date
						$qued = 1;
						$this->app_model->insert("calendarcount", array('thedate'=>$thedate,'qued'=>$qued));
				}

				
				echo 'succesfully booked client.';
				die();
			}
			}	

			//just for reception
		public function walkInClient($type=null){

			if($this->session->userdata('rights') != 'reception'){
				redirect('dashboard/');
			}

			$this->form_validation->set_rules(
		 	'clientname',
		 	'Client Name',
		 	'trim|required');

   $this->form_validation->set_rules(
		 	'clientsurname',
		 	'Client Surname',
		 	'trim|required');

   $this->form_validation->set_rules(
		 	'address',
		 	'Client Address',
		 	'trim|required');

   $this->form_validation->set_rules(
		 	'occupation',
		 	'Client Occupation',
		 	'trim|required');

   $this->form_validation->set_rules(
		 	'employer',
		 	'Client Employer',
		 	'trim|required');

   $this->form_validation->set_rules(
		 	'dob',
		 	'Client Date of birth',
		 	'trim|required');

   $this->form_validation->set_rules(
		 	'phone',
		 	'Client Phone Number',
		 	'trim|required');

   $this->form_validation->set_rules(
		 	'idnumber',
		 	'Client ID Number',
		 	'trim|required');

			if($this->form_validation->run()==FALSE){
								$this->load->view('dashboard_walkinclient',array('type'=>$type));
        }else{

        	$query = $this->app_model->get_all_where("patientdetails", array('idnumber'=>$_POST['idnumber']));

        	if($query->num_rows() > 0){
        		//we already have the client
        		$this->load->view('dashboard_walkinclient',array('problem'=>"The Client is already in the system, please select the clients record from the clients tab and que them for check up."));
        	}else{
        		//we dont have the client
        		$data = array(
        			'idnumber' => $_POST['idnumber'],
        			'names'	   => $_POST['clientname'],
        			'surname'	=> $_POST['clientsurname'],
        			'salutation' => $_POST['salutation'],
        			'marital' => $_POST['marital'],
        			'address' => $_POST['address'],
        			'gender' => $_POST['gender'],
        			'occupation' => $_POST['occupation'],
        			'employer' => $_POST['employer'],
        			'dob' => $_POST['dob'],
        			'email' => $_POST['email'],
        			'phone' => $_POST['phone'],
        			'location' => ""
        		 );
        	//add the client to the system
        	$this->app_model->insert('patientdetails',$data);

        	//generate client ID
        	$query = $this->app_model->get_all("patientrecord");

        	$int = (int)$query->row($query->num_rows())->id + 1;
        	$clientID = "J0".$int;

        	$this->app_model->insert('patientrecord',array('idnumber'=>$_POST['idnumber'],
        		'clientnumber'=>$clientID,
        		'company'=>$_POST['employer']));

        	if($_POST['type'] == 1){
        		//book client
        				redirect('dashboard/booking/'.$clientID);
	        	}else{
	        			redirect('dashboard/clients/');
	        	}
        	}
        	//send notification to nurse of new client
        }

		}

		public function clients($report=null){

			$this->db->select('*');
			$this->db->from('patientrecord');
			$this->db->join('patientdetails', 'patientdetails.idnumber = patientrecord.idnumber');
			$this->db->order_by('patientrecord.id', 'DESC'); 
			$query = $this->db->get();

			if($report != null){
				$this->load->view('dashboard_clients',array('patientrecords'=>$query,'report'=>$report));
			}else{
				$this->load->view('dashboard_clients',array('patientrecords'=>$query));
			}
			
		}


		public function getBookings(){
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where(array('thedate'=>$_POST['date']));
			$this->db->join('patientrecord', 'patientrecord.clientnumber = calendar.clientnumber');
				$this->db->join('patientdetails', 'patientdetails.idnumber = patientrecord.idnumber');
			$this->db->order_by('patientrecord.id', 'DESC'); 
			$query = $this->db->get();

			if($query->num_rows() > 0){
				echo "<table class='table small' id='table-generated'>";
				echo "<td>Clients</td><td>Cancel</td><td>Processed</td><td>In Que</td>";
				echo "<tbody>";
				foreach ($query->result() as $row){
				echo "<tr>";
				echo "<td>$row->clientnumber $row->names $row->surname [$row->status]</td>";
				echo "<td><a href='http://localhost/wellness/dashboard/change/cancelled/$row->clientnumber/$row->thedate'>Cancel</a></td>";
				echo "<td><a href='http://localhost/wellness/dashboard/change/processed/$row->clientnumber/$row->thedate'>Processed</a></td>";
				echo "<td><a href='http://localhost/wellness/dashboard/change/qued/$row->clientnumber/$row->thedate'>In Que</a></td>";

				echo "</tr>";
				}
				echo "</tbody>";
			echo "</table>";
			}
		}

		public function getIncomingClients(){


			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where(array('thedate'=>getCalendarDateTodayFull(),'status'=>'qued'));
			$this->db->join('patientrecord', 'patientrecord.clientnumber = calendar.clientnumber');
			$this->db->join('patientdetails', 'patientdetails.idnumber = patientrecord.idnumber');
			$this->db->order_by('calendar.time', 'DESC'); 
			$query = $this->db->get();

				if($query->num_rows() > 0){

				echo "<table class='table small' id='table-generated-incoming'>";
				echo "<td>Client details</td><td>Time In</td><td>Attend</td>";
				echo "<tbody>";
				foreach ($query->result() as $row){
				echo "<tr>";
				echo "<td>$row->clientnumber $row->names $row->surname </td>";
				echo "<td>$row->time</td>";
				echo "<td><a class='openAttend' id='$row->clientnumber' href='#' val='$row->names $row->surname'>Attend</a></td>";
				echo "</tr>";
				}
				echo "</tbody>";
			echo "</table>";
			}
		}

		public function getClientDetails(){
				$this->db->select('*');
			$this->db->from('patientrecord');
			$this->db->where(array('clientnumber'=>$_POST['clientNumber']));
			$this->db->join('patientdetails', 'patientdetails.idnumber = patientrecord.idnumber');
			$query = $this->db->get();

			if($query->num_rows() > 0){
				echo "<table class='table table-bordered table-hover table-condensed'>";
				echo "<tbody>";

				foreach ($query->result() as $row){
					echo "<tr>";
					echo "<td>wellcheck ID:</td><td>$row->clientnumber</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>client name: </td><td>$row->salutation $row->names $row->surname</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>gender:</td><td>$row->gender</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>d.o.b:</td><td>$row->dob</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>mrital status:</td><td>$row->marital</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>occupation:</td><td>$row->occupation</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>employer:</td><td>$row->employer</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>address:</td><td>$row->address</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>contacts:</td><td>$row->email $row->phone</td>";
					echo "</tr>";
				}
				echo "</tbody>";
				echo "</table>";
			}

		}


		public function change($state,$id,$year,$month,$day){

				$query = $this->app_model->get_all_where("calendar",array('thedate'=>$year."/".$month."/".$day,'clientnumber'=>$id));

				$oldStatus = ($query->row()->status);

				if($oldStatus != 
					$state){
					$data = array('status'=>$state);
				$condition = array('clientnumber'=>$id,'thedate'=>$year."/".$month."/".$day);
				$this->app_model->update("calendar", $data, $condition);

				$query = $this->app_model->get_all_where("calendarcount",array('thedate'=>$year."/".$month."/".$day));

				if($query->num_rows() > 0){
					//if there are other bookings already for that date
						$oldVal = intval($query->row()->$oldStatus);
						$oldVal --;
						$status = intval($query->row()->$state);
						$status ++;
						$this->app_model->update("calendarcount", array($oldStatus=>$oldVal,$state => $status), array('thedate'=>$year."/".$month."/".$day));
						}
				}
				redirect('dashboard/');
	}

		public function javascript_functions(){

			$hideForm = "
			$('#hidden-form').hide(); 
			$('#attend').hide();";

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

					$showClients = "
						var selectedDay = $('.selected .d').text().trim();

						if(selectedDay.length < 2){
							selectedDay = '0'+selectedDay;
						}

						if(selectedDay != ''){
							var fullDate = $('#dates').text().toString();
							fullDate = fullDate + '/' + selectedDay;
							
							var data = {'date' : fullDate};

							$.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/getBookings/',
        crossDomain: true,
        data: data,
        success: function (data) {
        $('#table-generated').remove();
								$('#dynamic-table').append(data);
        },
        error: function (err) {
            console.log(err)
        }});
							}";

							$showIncomingClients = "

							setInterval(function(){
								$.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/getIncomingClients/',
        crossDomain: true,
        success: function (data) {
        $('#table-generated-incoming').remove();
								$('#dynamic-table-incoming').html(data);
        },
        error: function (err) {
            console.log(err);
        }});
							},2500);";

						$attachStaticEventHandlers = "
							$('#dynamic-table-incoming').on('click', '.openAttend', function(){

       	var clientNumber = $(this).attr('id');
       	var clientName = $(this).attr('val');
								var data = {'clientNumber' : clientNumber};
								$.ajax({
        type: 'POST',
        url: 'http://localhost/wellness/dashboard/getClientDetails/',
        data : data,
        crossDomain: true,
        success: function (data) {
        	$('#client-name').empty();
        $('#client-name').append(clientName);
       	$('#clendar-hide').hide();
       	$('#attend').show();
       	$('#client-records').html(data);
								//$('#hidden-client-id').html(data);
        },
        error: function (err) {
            console.log(err);
        }});
   			});";

			

			$this->javascript->output($hideForm);
			$this->javascript->output($showIncomingClients);
			$this->javascript->output($attachStaticEventHandlers);
			$this->javascript->click('.day',$getDay);
			$this->javascript->click('.day',$showClients);
			$this->javascript->click('.clickBook',$bookRequest);	
			$this->javascript->compile();
		}


}
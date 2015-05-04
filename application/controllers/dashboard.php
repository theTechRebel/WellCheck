<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
			public function __construct() {
		parent::__construct();
		js();
		$this->javascript_functions();
	}

		public function index(){
			isLoggedIn();
			$this->calendar();
		}

	public function bookACertainDay(){

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
        $type=null;
								$this->load->view('js');
			   	 $this->load->view('header');	
								$this->load->view('reception/dashboard_bookClientOnDate',array('type'=>$type,'date'=>$_POST['date']));
								$this->load->view('footer');
        }else{

        	$query = $this->app_model->get_all_where("patientdetails", array('idnumber'=>$_POST['idnumber']));

        	if($query->num_rows() > 0){
        		//we already have the client
        		$this->load->view('js');
			   	  $this->load->view('header');	
        		$this->load->view('reception/dashboard_bookClientOnDate',array('problem'=>"The Client is already in the system, please select the clients record from the clients tab and que them for check up.",'date'=>$_POST['date']));
        		$this->load->view('footer');
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
         //book this dude
         
         	$table_name = "calendar";
								  $condition = array(
										'clientnumber'=>$clientID,
										'thedate' => $_POST['date'],
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
										'clientnumber'=>$clientID,
										'thedate' => $_POST['date'],
										'status' => 'qued',
										'time' => date('H:i:s')
										);

								$this->app_model->insert($table_name, $condition);
								$query = $this->app_model->get_all_where("calendarcount",array('thedate'=>$_POST['date']));

								if($query->num_rows() > 0){
									//if there are other bookings already for that date
										$qued = intval($query->row()->qued);
										$qued ++;
										$this->app_model->update("calendarcount", array('qued'=>$qued), array('thedate'=>$_POST['date']));
								}else{
									//there are no bookings for that date
										$qued = 1;
										$this->app_model->insert("calendarcount", array('thedate'=>$_POST['date'],'qued'=>$qued));
								}
									$this->clients(0,'Succesfully booked client with assigned WellCheck ID: '.$clientID);
								}
          //redirect('dashboard/clients/');
       }
        	//send notification to nurse of new client
     }
	}

//you cant name a controller edit when using groceryCRUD
	public function editClient()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('patientdetails');
			$crud->set_subject('Clients');
			$crud->columns('idnumber','names','surname','salutation','gender');

			$output = $crud->render();

	$this->load->view('js');
 $this->load->view('header');		
	$this->load->view('reception/dashboard_editClient',$output);
	$this->load->view('footer');
	}


		public function calendar($year=null, $month=null){

				$config['base_url'] = 'http://localhost/wellness/dashboard/getClients/';
			$totalRows = $this->app_model->get_all("patientdetails");
			$config['total_rows'] = $totalRows->num_rows();
			$config['per_page'] = 10;
			$config['anchor_class'] = "class='dropDownMoreClients'";
			$this->pagination->initialize($config);

			if($year != null && $month != null){
				$query 	= $this->calendar_model->getBookings($year,$month);
				$query2 = $this->app_model->get_all("patientdetails", 10, 0);
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
			   	$this->load->view('header');			
							$this->load->view('reception/dashboard',$data);
							$this->load->view('footer');
		   break;

		   case "scientist":
		    $this->load->view('js');
						$this->load->view('header');		
						$this->load->view('scientist/dashboard',$data);
						$this->load->view('footer');	   	
		   break;

		  }
			}else{

				$dates = explode("/", getCalendarDateToday());
				$query 	= $this->calendar_model->getBookings($dates[0],$dates[1]);
				$query2 = $this->app_model->get_all("patientdetails", 10, 0);
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
			   	$this->load->view('header');			
							$this->load->view('reception/dashboard',$data);
							$this->load->view('footer');
			   break;

			   case "scientist":
			    $this->load->view('js');
							$this->load->view('header');		
							$this->load->view('scientist/dashboard',$data);
							$this->load->view('footer');	   	
		   break;

			  }
			}
		}

		public function booking($id=null){
			//die(var_dump($_POST));
				if($id==null){
					//no id specified
				}else{

						if(isset($_POST['booking'])){
							die(var_dump($_POST));
							$id = $_POST['clientNumber'];
							$date = $_POST['booking'];
						}else{
							$date = getCalendarDateTodayFull();
						}

						$table_name = "calendar";
				  $condition = array(
						'clientnumber'=>$id,
						'thedate' => $date,
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
						'thedate' => $date,
						'status' => 'qued',
						'time' => date('H:i:s')
						);

					$this->app_model->insert($table_name, $condition);
					$query = $this->app_model->get_all_where("calendarcount",array('thedate'=>$date));

					if($query->num_rows() > 0){
						//if there are other bookings already for that date
							$qued = intval($query->row()->qued);
							$qued ++;
							$this->app_model->update("calendarcount", array('qued'=>$qued), array('thedate'=>$date));
					}else{
						//there are no bookings for that date
							$qued = 1;
							$this->app_model->insert("calendarcount", array('thedate'=>$date,'qued'=>$qued));
					}
					$this->clients(0,'Succesfully booked client with assigned WellCheck ID: '.$id);
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
					$condition = array(
					'clientnumber'=>$clientNumber,
					'thedate' => $thedate,
					'status' => $status,
					'time' => date('H:i:s')
					);

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
								$this->load->view('js');
			   	 $this->load->view('header');	
								$this->load->view('reception/dashboard_walkinclient',array('type'=>$type));
								$this->load->view('footer');
        }else{

        	$query = $this->app_model->get_all_where("patientdetails", array('idnumber'=>$_POST['idnumber']));

        	if($query->num_rows() > 0){
        		//we already have the client
								  $this->load->view('js');
			   	   $this->load->view('header');	
        		$this->load->view('dashboard_walkinclient',array('problem'=>"The Client is already in the system, please select the clients record from the clients tab and que them for check up.",'type'=>$type));
        		$this->load->view('footer');
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

		public function clients($offset=0,$report=null){

			$config['base_url'] = 'http://localhost/wellness/dashboard/clients/';
			
			$this->db->select('*');
			$this->db->from('patientrecord');
			$this->db->limit(12, $offset);
			$this->db->join('patientdetails', 'patientdetails.idnumber = patientrecord.idnumber');
			$this->db->order_by('patientrecord.id', 'DESC'); 
			$query = $this->db->get();

			$totalRows = $this->app_model->get_all("patientrecord");

			$config['total_rows'] = $totalRows->num_rows();
			$config['per_page'] = 12;

			$this->pagination->initialize($config);

					switch($this->session->userdata('rights')){
						case "clinician":
											if($report != null){
												$this->load->view('js');
												$this->load->view('header');		
												$this->load->view('clinician/dashboard_clients',array('patientrecords'=>$query,'report'=>$report));
												$this->load->view('footer');
													}else{
												$this->load->view('js');
												$this->load->view('header');	
												$this->load->view('clinician/dashboard_clients',array('patientrecords'=>$query));
												$this->load->view('footer');
													}
						break;
		

						case "reception":
										if($report != null){
												$this->load->view('js');
			   	    $this->load->view('header');	
											$this->load->view('reception/dashboard_clients',array('patientrecords'=>$query,'report'=>$report));
											$this->load->view('footer');
										}else{
											$this->load->view('js');
			   	    $this->load->view('header');	
											$this->load->view('reception/dashboard_clients',array('patientrecords'=>$query));
											$this->load->view('footer');
										}
						break;
					}
		}

		public function getClients($offset=0){
   $config['base_url'] = 'http://localhost/wellness/dashboard/getClients/';
			$totalRows = $this->app_model->get_all("patientdetails");

			$config['total_rows'] = $totalRows->num_rows();
			$config['per_page'] = 10;
			$config['anchor_class'] = "class='dropDownMoreClients'";

			$this->pagination->initialize($config);

			$query = $this->app_model->get_all("patientdetails",10,$offset);

		  foreach($query->result() as $patient){
		  echo "<li role='presentation'>";
			 echo "<a role='menuitem' tabindex='-1' class='clickBook' id='$patient->idnumber'>";
			 echo "$patient->names $patient->surname $patient->idnumber</a></li>";
		  }
		  echo "<p align='center'>";
		  echo $this->pagination->create_links();
		  echo "</p>";
		  echo "<p align='center'><a href='http://localhost/wellness/dashboard/walkInClient/1' id='bookNewClientToday'><b>+</b> Add As New Client</a></p>";
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
				echo "<td><a class='openAttend' id='$row->clientnumber' href='#' val='$row->names $row->surname' time='$row->time'>Attend</a></td>";
				echo "</tr>";
				}
				echo "</tbody>";
			echo "</table>";
			}
		}

		public function getIncomingTestClients(){
			$this->db->select('*');
			$this->db->from('patienthistory');
			$this->db->where(array('checkupdate'=>getCalendarDateTodayFull(),'timeout'=>0));
			$this->db->join('patientrecord', 'patientrecord.clientnumber = patienthistory.clientnumber');
			$this->db->join('patientdetails', 'patientdetails.idnumber = patientrecord.idnumber');
			$this->db->order_by('patienthistory.timein', 'DESC'); 
			$query = $this->db->get();

			$needles = array('bp','weight','bmi','O2saturation','height','sugar','hemoglobin','visualscreen');
			$clients = array();
			$counter = 0;
				if($query->num_rows() > 0){
					$counter = 0;
					for ($i=0; $i < $query->num_rows(); $i++) { 
						$testsArray = explode(',', $query->row($i)->test);
						$tests = array_diff($testsArray, $needles);
						if(count($tests)>0){
							$clients[$counter] = $query->row($i);
							$counter++;
						}
					}

				if(count($clients)>0){
				echo "<table class='table small' id='table-generated-incoming-tests'>";
				echo "<td>Client details</td><td>Time In</td><td>Attend</td>";
				echo "<tbody>";
				foreach ($clients as $row){
				echo "<tr>";
				echo "<td>$row->clientnumber $row->names $row->surname </td>";
				echo "<td>$row->timein</td>";
				echo "<td><a class='openTest' id='$row->clientnumber' href='#' time='$row->timein' val='$row->names $row->surname'>Attend</a></td>";
				echo "</tr>";
				}
				echo "</tbody>";
			echo "</table>";
				}
			}		
		}


		public function getIncomingBloodResults(){
   $this->db->select('*');
			$this->db->from('patienthistory');
			$this->db->where(array('checkupdate'=>getCalendarDateTodayFull(),'timeout'=>1));
			$this->db->join('patientrecord', 'patientrecord.clientnumber = patienthistory.clientnumber');
			$this->db->join('patientdetails', 'patientdetails.idnumber = patientrecord.idnumber');
			$this->db->order_by('patienthistory.timein', 'DESC'); 
			$query = $this->db->get();

    $date = getCalendarDateTodayFull();
				if($query->num_rows()>0){
				echo "<table class='table small' id='table-generated-incoming-tests-bloods'>";
				echo "<td>Client details</td><td>View Results</td>";
				echo "<tbody>";
				foreach ($query->result() as $row){
				echo "<tr>";
				echo "<td>$row->clientnumber $row->names $row->surname </td>";
				echo "<td><a class='openResultsA' id='$row->clientnumber' href='http://localhost/wellness/dashboard/testsResults/$row->clientnumber/$date' time='$row->timein' val='$row->names $row->surname'>View Results</a></td>";
				echo "</tr>";
				}
				echo "</tbody>";
				echo "</table>";
				}
		}

		public function getClientDetails(){
			$this->session->unset_userdata('attend');
			$this->session->set_userdata('attend',$_POST['clientNumber']);
			$this->session->set_userdata('time',$_POST['timein']);

			$this->db->select('*');
			$this->db->from('patientrecord');
			$this->db->where(array('clientnumber'=>$_POST['clientNumber']));
			$this->db->join('patientdetails', 'patientdetails.idnumber = patientrecord.idnumber');
			$query = $this->db->get();

			if($query->num_rows() > 0){
				echo "<table class='table table-bordered table-hover table-condensed'>";
				echo "<tbody>";

				foreach ($query->result() as $row){
					$id = $row->clientnumber;
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


		public function getClientTestDetails(){
			$this->db->select('*');
			$this->db->from('patienthistory');
			$this->db->where(array('clientnumber'=>$_POST['clientNumber'],'checkupdate'=>getCalendarDateTodayFull()));
			$query = $this->db->get();

			$row = $query->row();

			$needles = array('bp','weight','bmi','O2saturation','height','sugar','hemoglobin','visualscreen');
			$counter = 0;
			$testsArray = explode(',', $row->test);
			$tests = array_diff($testsArray, $needles);
			$data = array('package'=>$row->package,'tests'=>$tests);
			die(print json_encode($data));
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

	public function stage(){
			$keys = array_keys($_POST);

 //die(var_dump($keys[0]));

		if(!isset($keys[0])){
			/*
			if($this->session->userdata('stage') == 'questionaire'){
					$this->questionaire();
				}else if($this->session->userdata('stage') == 'tests'){
					$this->tests();
				}else{
					echo "Please select packages to proceed. You have not selected anything yet.";
				}
				*/
			echo "Please select packages to proceed. You have not selected anything yet.";
			
		}else{

			switch($keys[0]){
					case 'basic':

					break;

					case 'standard':

					break;

					case 'comprehensive':

					break;

					case 'corporate':

					break;

					case 'quick':

					break;

					default:
							echo "Please select a different package test, these tests are not available yet.";
							die();
					break;
			}

			$cost = 0;
			$i = 0;
			foreach ($_POST[$keys[0]] as $key => $value) {
				$package = explode("_",$value);
				$cost += (double)$package[1];
				$test[$i] =$package[0];
				$i++;
			}

			$tests = implode(',',$test);
			switch($keys[0]){
					case 'standard':
			$tests = "height,bmi,sugar,hemoglobin,".$tests;
					break;

					case 'comprehensive':
			$tests = "height,bmi,sugar,hemoglobin,hiv,hdltcholesterol,urine,".$tests;
					break;
			}


			$query = $this->app_model->get_all_where("patienthistory",array('checkupdate'=>getCalendarDateTodayFull(),'clientnumber'=>$this->session->userdata('attend')));

			if($query->num_rows()>0){
				$data = array('checkupdate'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'),
				         'test'=>$tests,
				         'package'=>$keys[0],
				         'timeout'=>0,
				         'timein'=>$this->session->userdata('time'),
				         'charge'=>$cost);
				$condition =  array('checkupdate'=>getCalendarDateTodayFull(),
					                   'clientnumber'=>$this->session->userdata('attend'));
					$this->app_model->update("patienthistory", $data, $condition);

			}else{
				$data = array('checkupdate'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'),
				         'test'=>$tests,
				         'timeout'=>0,
				         'package'=>$keys[0],
				         'timein'=>$this->session->userdata('time'),
				         'charge'=>$cost);
				$this->app_model->insert("patienthistory",$data);				
			}
				switch($keys[0]){
						case 'basic':
							echo 'tests';
						break;

						case 'standard':
							echo 'questionaire';
						break;

						case 'comprehensive':
							echo 'questionaire';
						break;

						case 'corporate':
							echo 'tests '.$tests;
						break;

						case 'quick':
							echo 'tests';
						break;

						default:
								echo "Please select a different package test, these tests are not available yet.";
								die();
						break;
				}
		}
	}


public function getTests(){
				$condition = array('checkupdate'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'));
				$query = $this->app_model->get_all_where("patienthistory", $condition, $limit=1);
				$data = $query->row();
				$arrayOfTests = explode(',', $data->test,5);

				echo "<form class='form-clinician' name='form-clinician-tests' action='#'>";
				echo "<table class='table table-striped table-bordered table-hover'>";
				echo "<tr><th>Test</th><th>Results</th></tr>";

				if(count($arrayOfTests)<4){
						foreach ($arrayOfTests as $value) {
						echo "<tr><td>$value</td><td><input type='text' class='form' name='$value'></td></tr>";
						}
				}else{
						for ($i=0; $i < 4; $i++) { 
						echo "<tr><td>$arrayOfTests[$i]</td><td><input type='text' class='form' name='$arrayOfTests[$i]'></td></tr>";
					}
				}
				

				echo "</table>";
				echo "<input type='submit' class='btn btn-success' value='Save Tets'>";
				echo "</form>";
}


public function saveTests(){
	   $condition = array('date'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'));
				$query = $this->app_model->get_all_where("patientresults", $condition, $limit=1);

				if($query->num_rows() > 0){
								$data = array('date'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'),
				         'results' => json_encode($_POST));
				$condition =  array('date'=>getCalendarDateTodayFull(),
					                   'clientnumber'=>$this->session->userdata('attend'));
					$this->app_model->update("patientresults", $data, $condition);
				}else{
				$data = array('date'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'),
				         'results'=> json_encode($_POST));
				$this->app_model->insert("patientresults",$data);	
				}

	   $condition = array('checkupdate'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'));
				$this->app_model->update("patienthistory",array('timeout'=>1),$condition);

//update calendar table set person to processed
//update calendarcount and decrement que, increment processed

				print json_encode($_POST);
}

public function getSavedTests(){
    $condition = array('date'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$_POST['clientNumber']);
				$query = $this->app_model->get_all_where("patientresults", $condition, $limit=1);
					print $query->row()->results;
}

public function saveQuestionaire(){
	 $condition = array('date'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'));
				$query = $this->app_model->get_all_where("patientresults", $condition, $limit=1);

				if($query->num_rows() > 0){
								$data = array('date'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'),
				         'questionaire' => json_encode($_POST));
				$condition =  array('date'=>getCalendarDateTodayFull(),
					                   'clientnumber'=>$this->session->userdata('attend'));
					$this->app_model->update("patientresults", $data, $condition);
					echo "questionaire saved successfully";
					die();
				}else{
				$data = array('date'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'),
				         'questionaire'=> json_encode($_POST));
				$this->app_model->insert("patientresults",$data);	
					echo "questionaire saved successfully";
					die();
				}
}

public function saveClinicianTests(){
$condition = array('date'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'));
				$query = $this->app_model->get_all_where("patientresults", $condition, $limit=1);

				if($query->num_rows() > 0){
								$data = array('date'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'),
				         'clinicianresults' => json_encode($_POST));
				$condition =  array('date'=>getCalendarDateTodayFull(),
					                   'clientnumber'=>$this->session->userdata('attend'));
					$this->app_model->update("patientresults", $data, $condition);
					echo "clinician tests saved successfully";
					die();
				}else{
				$data = array('date'=>getCalendarDateTodayFull(),
				         'clientnumber'=>$this->session->userdata('attend'),
				         'clinicianresults'=> json_encode($_POST));
				$this->app_model->insert("patientresults",$data);	
					echo "clinician tests saved successfully";
					die();
				}
}

public function saveDrAssesment(){
	$data = array('comments'=>$_POST['clinician_comments']);
	$condition = array('clientnumber'=>$_POST['id'],'date'=>$_POST['date']);
 $this->app_model->update("patientresults", $data, $condition);
 echo "succesfully updated comments";
}

public function testsResults($clientID,$year=null,$month=null,$day=null){

	$condition = array('patientresults.clientnumber'=>$clientID,
		                  'patientresults.date'=>$year."/".$month."/".$day);

 	$this->db->select('*');
		$this->db->from('patientresults');
		$this->db->where($condition);
		$this->db->join('patientrecord', 'patientrecord.clientnumber = patientresults.clientnumber');
		$this->db->join('patientdetails', 'patientdetails.idnumber = patientrecord.idnumber');
		$query1 = $this->db->get();
		$client = $query1->row();


	$query = $this->app_model->get_all_where("patientresults", $condition, 1);
	$row = $query->row();
	$data = array('questionaire'=>$row->questionaire,
		             'clinicianresults'=>$row->clinicianresults,
		             'scientisttests'=>$row->results,
		             'comments'=>$row->comments,
		             'client'=>$client); 


	   switch($this->session->userdata('rights')){

		   case "clinician":
 $this->load->view('js');
 $this->load->view('header');		
	$this->load->view('clinician/dashboard_results',$data);
	$this->load->view('footer');
		   break;

		   case "scientist":
  $this->load->view('js');
 $this->load->view('header');		
	$this->load->view('scientist/dashboard_results',$data);
	$this->load->view('footer');  	
		   break;

		  }
}


		public function testHistory($year=null,$month=null){
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
   $this->db->order_by("patientresults.date", "asc");
   //$this->db->where(array('stocktransactions.user' => $this->session->userdata('rights')));
   $this->db->join('patientrecord', 'patientrecord.clientnumber = patientresults.clientnumber');
   $this->db->join('patientdetails', 'patientdetails.idnumber = patientrecord.idnumber');
   $query = $this->db->get("patientresults");

   $data = array('records' => $query,
   														'year' => $month[0], 
   	             'month'=>$month[1], 
   	             'next'=> $next,
   	             'prev'=> $prev);

   switch($this->session->userdata('rights')){

		   case "clinician":
   $this->load->view('js');
   $this->load->view('header');		
   $this->load->view('clinician/dashboard_patienthistory',$data);
   $this->load->view('footer');
		   break;

		   case "scientist":
   $this->load->view('js');
   $this->load->view('header');		
   $this->load->view('scientist/dashboard_patienthistory',$data);
   $this->load->view('footer');   	
		   break;

		  }


		}
	}
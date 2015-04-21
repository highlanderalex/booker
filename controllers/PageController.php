<?php
    
    class PageController 
	{
		private $view;
		
		public function __construct()
		{
            $this->view = new View();
			date_default_timezone_set(TIMEZONE);
			/*sessionRun();
			$translate = new Language($_SESSION['lang']);
			foreach($translate->getTranslate() as $key=>$val)
			{
				$this->view->$key = $translate->getLang($key);
			}*/
		}
		
		public function index()
		{	
			//date_default_timezone_set(TIMEZONE);
			//session_destroy();
			if ($_POST['mon'])
			{
				$_SESSION['type_week'] = $_POST['type_week']; 
			}
			if ($_POST['sun'])
			{
				$_SESSION['type_week'] = $_POST['type_week']; 
			}
			if (!isset($_SESSION['type_week']))
			{
				$_SESSION['type_week'] = 0; 
			}
			if (!isset($_SESSION['month']) && !isset($_SESSION['year']))
			{
				$_SESSION['month'] = date('m'); 
				$_SESSION['year'] = date('y'); 
			}

			if ($_POST['prev'])
			{
				if($_SESSION['month'] == 1)
				{
					$_SESSION['month'] = 12;
					$_SESSION['year'] -= 1;   
				}
				else
				{
				   $_SESSION['month'] -= 1;
				} 
			}
			if ($_POST['next'])
			{
				if($_SESSION['month'] == 12)
				{
					$_SESSION['month'] = 1;
					$_SESSION['year'] += 1;    
				}
				else
				{
					$_SESSION['month'] += 1;
				} 
            }
            $rooms = new RoomController();
            $this->view->linkRooms = $rooms->getRooms();
            if (isset($_GET['idRoom']))
            {
                //check id
                $id = $_GET['idRoom'];
                if (checkId($id))
                {
                    if ($rooms->checkId($id))
                    {
                        $nameRoom = $rooms->getRoom($id);
                        $_SESSION['idRoom'] = $id;
                        $_SESSION['nameRoom'] = $nameRoom['name'];
                    }
                    else
                    {
			            $this->view->render('404');
                    }
                }
                else
                {
			        $this->view->render('404');
                }

            }
            else
            {    
                if (!isset($_SESSION['idRoom']))
                {
                    $defaultRoom = $rooms->getDefaultRoom();
                    $_SESSION['idRoom'] = $defaultRoom['idRoom'];
                    $_SESSION['nameRoom'] = $defaultRoom['name'];
                }
            }
            $event = new EventController();
            $arr = $event->getEvents($_SESSION['idRoom']);
			$this->view->calendar = drawCalendar($_SESSION['month'], $_SESSION['year'],$_SESSION['type_week'], $arr);
			$this->view->render('index');
		}
		
		public function error()
		{		
			$this->view->render('404');
		}
		
		public function login()
		{
			if (isset($_POST['login']))
            {
                $form = new ValidForm($_POST);
				$data = $form->validData();
				if (is_array($data))
				{
					$data['password'] = hashPass($data['password']);
					$user = new UserController();
					if($user->checkAuth($data))
					{
						$datauser = $user->dataUser($data);
						$_SESSION['idUser'] = $datauser['idUser'];
						$_SESSION['nameUser'] = $datauser['name'];
						$_SESSION['statusUser'] = $datauser['status'];
						redirect('index');
					}
					else
					{
						$this->view->error = "Correct email or password<br />";
					}	
				}
				else
				{
					$this->view->error = $data;
				}
			}
			if (isset($_SESSION['idUser']))
			{
				redirect('index');
			} 
			else
			{
				$this->view->render('login');
			}
		}
		
		public function registration()
		{
			checkStatusUser();
			if (isset($_POST['registration']))
			{
                $form = new ValidForm($_POST);
				$data = $form->validData();
                if (is_array($data))
				{
					$data['password'] = hashPass($data['password']);
					$newuser = new UserController();
					if($newuser->checkEmail($data['email']))
					{
						$this->view->error = "This email exist yet<br />";
					}
					else
					{
						if($newuser->insertDb($data))
						{
                            $this->view->error = "New user success add<br />";
                            unset($_POST);
						}
						else
						{
							$this->view->error = "Error add into database<br />";
						}
					}
				}
				else
				{
					$this->view->error = $data;
				}
			}
			$this->view->render('registration');
		}
		public function successreg()
		{
			$this->view->msg = 'Вы упешно зарегистрированы';
			$this->view->render('successreg');
		}
		
		public function logout()
		{
			session_destroy();
			//sessionDestroy();
			redirect('login');
		}
		
		public function admin()
		{
			checkStatusUser();
			if (isset($_POST['updateUser']))
			{
				$form = new ValidForm($_POST);
				$data = $form->validData();
				if (is_array($data))
				{
					$user = new UserController();
					if($user->checkDataUser($data['idUser'], $data['email']))
					{
						$this->view->error = "This email exist yet<br />";
					}
					else
					{
						$user->updateUser($data);
						$this->view->error = "User success update<br />";
					}
				}
				else
				{
					$this->view->error = $data;
				}
			}
			if (isset($_POST['deleteUser']))
			{
				$user = new UserController();
				$user->deleteUser($_POST['idUser']);
				$this->view->error = "User success delete<br />";
			}
			$employees = new UserController();
			$this->view->users = $employees->getUsers();
			$this->view->render('admin');
		}
		
		public function updateevent()
		{
			if (isset($_POST['updateevent']))
			{
				$this->view->error = 'Update';
			}
			
			if (isset($_POST['deleteevent']))
			{
				$this->view->error = 'Delete';
            }
            $id = $_GET['id'];
            $event = new EventController();
            $this->view->item = $event->getEvent($id);
            $this->view->item['startTime'] = substr($this->view->item['startTime'], 0, -3);
            $this->view->item['startHour'] = substr($this->view->item['startTime'], 0, -3);
            $this->view->item['starMin'] = substr($this->view->item['startTime'], 3);
            $this->view->item['endTime'] = substr($this->view->item['endTime'], 0, -3);
            $this->view->item['endHour'] = substr($this->view->item['endTime'], 0, -3);
            $this->view->item['endMin'] = substr($this->view->item['endTime'], 3);
            if ($this->view->item['date'] >= date('Y-m-d'))
            {
                $this->view->flagDate = true;
            }
            else
            {
                $this->view->flagDate = false;
            }
            $employees = new UserController();
			$this->view->users = $employees->getUsers();
			$this->view->render('updateevent');
		}
		
		public function addevent()
		{
            $this->view->success = '';
            if ($_POST['addevent'])
            {
                $form = new ValidForm($_POST);
				$data = $form->validData();
                if (is_array($data))
                {
                    $newevent = new EventController();
                    $data['idRoom'] = $_SESSION['idRoom'];
                    $newevent->addNewEvent($data);
                    $this->view->success = 'Event success add';
                }
                else
                {
                    $this->view->error = $data;
                    $employees = new UserController();
			        $this->view->users = $employees->getUsers();
			        $this->view->item = $employees->getUser($_SESSION['idUser']);
                }
            }
            else
            {
                $employees = new UserController();
			    $this->view->users = $employees->getUsers();
			    $this->view->item = $employees->getUser($_SESSION['idUser']);
            }
			$this->view->render('addevent');
		}
    }


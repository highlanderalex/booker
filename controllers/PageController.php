<?php
    
    class PageController 
	{
		private $view;
		
		public function __construct()
		{
            $this->view = new View();
			date_default_timezone_set(TIMEZONE);
			setLangSession();
			$translate = new Language($_SESSION['lang']);
			foreach($translate->getTranslate() as $key=>$val)
			{
				$this->view->$key = $translate->getLang($key);
			}
		}
		
		public function index()
		{	
			setParamSession();
            $rooms = new RoomController();
            $this->view->linkRooms = $rooms->getRooms();
            if (isset($_GET['idRoom']))
            {
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
                    $event = new EventController();
                    $data['idRoom'] = $_SESSION['idRoom'];
					if ( 0 == $_SESSION['statusUser'] )
					{
						$data['idUser'] = $_SESSION['idUser'];
					}
                    
					if ( '0' == $data['rec'] )
					{
						$item = $event->getEventsByDate($data['date'], $data['idRoom']);
						if (empty($item))
						{
							$event->addNewEvent($data);
							$this->view->success = 'Event success add';
						}
						else
						{
							foreach($item as $e)
							{
								$flag = false;
								if (strtotime($data['endTime']) <= strtotime($e['startTime']) || 
									strtotime($data['startTime']) >= strtotime($e['endTime']))
								{
									$flag = true;
								}
								if (!$flag) break;
							}
							if (!$flag)
							{
								$this->view->error = 'Time is taken this day';
							}
							else
							{
								$event->addNewEvent($data);
								$this->view->success = 'Event success add';
							}
						}
					}
					
					if ( '1' == $data['rec'] )
					{
						if($this->setOccEvent($data, 7, $event))
						{
							$this->view->success = 'All events success add';
						}
						else
						{
							$this->view->error = 'Time is taken this day';
						}
					}
					
					if ( '2' == $data['rec'] )
					{
						if($this->setOccEvent($data, 14, $event))
						{
							$this->view->success = 'All events success add';
						}
						else
						{
							$this->view->error = 'Time is taken this day';
						}
					}
					if ( '3' == $data['rec'] )
					{
						if($this->setOccEvent($data, 28, $event))
						{
							$this->view->success = 'All events success add';
						}
						else
						{
							$this->view->error = 'Time is taken this day';
						}
					} 
                }
                else
                {
                    $this->view->error = $data;
                }
            }
            
			$employees = new UserController();
			$this->view->users = $employees->getUsers();
			$this->view->item = $employees->getUser($_SESSION['idUser']);
			$this->view->render('addevent');
		}
		
		private function setOccEvent($data, $d, $event)
		{
			for( $i = 0; $i <= $data['num']; $i++)
			{
				$flag = true;
				$str = strtotime($data['date']);
				$our['date'] = date('Y-m-d',($str+86400*$d*$i));
				$item = $event->getEventsByDate($our['date'], $data['idRoom']);
				if (empty($item))
				{
					$flag = false;
					continue;
				}
				else
				{
					foreach($item as $e)
					{
						$flag = true;
						if (strtotime($data['endTime']) <= strtotime($e['startTime']) || 
							strtotime($data['startTime']) >= strtotime($e['endTime']))
						{
							$flag = false;
						}
						if (!$flag) 
						{
							continue;
						}
						else
						{
							break;
						}
					}
					if ($flag) break;
				}
			}
			if($flag)
			{
				return false;
			}
			else
			{
				$event->addNewEvent($data);
				$data['idPar'] = $event->getLastId();
				$startdate = $data['date'];
				for( $i = 1; $i <= $data['num']; $i++)
				{
					$str = strtotime($startdate);
					$data['date'] = date('Y-m-d',($str+86400*$d*$i));
					$event->addNewEvent($data);
				}
				return true;
			}
						
		}
    }


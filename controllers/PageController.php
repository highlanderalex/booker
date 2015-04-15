<?php
    
    class PageController 
	{
		private $view;
		
		public function __construct()
		{
			$this->view = new View();
			/*sessionRun();
			$translate = new Language($_SESSION['lang']);
			foreach($translate->getTranslate() as $key=>$val)
			{
				$this->view->$key = $translate->getLang($key);
			}*/
		}
		
		public function index()
		{	
			date_default_timezone_set(TIMEZONE);
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
			$this->view->calendar = drawCalendar($_SESSION['month'], $_SESSION['year'],$_SESSION['type_week']);
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
					$user = new UserController();
					if($user->checkAuth($data))
					{
						$datauser = $user->dataUser($data);
						$_SESSION['id'] = $datauser['id'];
						$_SESSION['user'] = $datauser['name'];
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
			$this->view->render('login');
		}
		
		public function registration()
		{
			if (isset($_POST['registration']))
			{
                $form = new ValidForm($_POST);
				$data = $form->validData();
                if (is_array($data))
				{
					$newuser = new UserController();
					if($newuser->checkEmail($data['email']))
					{
						$this->view->error = "Такой email уже зарегистрирован в базе<br />";
					}
					else
					{
						if($newuser->insertDb($data))
						{
							redirect('successreg');
						}
						else
						{
							$this->view->error = "Ошибка добавления в базу<br />";
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
		
		public function adminPanel()
		{
			
		}
		
		public function addEvent()
		{
			
		}
		
		public function updateEvent()
		{
			
		}
		
		public function delEvent()
		{
			
		}
    }


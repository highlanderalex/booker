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
		
		public function destroy()
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


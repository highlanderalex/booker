<?php
	require_once (dirname(__FILE__).'/../models/UserModel.php');
	
    /* Class UserController for UserModel
        * *
        * *
        * * @method construct: Create object model
        * * @method checkEmail: valid on exist email into database
        * * @method checkAuth: Retutn count 1 or 0 
        * * @method dataUser: Retutn assoc array of data user
        * * @method insertDb: Insert database new user
		* * @method updateUser:Return count of changes rows
		* * @method deleteUser:Return count of changes rows
		* * @method getUser: Retutn assoc array of one user 
		* * @method getUsers: Retutn assoc array of all users 
        * */

    class UserController  
	{
		private $model;
		
		public function __construct()
		{
			$this->model = new UserModel();
		}
		
		/* checkEmail method
			* *
			* *
			* * @params email: val email
			* * @return: Retutn 0 or 1
			* */

        public function checkEmail($email)
        {
            $res = $this->model->returnEmail($email);
            return $res;
        }
		
		/* checkDataUser method
			* *
			* *
			* * @params int, string: val int id, string email
			* * @return: Retutn 0 or 1
			* */
			
		public function checkDataUser($idUser, $email)
        {
            $res = $this->model->returnCheckData($idUser, $email);
            return $res;
        }
		
		/* checkAuth method
			* *
			* *
			* * @params data: array data with key email, password
			* * @return: Retutn 0 or 1
			* */

		public function checkAuth($data)
        {
            $res = $this->model->returnAuth($data);
            return $res;
        }
		
		/* dataUser method
			* *
			* *   
			* * @params data: array data with key email, password
			* * @return: Retutn assoc array of user 
			* */

		public function dataUser($data)
        {
            $res = $this->model->returnDataUser($data);
            return $res;
        }
		
		/* getUsers method
			* *
			* *   
			* * @params: no params
			* * @return: Retutn assoc array of all users 
			* */
			
		public function getUsers()
        {
            $res = $this->model->returnUsers();
            return $res;
        }
		
		/* getUser method
			* *
			* *   
			* * @params int: int id param
			* * @return: Retutn assoc array of one user 
			* */
			
		public function getUser($id)
        {
            $res = $this->model->returnUser($id);
            return $res;
        }
		
		/* insertDb method
			* *
			* *
			* * @params data: array data with key email, password
			* * @return:Return count of changes rows
			* */

		public function insertDb($data)
        {
            $res = $this->model->insertDb($data);
            return $res;
        }
		
		/* updateUser method
			* *
			* *
			* * @params data: array data with key email, password
			* * @method updateUser:Return count of changes rows
			* */
			
		public function updateUser($data)
        {
            $res = $this->model->updateUser($data);
            return $res;
        }
		
		/* deleteUser method
			* *
			* *
			* * @params int: int idUser
			* * @return:Return count of changes rows
			* */
			
		public function deleteUser($idUser)
        {
            $res = $this->model->deleteUser($idUser);
            return $res;
        }
	}

<?php

	require_once ('DB.php');
    
    /* Class UserModel
        * *
        * *
        * * @method construct: Create object model
        * * @method returnkEmail: valid on exist email into database
        * * @method returncheckAuth: Retutn count 1 or 0 
        * * @method returnDataUser: Retutn assoc array of data user
        * * @method insertDb: Insert database new user
		* * @method updateUser:Return count of changes rows
		* * @method deleteUser:Return count of changes rows
		* * @method returnUser: Retutn assoc array of one user 
		* * @method returnUsers: Retutn assoc array of all users 
        * */

    class UserModel 
	{
		private $inst;
		
		public function __construct()
		{
			$this->inst = DB::run();
		}
		
		/* returnEmail method
			* *
			* *
			* * @params email: val email
			* * @return: Retutn 0 or 1
			* */

		public function returnEmail($email)
        {
			$arr['where'] = $email;
            $res = $this->inst->Select('COUNT(email) as val')
						      ->From('b_employees')
							  ->Where('email=')
							  ->Execute($arr);
			$res = $this->inst->dbCount($res);
            return $res; 
        }
		
		/* returncheckData method
			* *
			* *
			* * @params int, string: val int id, string email
			* * @return: Retutn 0 or 1
			* */
			
		public function returnCheckData($idUser, $email)
        {
			$arr['where'] = $email;
			$arr['and'] = $idUser;
            $res = $this->inst->Select('COUNT(email) as val')
						      ->From('b_employees')
							  ->Where('email=')
							  ->I('idUser!=')
							  ->Execute($arr);
			$res = $this->inst->dbCount($res);
            return $res; 
        }
		
		/* returnAuth method
			* *
			* *
			* * @params data: array data with key email, password
			* * @return: Retutn 0 or 1
			* */
			
		public function returnAuth($data)
        {
			$arr['where'] = $data['email'];
			$arr['and'] = $data['password'];
            $res = $this->inst->Select('COUNT(idUser)')
						      ->From('b_employees')
							  ->Where('email=')
							  ->I('password=')
							  ->Execute($arr);
			$res = $this->inst->dbCount($res);
            return $res; 
        }
		
		/* returnDataUser method
			* *
			* *   
			* * @params data: array data with key email, password
			* * @return: Retutn assoc array of user 
			* */
			
		public function returnDataUser($data)
        {
			$arr['where'] = $data['email'];
			$arr['and'] = $data['password'];
            $res = $this->inst->Select('idUser, name, status')
						      ->From('b_employees')
							  ->Where('email=')
							  ->I('password=')
							  ->Execute($arr);
			$res = $this->inst->dbLineArray($res);
            return $res; 
        }
		
		/* returnUsers method
			* *
			* *   
			* * @params: no params
			* * @return: Retutn assoc array of all users 
			* */
			
		public function returnUsers()
        {
            $res = $this->inst->Select('idUser, name, email')
						      ->From('b_employees')
							  ->Order('idUser')
							  ->Desc()
							  ->Execute();
			$res = $this->inst->dbResultToArray($res);
            return $res; 
        }
		
		/* returnUser method
			* *
			* *   
			* * @params int: int id param
			* * @return: Retutn assoc array of one user 
			* */
			
		public function returnUser($id)
        {
            $arr['where'] = $id;
			$res = $this->inst->Select('name')
						      ->From('b_employees')
							  ->Where('idUser=')
							  ->Execute($arr);
			$res = $this->inst->dbLineArray($res);
            return $res; 
        }
		
		/* insertDb method
			* *
			* *
			* * @params data: array data with key email, password
			* * @method insertDb:Return count of changes rows
			* */
			
		public function insertDb($data)
        {
			$arr['name'] = $data['name'];
			$arr['email'] = $data['email'];
			$arr['password'] = $data['password'];
			$res = $this->inst->Insert('b_employees')
						      ->Fields($arr)
							  ->Values($arr)
							  ->Execute();
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
			$name = $data['name'];
			$email = $data['email'];
			$arr['where'] = $data['idUser'];
			$res = $this->inst->Update('b_employees')
						      ->Set("name='" . $name . "', email='" . $email . "'")
							  ->Where('idUser=')
							  ->Execute($arr);
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
			$arr['where'] = $idUser;
            $res = $this->inst->Delete()
						      ->From('b_employees')
							  ->Where('idUser=')
							  ->Limit(1)
							  ->Execute($arr);
			$arr['and'] = date('Y-m-d');
			$res = $this->inst->Delete()
						      ->From('b_events')
							  ->Where('idUser=')
							  ->I('date>=')
							  ->Execute($arr);
            return $res; 
        }
	}

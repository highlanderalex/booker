<?php

    require_once (dirname(__FILE__).'/../models/RoomModel.php');
	
   /* Class AuthorController for AuthorModel.
       * *
       * *
       * * @method construct: Create object model
       * * @method getAuthors: The return assoc array of authors or empty array
       * */

    class RoomController  
	{
		private $model;
		
		public function __construct()
		{
			$this->model = new RoomModel();
		}
        
        /* getAuthors method
            * *
            * *
            * * @param: no params
            * * @return: Retutn assoc array of authors or empty
            * */

        public function getRooms()
        {
            $res = $this->model->returnRooms();
            return $res;
        }

        public function checkId($id)
        {
            $res = $this->model->checkIdRoom($id);
            return $res;
        }
        
        public function getDefaultRoom()
        {
            $res = $this->model->returnDefaultRoom();
            return $res;
        }
        
        public function getRoom($id)
        {
            $res = $this->model->returnRoom($id);
            return $res;
        }
		
	}

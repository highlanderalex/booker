<?php

    require_once (dirname(__FILE__).'/../models/RoomModel.php');
	
   /* Class RoomController for RoomModel
       * *
       * *
       * * @method construct: Create object model
       * * @method getRooms: The return assoc array of Rooms
	   * * @method checkId: Retutn int value 1 or 0
	   * * @method getDefaultRoom: Retutn assoc array of first room
	   * * @method getRoom: Retutn assoc array of one room
       * */

    class RoomController  
	{
		private $model;
		
		public function __construct()
		{
			$this->model = new RoomModel();
		}
        
        /* getRooms method
            * *
            * *
            * * @param: no params
            * * @return: Retutn assoc array of rooms
            * */

        public function getRooms()
        {
            $res = $this->model->returnRooms();
            return $res;
        }
		
		/* checkId method
            * *
            * *
            * * @param: int id params
            * * @return: Retutn int value 1 or 0
            * */
			
        public function checkId($id)
        {
            $res = $this->model->checkIdRoom($id);
            return $res;
        }
        
		/* getDefaultRoom method
            * *
            * *
            * * @param: no params
            * * @return: Retutn assoc array of first room
            * */
			
        public function getDefaultRoom()
        {
            $res = $this->model->returnDefaultRoom();
            return $res;
        }
        
		/* getRoom method
            * *
            * *
            * * @param int: int id params
            * * @return: Retutn assoc array of one room
            * */
			
        public function getRoom($id)
        {
            $res = $this->model->returnRoom($id);
            return $res;
        }
	}

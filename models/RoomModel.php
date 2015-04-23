<?php

    require_once ('DB.php');

   /* Class RoomModel
       * *
       * *
       * * @method construct: Create object model
       * * @method returnRooms: The return assoc array of Rooms
	   * * @method checkIdRoom: Retutn int value 1 or 0
	   * * @method returnDefaultRoom: Retutn assoc array of first room
	   * * @method returnRoom: Retutn assoc array of one room
       * */

    class RoomModel 
	{
		private $inst;
		
		public function __construct()
		{
			$this->inst = DB::run();
        }

        /* returnRooms method
            * *
            * *
            * * @param: no params
            * * @return: Retutn assoc array of rooms
            * */

		public function returnRooms()
        {
            $res = $this->inst->Select('idRoom, name')
						      ->From('b_rooms')
							  ->Execute();
			$res = $this->inst->dbResultToArray($res);
            return $res; 
        }
        
		/* returnDefaultRoom method
            * *
            * *
            * * @param: no params
            * * @return: Retutn assoc array of first room
            * */
			
        public function returnDefaultRoom()
        {
            $res = $this->inst->Select('idRoom, name')
                              ->From('b_rooms')
                              ->Order('idRoom')
                              ->Asc()
                              ->Limit(1)
							  ->Execute();
			$res = $this->inst->dbLineArray($res);
            return $res; 
        }
        
		/* returnRoom method
            * *
            * *
            * * @param int: int id params
            * * @return: Retutn assoc array of one room
            * */
			
        public function returnRoom($id)
        {
            $arr['where'] = $id;
            $res = $this->inst->Select('idRoom, name')
                              ->From('b_rooms')
                              ->Where('idRoom=')
							  ->Execute($arr);
			$res = $this->inst->dbLineArray($res);
            return $res; 
        }
		
		/* checkIdRoom method
            * *
            * *
            * * @param: int id params
            * * @return: Retutn int value 1 or 0
            * */
			
        public function checkIdRoom($id)
        {
            $arr['where'] = $id;
            $res = $this->inst->Select('idRoom')
                              ->From('b_rooms')
                              ->Where('idRoom=')
							  ->Execute($arr);
			$res = $this->inst->dbCount($res);
            return $res; 
        }
	}

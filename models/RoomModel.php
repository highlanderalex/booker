<?php

    require_once ('DB.php');

   /* Class AuthorModel for table of authors.
       * *
       * *
       * * @method construct: Create connection database
       * * @method returnAuthors: The return assoc array of authors or empty array
       * */

    class RoomModel 
	{
		private $inst;
		
		public function __construct()
		{
			$this->inst = DB::run();
        }

        /* returnAuthors method
            * *
            * *
            * * @param: no params
            * * @return: Retutn assoc array of authors or empty
            * */

		public function returnRooms()
        {
            $res = $this->inst->Select('idRoom, name')
						      ->From('b_rooms')
							  ->Execute();
			$res = $this->inst->dbResultToArray($res);
            return $res; 
        }
        
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

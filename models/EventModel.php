<?php

	require_once ('DB.php');
    
    /* Class EventModel
        * *
        * *
        * * @method construct: Create object model
        * * @method insertNewEvent: Return count of change rows
		* * @method returnEvents: Return assoc array of events by room
		* * @method returnEventsByDate: Return assoc array of events by room and date
		* * @method returnEvent: Return assoc array of event by id
		* * @method returnEventsByDateRoom: Return assoc array of events by room and date
		* * @method returnRecEventsByDate: Return assoc array of rec events
		* * @method returnRecEvents: Return assoc array of rec events
		* * @method updateNewEvent: Return count of change rows
		* * @method updateEvent: Return count of change rows
		* * @method updateRecEvents: Return count of change rows
		* * @method deleteEvent: Return count of change rows
		* * @method returnLastId: Return int last id
        * */

    class EventModel 
	{
		private $inst;
		
		public function __construct()
		{
			$this->inst = DB::run();
		}
      
		/* returnEvents method
			* *
			* *
			* * @params int: value int idRoom
			* * @return: Return assoc array of events by room
			* */

		public function returnEvents($idRoom)
        {
			$arr['where'] = $idRoom;
            $res = $this->inst->Select('*')
						      ->From('b_events')
							  ->Where('idRoom=')
							  ->Order('startTime')
							  ->Asc()
							  ->Execute($arr);
			$res = $this->inst->dbResultToArray($res);
            return $res; 
        }
		
		/* returnEventsByDate method
			* *
			* *
			* * @params string, int: value string date, int idRoom
			* * @return: Return assoc array of events
			* */
			
		public function returnEventsByDate($date, $idRoom)
        {
			$arr['where'] = $date;
			$arr['and'] = $idRoom;
            $res = $this->inst->Select('*')
						      ->From('b_events')
							  ->Where('date=')
							  ->I('idRoom=')
							  ->Execute($arr);
			$res = $this->inst->dbResultToArray($res);
            return $res; 
        }

		/* returnEventsByDateRoom method
			* *
			* *
			* * @params array, int: value array data, int idRoom
			* * @return: Return assoc array of events
			* */
			
		public function returnEventsByDateRoom($date, $idRoom)
        {
			$arr['where'] = $date;
			$arr['and'] = $idRoom;
            $res = $this->inst->Select('*')
						      ->From('b_events')
							  ->Where('date=')
							  ->I('idRoom=')
							  ->Execute($arr);
			$res = $this->inst->dbResultToArray($res);
            return $res;
        } 
        
		/* returnRecEventsByDate method
			* *
			* *
			* * @params array: value array data
			* * @return: Return assoc array of events
			* */
			
        public function returnRecEventsDate($data)
        {
			$arr['where'] = $data['idPar'];
			$arr['and'] = date('Y-m-d', strtotime($data['date']));
            $res = $this->inst->Select('*')
						      ->From('b_events')
							  ->Where('idPar=')
							  ->I('date>=')
							  ->Execute($arr);
			$res = $this->inst->dbResultToArray($res);
            return $res;
        }
        
		/* returnEvent method
			* *
			* *
			* * @params int: value int
			* * @return: Return assoc array of event
			* */
			
        public function returnEvent($id)
        {
			$arr['where'] = $id;
            $res = $this->inst->Select('e.idEvent, e.date, e.startTime, e.endTime, e.title, e.idUser, u.name, e.idPar')
                              ->From('b_events e')
                              ->Left()
							  ->Join('b_employees u')
                              ->On('u.idUser=e.idUser')
							  ->Where('idEvent=')
							  ->Execute($arr);
			$res = $this->inst->dbLineArray($res);
            return $res; 
        }
		
		/* returnRecEvents method
			* *
			* *
			* * @params int: value int idPar
			* * @return: Return assoc array of events
			* */
			
		public function returnRecEvents($idPar)
        {
			$arr['where'] = $idPar;
            $res = $this->inst->Select('idEvent, date, idPar')
                              ->From('b_events')
							  ->Where('idPar=')
							  ->Execute($arr);
			$res = $this->inst->dbResultToArray($res);
            return $res; 
        }
		
		/* returnLastId method
			* *
			* *
			* * @params: No params
			* * @return: Retutn last insert id
			* */

		public function returnLastId()
        {
			$res = $this->inst->lastId();
            return $res; 
        }
		
		/* insertNewEvent method
			* *
			* *
			* * @params array: value array data
			* * @return: Retutn count of change rows
			* */

		public function insertNewEvent($data)
        {
            $arr['idUser'] = $data['idUser'];
            $arr['idRoom'] = $data['idRoom'];
            $arr['title'] = $data['title'];
            $arr['startTime'] = $data['startTime'];
            $arr['endTime'] = $data['endTime'];
            $arr['date'] = $data['date'];
			if (isset($data['idPar']))
			{
				$arr['idPar'] = $data['idPar'];
			}
			$res = $this->inst->Insert('b_events')
						      ->Fields($arr)
							  ->Values($arr)
							  ->Execute();
            return $res;
        }
		
		/* updateNewEvent method
			* *
			* *
			* * @params int: value int id
			* * @return: Return count of change rows
			* */
			
		public function updateNewEvent($id)
        {
            $arr['where'] = $id;
			$res = $this->inst->Update('b_events')
						      ->Set('idPar=' . $id)
							  ->Where('idEvent=')
							  ->Execute($arr);
            return $res;
        }
		
		/* updateEvent method
			* *
			* *
			* * @params array: value array data
			* * @return: Return count of change rows
			* */
			
		public function updateEvent($data)
        {
            $arr['where'] = $data['idEvent'];
            $startTime = $data['startTime'];
            $endTime = $data['endTime'];
            $title = $data['title'];
            $idUser = $data['idUser'];
			$res = $this->inst->Update('b_events')
						      ->Set("startTime='" . $startTime . "', endTime='" . $endTime . "', title='" . $title . "', idUser=" . $idUser)
							  ->Where('idEvent=')
							  ->Execute($arr);
            return $res;
        }
        
		/* updateRecEvents method
			* *
			* *
			* * @params array: value array data
			* * @return: Return count of change rows
			* */
			
        public function updateRecEvents($data)
        {
            $arr['where'] = $data['idPar'];
            $arr['and'] = date('Y-m-d',strtotime($data['date']));
            $startTime = $data['startTime'];
            $endTime = $data['endTime'];
            $title = $data['title'];
            $idUser = $data['idUser'];
			$res = $this->inst->Update('b_events')
						      ->Set("startTime='" . $startTime . "', endTime='" . $endTime . "', title='" . $title . "', idUser=" . $idUser)
                              ->Where('idPar=')
                              ->I('date>=')
                              ->Execute($arr);
        }
		
		/* deleteEvent method
			* *
			* *
			* * @params int: value int id
			* * @return: Return count of change rows
			* */
			
		public function deleteEvent($id)
        {
            $arr['where'] = $id;
			$res = $this->inst->Delete()
						      ->From('b_events')
							  ->Where('idEvent=')
							  ->Limit(1)
							  ->Execute($arr);
            return $res;
        }
    }

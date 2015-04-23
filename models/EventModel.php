<?php

	require_once ('DB.php');
    
    /* Class OrderModel for orders table
        * *
        * *
        * * @method construct: Create database connection
        * * @method returnOrders: Return assoc array of user orders
        * * @method returnLastId: Retutn val of last insert id
        * * @method returninsertOrder: Insert new order into orders
        * */

    class EventModel 
	{
		private $inst;
		
		public function __construct()
		{
			$this->inst = DB::run();
		}
      
    /* returnOrders method
        * *
        * *
        * * @params id: val id user
        * * @return: Retutn assoc array of user orders
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
        
        public function returnEvent($id)
        {
			$arr['where'] = $id;
            $res = $this->inst->Select('e.idEvent, e.date, e.startTime, e.endTime, e.title, e.idUser, u.name, e.idPar')
                              ->From('b_events e')
                              ->Join('b_employees u')
                              ->On('u.idUser=e.idUser')
							  ->Where('idEvent=')
							  ->Execute($arr);
			$res = $this->inst->dbLineArray($res);
            return $res; 
        }
		
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
		
    /* insertOrder method
        * *
        * *
        * * @params $arr: val arr with key idUser id
        * * @return: Return count of changes rows
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
		
		public function updateNewEvent($id)
        {
            $arr['where'] = $id;
			$res = $this->inst->Update('b_events')
						      ->Set('idPar=' . $id)
							  ->Where('idEvent=')
							  ->Execute($arr);
            return $res;
        }

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

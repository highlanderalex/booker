<?php
    
	require_once (dirname(__FILE__).'/../models/EventModel.php');
    
    /* Class EventController for EventModel
        * *
        * *
        * * @method construct: Create object model
        * * @method addNewEvent: Return count of change rows
		* * @method getEvents: Return assoc array of events by room
		* * @method getEventsByDate: Return assoc array of events by room and date
		* * @method getEvent: Return assoc array of event by id
		* * @method getEventsByDateRoom: Return assoc array of events by room and date
		* * @method getRecEventsByDate: Return assoc array of rec events
		* * @method getRecEvents: Return assoc array of rec events
		* * @method updateNewEvent($id): Return count of change rows
		* * @method updateEvent($data): Return count of change rows
		* * @method updateRecEvents($data): Return count of change rows
		* * @method removeEvent($id): Return count of change rows
		* * @method getLastId(): Return int last id
        * */

    class EventController 
	{
		private $model;
		
		public function __construct()
		{
			$this->model = new EventModel();
		}
		
		/* addNewEvent method
			* *
			* *
			* * @params array: value array data
			* * @return: Retutn count of change rows
			* */
			
        public function addNewEvent($data)
        {
            $res = $this->model->insertNewEvent($data);
            return $res;
        }

		/* getEvents method
			* *
			* *
			* * @params int: value int idRoom
			* * @return: Return assoc array of events by room
			* */
			
		public function getEvents($idRoom)
        {
            $res = $this->model->returnEvents($idRoom);
            return $res;
        }
		
		/* getEventsByDate method
			* *
			* *
			* * @params string, int: value string date, int idRoom
			* * @return: Return assoc array of events
			* */
			
		public function getEventsByDate($date, $idRoom)
		{
			$res = $this->model->returnEventsByDate($date, $idRoom);
            return $res;
		}
        
		/* getEvent method
			* *
			* *
			* * @params int: value int
			* * @return: Return assoc array of event
			* */
			
        public function getEvent($id)
        {
            $res = $this->model->returnEvent($id);
            return $res;
        }
        
		/* getEventsByDateRoom method
			* *
			* *
			* * @params array, int: value array data, int idRoom
			* * @return: Return assoc array of events
			* */
			
        public function getEventsByDateRoom($data, $idRoom)
        {
            $res = $this->model->returnEventsByDateRoom($data, $idRoom);
            return $res;
        }
        
		/* getRecEventsByDate method
			* *
			* *
			* * @params array: value array data
			* * @return: Return assoc array of events
			* */
			
        public function getRecEventsByDate($data)
        {
            $res = $this->model->returnRecEventsDate($data);
            return $res;
        }
		
		/* getRecEvents method
			* *
			* *
			* * @params int: value int idPar
			* * @return: Return assoc array of events
			* */
			
		public function getRecEvents($idPar)
        {
            $res = $this->model->returnRecEvents($idPar);
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
            $res = $this->model->updateNewEvent($id);
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
            $res = $this->model->updateEvent($data);
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
            $res = $this->model->updateRecEvents($data);
            return $res;
        }
		
		/* removeEvent method
			* *
			* *
			* * @params int: value int id
			* * @return: Return count of change rows
			* */
			
		public function removeEvent($id)
        {
            $res = $this->model->deleteEvent($id);
            return $res;
        }
		
		/* getLastId method
			* *
			* *
			* * @params: no param
			* * @return: Return int last id
			* */
			
		public function getLastId()
        {
            $res = $this->model->returnLastId();
            return $res;
        }
    }


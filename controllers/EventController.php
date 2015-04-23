<?php
    
	require_once (dirname(__FILE__).'/../models/EventModel.php');
    
    /* Class PurchaseController for PurchaseModel
        * *
        * *
        * * @method construct: Create object model
        * * @method getPurchases: Return assoc array of purchases or empty
        * * @method addPurchases: Return count of change rows
        * */

    class EventController 
	{
		private $model;
		
		public function __construct()
		{
			$this->model = new EventModel();
		}
		
    /* addPurchases method
        * *
        * *
        * * @params lastId, idProduct, qty, price: val lastId, idProduct, qty, price  
        * * @method insertPurchases: Return count of change rows
        * */

		public function addPurchases($lastId, $idProduct, $qty, $price)
        {
            $res = $this->model->insertPurchases($lastId, $idProduct, $qty, $price);
            return $res;
        }

        public function addNewEvent($data)
        {
            $res = $this->model->insertNewEvent($data);
            return $res;
        }
		
    /* getPurchases method
        * *
        * *
        * * @params id: params of id order
        * * @return: Retutn assoc array of purchases or empty
        * */

		public function getEvents($idRoom)
        {
            $res = $this->model->returnEvents($idRoom);
            return $res;
        }
		
		public function getEventsByDate($date, $idRoom)
		{
			$res = $this->model->returnEventsByDate($date, $idRoom);
            return $res;
		}
        
        public function getEvent($id)
        {
            $res = $this->model->returnEvent($id);
            return $res;
        }
        
        public function getEventsByDateRoom($data, $idRoom)
        {
            $res = $this->model->returnEventsByDateRoom($data, $idRoom);
            return $res;
        }
        
        public function getRecEventsByDate($data)
        {
            $res = $this->model->returnRecEventsDate($data);
            return $res;
        }
		
		public function getRecEvents($idPar)
        {
            $res = $this->model->returnRecEvents($idPar);
            return $res;
        }
		
		public function updateNewEvent($id)
        {
            $res = $this->model->updateNewEvent($id);
            return $res;
        }
        
        public function updateEvent($data)
        {
            $res = $this->model->updateEvent($data);
            return $res;
        }
        
        public function updateRecEvents($data)
        {
            $res = $this->model->updateRecEvents($data);
            return $res;
        }
		
		public function removeEvent($id)
        {
            $res = $this->model->deleteEvent($id);
            return $res;
        }
		
		public function getLastId()
        {
            $res = $this->model->returnLastId();
            return $res;
        }
    }


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
        
        public function getEvent($id)
        {
            $res = $this->model->returnEvent($id);
            return $res;
        }
    }


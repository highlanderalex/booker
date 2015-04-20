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

		public function insertOrder($arr)
        {
			$res = $this->inst->Insert('orders')
						      ->Fields($arr)
							  ->Values($arr)
							  ->Execute();
            return $res;
        }
    }

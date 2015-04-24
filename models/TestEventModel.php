<?php
    include 'EventModel.php';
    include (dirname(__FILE__)) . '/../config/config.php';
    
    class TestEventModel extends PHPUnit_Framework_TestCase
    {
        public function testreturnEvents()
        {
            $events = new EventModel();
            $idRoom = 1;
            $this->assertTrue(is_array($events->returnEvents($idRoom)));
        }
        
        public function testreturnEventsByDate()
        {
            $events = new EventModel();
            $date = '2015-04-30';
            $idRoom = 1;
            $this->assertTrue(is_array($events->returnEventsByDate($date, $idRoom)) 
                                            || empty($events->returnEventsByDate($date, $idRoom)));
        }


        public function testreturnRecEventsDate()
        {
            $events = new EventModel(); 
			date_default_timezone_set(TIMEZONE);
            $data['date'] = '2015-04-30';
            $data['idPar'] = 10;
            $this->assertTrue(is_array($events->returnRecEventsDate($data)) 
                                        || empty($events->returnRecEventsDate($data)));
        }
        
        public function testreturnEvent()
        {
            $event = new EventModel();
            $id = 10;
            $this->assertTrue(is_array($event->returnEvent($id)) 
                                        || empty($event->returnEvent($id)));
        }

        public function testreturnRecEvents()
        {
            $event = new EventModel();
            $idPar = 10;
            $this->assertTrue(is_array($event->returnRecEvents($idPar)) 
                                         || empty($event->returnRecEvents($idPar)));
        }
        
        public function testinsertNewEvent()
        {
            $event = new EventModel();
            $data['idUser'] = 13;
            $data['idRoom'] = 1;
            $data['title'] = 'New test event';
            $data['startTime'] = '09:30';
            $data['endTime'] = '10:00';
            $data['date'] = '2014-04-30';
            $data['idPar'] = 10;
            $this->assertTrue($event->insertNewEvent($data) > 0);
        }
        
               
        public function testupdateNewEvent()
        {
            $event = new EventModel();
            $id = 10;
            $this->assertTrue($event->updateNewEvent($id) > 0); 
                                            
        }
         
        public function testupdateEvent()
        {
            $event = new EventModel();
            $data['idUser'] = 13;
            $data['idRoom'] = 1;
            $data['title'] = 'New test event';
            $data['startTime'] = '09:30';
            $data['endTime'] = '10:00';
            $data['date'] = '2014-04-30';
            $data['idPar'] = 10;
            $this->assertTrue($event->updateEvent($data) > 0);
        }
      
        public function testdeleteEvent()
        {
            $event = new EventModel();
            $id = 18;
            $this->assertTrue($event->deleteEvent($id) > 0  || $event->deleteEvent($id) == 0);
        }          
    }

?>

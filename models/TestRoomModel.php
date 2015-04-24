<?php
    include 'RoomModel.php';
    
    class TestRoomModel extends PHPUnit_Framework_TestCase
    {
        public function testreturnRooms()
        {
            $rooms = new RoomModel();
            $this->assertTrue(array($rooms->returnRooms()) || empty($rooms->retrnRooms()));
        }
        
        public function testreturnDefaultRoom()
        {
            $room = new RoomModel();
            $this->assertFalse(empty($room->returnDefaultRoom())); 
        }
        
        public function testreturnRoom()
        {
            $room = new RoomModel();
            $id = 2;
            $this->assertFalse(empty($room->returnRoom($id))); 
                                            
        }
       
        public function testcheckIdRoom()
        {
            $room = new RoomModel();
            $id = 1;
            $this->assertTrue($room->checkIdRoom($id) == 1);
        }          
    }

?>

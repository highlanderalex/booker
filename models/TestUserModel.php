<?php
    include 'UserModel.php';
    
    class TestUserModel extends PHPUnit_Framework_TestCase
    {
        public function testreturnEmail()
        {
            $user = new UserModel();
            $email = 'alex@mail.ru';
            $this->assertTrue(0==$user->returnEmail($email) 
                                            || 1==$user->returnEmail($email));
        }
        
        public function testreturnAuth()
        {
            $user = new UserModel();
            $data['email']= 'alex@mail.ru';
            $data['password']= 'qwerty';
            $this->assertTrue(0==$user->returnAuth($data) 
                                            || 1==$user->returnAuth($data));
        }
        
        public function testreturnDataUser()
        {
            $user = new UserModel();
            $data['email']= 'alex@mail.ru';
            $data['password']= md5('abcd');
            $this->assertTrue(empty($user->returnDataUser($data))); 
                                            
        }
        
        public function testreturnUsers()
        {
            $users = new UserModel();
            $this->assertFalse(empty($users->returnUsers())); 
        }                 
        
        public function testreturnUser()
        {
            $user = new UserModel();
            $id = 13; 
            $this->assertTrue(is_array($user->returnUser($id))); 
                                            
        }
       
        public function testinsertDb()
        {
            $user = new UserModel();
            $data['name'] = 'qqq';
            $data['email'] = 'qqq@mail.ru';
            $data['password'] = md5('qqq');
            $this->assertTrue($user->insertDb($data) > 0);
        }           
        
        public function testupdateUser()
        {
            $user = new UserModel();
            $data['idUser'] = 17;
            $data['name'] = 'gggg';
            $data['email'] = 'gggg@mail.ru';
            $this->assertTrue($user->updateUser($data) == 1);
        }          
        
        public function testdeleteUser()
        {
            $user = new UserModel();
            $id =17;
            $this->assertTrue($user->deleteUser($id) == 1);
        }          
    }

?>

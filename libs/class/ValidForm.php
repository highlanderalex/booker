<?php

    /* Class ValidForm for validation forms
        * *
        * *
        * * @method construct: Load data from POST
        * * @method validData: Return str if novalidate or array
        * */

    class ValidForm 
    {
        private $error;
        private $arr;

        public function __construct($form)
        {
            $this->error = '';
            $this->arr = $form;
        }
        
        public function validData()
	    {	
		
		    foreach($this->arr as $key => $val)
            {
                if ( 'name' == $key )
                {
                    $val = trim(htmlspecialchars($val));
                    if (empty($val))
                    {
			            $this->error .= "Empty name<br />"; 
                    }
                    else
                    {
	            	    if ( !preg_match("/^\s*[а-яА-Яa-zA-Z-.'\s]+\s*$/u",$val) || strlen($val) < 2 ) 
		                {
			                $this->error .= "Correct name<br />";
		                } 
                    }  
                }
                if ( 'email' == $key )
                {
                    $val = trim($val);
                    if (empty($val))
                    {
			            $this->error .= "Empty email<br />"; 
                    }
                    else
                    {
		                if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/",$val)) 
	            	    {
			                $this->error .= "Correct email<br />";
		                }
                    }  
                }
                if ( 'password' == $key )
                {
                    $val = trim(($val));
                    if (empty($val))
                    {
			            $this->error .= "Empty password<br />"; 
                    }
                    else
                    {
	            	    if (  strlen($val) < 3 ) 
		                {
			                $this->error .= "Password must be 3-15 chars<br />";
		                } 
                    }
                }  
            }
            
            if ($this->error == '')
		    {
			   //$this->arr['password'] = md5($this->arr['password']);
			    return $this->arr;
		    }
		    else
	    	{
			    return $this->error;
	    	}

        }
    }


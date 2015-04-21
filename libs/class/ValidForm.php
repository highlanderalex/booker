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
                
                if ( 'title' == $key )
                {
                    $val = trim(htmlspecialchars($val));
                    if (empty($val))
                    {
                        $this->error .= "Empty notes<br />";
                    }  
                }
            }
            if (isset($this->arr['rec']))
            {
                if (($this->arr['rec'] == '0' && $this->arr['num'] != '') ||
                    ($this->arr['rec'] == '1' && $this->arr['num'] == '') ||
                    ($this->arr['rec'] == '2' && ($this->arr['num'] == '' || $this->arr['num'] > 2)) || 
                    ($this->arr['rec'] == '3' && $this->arr['num'] != 1))
                {
                    $this->error .= "Error duration<br />";
                }
            }
            if (isset($this->arr['date']))
            {
                $this->arr['date'] = strtotime($this->arr['date']);
                $this->arr['date'] = date('Y-m-d', $this->arr['date']);
                if ($this->arr['date'] < date('Y-m-d') || 
                    date('w', strtotime($this->arr['date'])) == 0 ||
                    date('w', strtotime($this->arr['date'])) == 6)
                {
                    $this->error .= "Error date<br />";
                }
            }

            if (isset($this->arr['startHour']) && isset($this->arr['startMin']))
            {
                $this->arr['startTime'] = $this->arr['startHour'] . ':' . $this->arr['startMin'];
                $this->arr['endTime'] = $this->arr['endHour'] . ':' . $this->arr['endMin'];
                //echo date('g:i', strtotime($this->arr['startTime']));  
                //echo date('g:i', strtotime($this->arr['endTime']));  
                if (strtotime($this->arr['startTime']) >= strtotime($this->arr['endTime']))
                {
                    $this->error .= "Error time<br />";
                }
            }

            
            if ($this->error == '')
		    {
			    return $this->arr;
		    }
		    else
	    	{
			    return $this->error;
	    	}

        }
    }


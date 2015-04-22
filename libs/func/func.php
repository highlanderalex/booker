<?php
		function __autoload($class)
		{
			if (file_exists(dirname(__FILE__) . '/../../controllers/'.$class.'.php') ) 
			{
				require_once (dirname(__FILE__) . '/../../controllers/'.$class.'.php');
			}
			
			if (file_exists(dirname(__FILE__) . '/../class/'.$class.'.php') ) 
			{
				require_once (dirname(__FILE__) . '/../class/'.$class.'.php');
			}
			
			if (file_exists(dirname(__FILE__) . '/../../views/'.$class.'.php') ) 
			{
				require_once (dirname(__FILE__) . '/../../views/'.$class.'.php');
			}
		}
	
		function redirect($view)
		{
			header('Location: index.php?view=' . $view);
		}
		
		function checkId($id)
		{
			if( preg_match("/^[0-9]+$/",$id) && $id > 0 )
			{
				return true;
			}
			else
			{
				return false;
			}
			
		}
	
		function setLangSession()
		{
			$_SESSION['lang'] = ($_SESSION['lang']) ? $_SESSION['lang'] : 'ru';
			if (isset($_POST['change_lang']))
			{
				$_SESSION['lang'] = $_POST['lang'];
			}
		}
		
		function sessionDestroy()
		{
			unset($_SESSION['id']);
			unset($_SESSION['user']);
			unset($_SESSION['total_items']);
			unset($_SESSION['total_price']);
		}
		
		function drawCalendar($month,$year, $type, $arr)
		{
			$calendar = '<div style="width:800px;margin:0 auto;"><table cellpadding="0" cellspacing="0" class="calendar">';
			if ($type)
			{
				$headEn = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday', 'Sunday');
				$headRu = array('Пон','Вт','Ср','Чт','Пят','Суб', 'Вс');
				$running_day = date('w',mktime(0,0,0,$month,1,$year));
				if($running_day == 0)
				{
					$running_day = 6;
				}
				else 
				{
					$running_day = $running_day - 1;
				}
			}
			else
			{
				$headEn = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
				$headRu = array('Вс', 'Пон','Вт','Ср','Чт','Пят','Суб');
				$running_day = date('w',mktime(0,0,0,$month,1,$year));
			}
			if($_SESSION['lang'] == 'ru')
			{
				$headings = $headRu;
			}
			else
			{
				$headings = $headEn;
			}
			$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
			$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
			$days_in_this_week = 1;
			$day_counter = 0;
			$dates_array = array();

			$calendar.= '<tr class="calendar-row">';

			for( $x = 0; $x < $running_day; $x++)
			{
				$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
				$days_in_this_week++;
			}

			for($list_day = 1; $list_day <= $days_in_month; $list_day++)
			{
				$calendar.= '<td class="calendar-day" valign="top">';
                $calendar.= '<div class="day-number">'.$list_day.'</div>';
                foreach($arr as $item)
                {
                    $curr = date('Y-m-d', mktime(0, 0, 0 , $month, $list_day, $year));
                    if($item['date'] == $curr)
                    {
                        $calendar.= '<a href="javascript://" onclick="_open( \'index.php?view=updateevent&id=' . 
						$item['idEvent'] . '\', 500 , 300 );" style="color:#062134" title="' . $item['title'] . '">' . 
						substr($item['startTime'], 0, -3) . '-' . substr($item['endTime'], 0, -3) . '</a><br />';
                    }
                }
 				$calendar.= str_repeat('<p>&nbsp;</p>',2);
				$calendar.= '</td>';
				if( $running_day == 6 )
				{
					$calendar.= '</tr>';
					if(($day_counter+1) != $days_in_month)
					{
						$calendar.= '<tr class="calendar-row">';
					}
					$running_day = -1;
					$days_in_this_week = 0;
				}
				$days_in_this_week++; $running_day++; $day_counter++;
			}

			if($days_in_this_week < 8 && $days_in_this_week != 1)
			{
				for($x = 1; $x <= (8 - $days_in_this_week); $x++)
				{
					$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
				}
			}
			$calendar.= '</tr>';
			$calendar.= '</table></div>';
			return $calendar;
		}
		
		function checkStatusUser()
		{
			if( 1 == $_SESSION['statusUser'] )
			{
				return;
			}
			else
			{
				redirect('404');
			}
		}
		
		function hashPass($pass)
		{
			return md5($pass);
		}
		
		function setParamSession()
		{
			if ($_POST['mon'])
			{
				$_SESSION['type_week'] = $_POST['type_week']; 
			}
			if ($_POST['sun'])
			{
				$_SESSION['type_week'] = $_POST['type_week']; 
			}
			if (!isset($_SESSION['type_week']))
			{
				$_SESSION['type_week'] = 0; 
			}
			if (!isset($_SESSION['month']) && !isset($_SESSION['year']))
			{
				$_SESSION['month'] = date('n'); 
				$_SESSION['year'] = date('y'); 
			}

			if ($_POST['prev'])
			{
				if($_SESSION['month'] == 1)
				{
					$_SESSION['month'] = 12;
					$_SESSION['year'] -= 1;   
				}
				else
				{
				   $_SESSION['month'] -= 1;
				} 
			}
			if ($_POST['next'])
			{
				if($_SESSION['month'] == 12)
				{
					$_SESSION['month'] = 1;
					$_SESSION['year'] += 1;    
				}
				else
				{
					$_SESSION['month'] += 1;
				} 
            }
			if ($_SESSION['lang'] == 'ru')
			{
				$rumonth = array('1' => 'Январь', 
								 '2' => 'Февраль',
								 '3' => 'Март',
								 '4' => 'Апрель',
								 '5' => 'Май',
								 '6' => 'Июнь', 
								 '7' => 'Июль',
								 '8' => 'Август',
								 '9' => 'Сентябрь',
								 '10' => 'Октябрь',
								 '11' => 'Ноябрь',
								 '12' => 'Декабрь');
				$_SESSION['namemonth'] = $rumonth[$_SESSION['month']];
			}
			else
			{
				$_SESSION['namemonth'] = date('F', mktime(0,0,0, $_SESSION['month']));
			}
			$_SESSION['fullyear'] = date('Y', mktime(0,0,0, $_SESSION['month'], 1, $_SESSION['year']));
		}
	
	
	
	
	

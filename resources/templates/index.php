<?php

echo '
<style>
/* calendar */
table.calendar    { border-left:1px solid #999; }
tr.calendar-row  {  }
td.calendar-day  { min-height:80px; font-size:11px; position:relative; } * html div.calendar-day { height:80px; }
td.calendar-day:hover  { background:#eceff5; }
td.calendar-day-np  { background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
td.calendar-day-head { background:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
div.day-number    { background:#062134; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
/* shared */
td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
</style>
';

/* Функция генерации календаря */
function draw_calendar($month,$year){

  /* Начало таблицы */
  $calendar = '<div style="width:800px;margin:0 auto;"><table cellpadding="0" cellspacing="0" class="calendar">';

  /* Заглавия в таблице */
  $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
  $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

  /* необходимые переменные дней и недель... */
  $running_day = date('w',mktime(0,0,0,$month,1,$year));
  $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
  $days_in_this_week = 1;
  $day_counter = 0;
  $dates_array = array();

  /* первая строка календаря */
  $calendar.= '<tr class="calendar-row">';

  /* вывод пустых ячеек в сетке календаря */
  for($x = 0; $x < $running_day; $x++):
    $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    $days_in_this_week++;
  endfor;

  /* дошли до чисел, будем их писать в первую строку */
  for($list_day = 1; $list_day <= $days_in_month; $list_day++):
    $calendar.= '<td class="calendar-day">';
      /* Пишем номер в ячейку */
      $calendar.= '<div class="day-number">'.$list_day.'</div>';
	  //$calendar.= '<a href="#" style="color:#062134">10.30-18.00</a>' . '<br /><a href="#" style="color:#062134">10.30-18.00</a>';
      /** ЗДЕСЬ МОЖНО СДЕЛАТЬ MySQL ЗАПРОС К БАЗЕ ДАННЫХ! ЕСЛИ НАЙДЕНО СОВПАДЕНИЕ ДАТЫ СОБЫТИЯ С ТЕКУЩЕЙ - ВЫВОДИМ! **/
      $calendar.= str_repeat('<p>&nbsp;</p>',2);
      
    $calendar.= '</td>';
    if($running_day == 6):
      $calendar.= '</tr>';
      if(($day_counter+1) != $days_in_month):
        $calendar.= '<tr class="calendar-row">';
      endif;
      $running_day = -1;
      $days_in_this_week = 0;
    endif;
    $days_in_this_week++; $running_day++; $day_counter++;
  endfor;

  /* Выводим пустые ячейки в конце последней недели */
  if($days_in_this_week < 8):
    for($x = 1; $x <= (8 - $days_in_this_week); $x++):
      $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    endfor;
  endif;

  /* Закрываем последнюю строку */
  $calendar.= '</tr>';

  /* Закрываем таблицу */
  $calendar.= '</table></div>';
  
  /* Все сделано, возвращаем результат */
  return $calendar;
}

/* СПОСОБ ПРИМЕНЕНИЯ */
echo '<div style="width:200px;margin:0 auto;"><h2>' . date('M - Y') . '</h2></div>';
echo draw_calendar(date('m'),date('y'));

?>
<div style="width:200px;margin:0 auto; margin-top:20px;margin-bottom:50px;">
<p><a href="index.php?view=addEvent" style="color:#062134;font-size:1.5em;border:1px solid #062134;text-decoration:none">BookIt</a>&nbsp;&nbsp;&nbsp;
<a href="index.php?view=adminPanel" style="color:#062134;font-size:1.5em;border:1px solid #062134;text-decoration:none">ListEmployee</a></p>
</div>

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
div.day-number    { background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
/* shared */
td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
</style>
';

/* ������� ��������� ��������� */
function draw_calendar($month,$year){

  /* ������ ������� */
  $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

  /* �������� � ������� */
  $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
  $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

  /* ����������� ���������� ���� � ������... */
  $running_day = date('w',mktime(0,0,0,$month,1,$year));
  $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
  $days_in_this_week = 1;
  $day_counter = 0;
  $dates_array = array();

  /* ������ ������ ��������� */
  $calendar.= '<tr class="calendar-row">';

  /* ����� ������ ����� � ����� ��������� */
  for($x = 0; $x < $running_day; $x++):
    $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    $days_in_this_week++;
  endfor;

  /* ����� �� �����, ����� �� ������ � ������ ������ */
  for($list_day = 1; $list_day <= $days_in_month; $list_day++):
    $calendar.= '<td class="calendar-day">';
      /* ����� ����� � ������ */
      $calendar.= '<div class="day-number">'.$list_day.'</div>';

      /** ����� ����� ������� MySQL ������ � ���� ������! ���� ������� ���������� ���� ������� � ������� - �������! **/
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

  /* ������� ������ ������ � ����� ��������� ������ */
  if($days_in_this_week < 8):
    for($x = 1; $x <= (8 - $days_in_this_week); $x++):
      $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    endfor;
  endif;

  /* ��������� ��������� ������ */
  $calendar.= '</tr>';

  /* ��������� ������� */
  $calendar.= '</table>';
  
  /* ��� �������, ���������� ��������� */
  return $calendar;
}

/* ������ ���������� */
echo '<h2>June 2012</h2>';
echo draw_calendar(6,2012);

?>
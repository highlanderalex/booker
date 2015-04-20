<?php
	class View 
	{
		public function __construct() 
		{
		
		}
	   
	   public function render($name) 
	   {
			$view = $name;
			if ($view == 'updateevent' || $view == 'addevent')
			{
				require_once ('resources/templates/template.php');
			}
			else
			{
				require_once ('resources/templates/main.php');
			}
	   }
	  
	}
?>
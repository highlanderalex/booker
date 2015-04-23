<?php
	/* Class View
       * *
       * *
       * * @method construct: empty
       * * @method render: Include base template
       * */
	   
	class View 
	{
		public function __construct() 
		{
		
		}
		
		/* render method
            * *
            * *
            * * @param string: param string name of template
            * * @return: Return void
            * */
			
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
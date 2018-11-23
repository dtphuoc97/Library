<?php 
	require_once('delllogparser.php');
	require_once('hplogparser.php');

	class  Logparser
	{
		private $Dell;
		private $HP;
		
		function __construct()
		{
			$this->Dell = new DellLogParser;
			$this->HP = new HPLogParser;
		}
		public function parseFaillureLog($file,$type)
		{
			switch ($type) 
			{
				case 'dell':
				{
					$output = $this->Dell->parseFailureLog($file);
					break;

				}
				case 'hp':
				{
					$output = $this->HP->parseFailureLog($file);
					break;
				}
				default:
					break;
			}
			return $output;
		}

		public function parseEventLog($file,$type)
		{
			switch ($type) 
			{
				case 'dell':
				{
					$output = $this->Dell->parseEventLog($file);
					break;
				}
				case 'hp':
				{
					$output = $this->HP->parseEventLog($file);
					break;
				}
				default:
					break;
			}
			return $output;
		}
	}
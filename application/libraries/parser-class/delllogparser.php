<?php
require_once('xmlparser.php');
require_once('csvparser.php');
require_once('plaintextparser.php');

class DellLogParser
	{
		private $xmlParser;
		private $csvParser;
		private $plaintextParser;
		function __construct()
		{
			$this->xmlParser = new XmlParser();
			$this->csvParser = new CsvParser();
			$this->plaintextParser = new PlaintextParser();
		}

		public function parseEventLog($file='')
		{
			$ext = pathinfo($file, PATHINFO_EXTENSION);
			switch($ext)
			{
				case 'xml'://xml file
				{
					$this->xmlParser->setFile($file);
					$output = $this->xmlParser->exportArrayOutput();
					break;
				}
				default:// no-extension file
				{
					$this->plaintextParser->setFile($file);
					$output = $this->plaintextParser->exportArrayOutput();
					break;
				}
			}
			if (!$output) 
			{
				return false;
			}

			return $output;
		}
		public function parseFailureLog($file='')
		{
			$this->csvParser->setFile($file);
			$output = $this->csvParser->exportArrayOutput();

			if (!$output) {
				return false;
			}
			$result = array();
			//key for combine
			$key_array = array("Severity","Date","Description" );
			for ($i=0; $i < count($output); $i++) { 
				//value for combine
				$value_array = $output[$i];
				$new_row_array=array_combine($key_array,$value_array);
				array_push($result, $new_row_array); //push to result
			}
			return $result;
		}
		
	}
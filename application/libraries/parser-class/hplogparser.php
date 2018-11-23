<?php
require_once('xmlparser.php');
require_once('csvparser.php');

class HPLogParser
	{
		private $xmlParser;
		private $csvParser;
		function __construct()
		{
			$this->xmlParser = new XmlParser();
			$this->csvParser = new CsvParser();
		}

		public function parseEventLog($file='')
		{
			//get data
			$this->csvParser->setFile($file);
			$output = $this->csvParser->exportArrayOutput();

			if (!$output) {
				return false;
			}
			//result
			$result = array();
			//key for combine
			$key_array = $output[0]; 
			array_pop($key_array);
			for ($i=1; $i < count($output); $i++) { 
				//value for combine
				$value_array = $output[$i];
				array_pop($value_array);
				$new_row_array=array_combine($key_array,$value_array);
				array_push($result, $new_row_array); //push to result
			}
			return $result;
			
		}
		public function parseFailureLog($file='')
		{
			$this->csvParser->setFile($file);
			$output = $this->csvParser->exportArrayOutput($file);

			if (!$output) {
				return false;
			}
			//result
			$result = array();

			//key for combine
			$key_array = $output[0]; 
			array_pop($key_array);
			for ($i=1; $i < count($output); $i++) { 
				//value for combine
				$value_array = $output[$i];
				array_pop($value_array);
				$new_row_array=array_combine($key_array,$value_array);
				array_push($result, $new_row_array); //push to result
			}
			return $result;
		}
		
	}
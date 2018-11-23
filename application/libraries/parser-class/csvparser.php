<?php
require_once('parser.php');
class CsvParser extends Parser
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function checkFile()
		{
			if (file_exists($this->file) && pathinfo($this->file, PATHINFO_EXTENSION) == 'csv') 
				return true;
			// kiem tra ton tai va dinh dang file
			return false;
		}

		public function doParser()
		{
			$file = fopen($this->file,"r");
			$arr = array();
			while(! feof($file))
			{
				$onerow = fgetcsv($file);
				if (!is_array($onerow)) {
					break;
				}
				//lay tung dong gia tri file csv
				array_push($arr, $onerow);
				//them vao ket qua
			}
			return $arr;
		}
	}
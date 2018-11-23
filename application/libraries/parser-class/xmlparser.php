<?php
require_once('parser.php');
class XmlParser extends Parser
	{		
		function __construct()
		{
			parent::__construct();
		}

		public function checkFile()
		{
			if (file_exists($this->file) && pathinfo($this->file, PATHINFO_EXTENSION)=='xml') 
				return true;
			//kiem tra ton tai va dinh dang file
			return false;
		}
		public function doParser()
		{
			$xml=json_decode(json_encode(simplexml_load_file($this->file)),true);
			//chuyen stdClass object -> array
			return $xml['Event'];//lay phan noi dung chinh
			//doc file xml
		}
	}
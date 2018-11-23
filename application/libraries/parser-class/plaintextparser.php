<?php 
require_once('parser.php');

class PlaintextParser extends Parser
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function checkFile($file='')
	{
		if (file_exists($file)) 
			return true;
		//kiem tra ton tai va dinh dang file
		return false;
	}
	public function doParser($file='')
	{
		$noext=fopen($file, "r");//mo file no-extension
		if ($noext) 
		{
			//lay header
			for ($i = 0; $i < 2; $i++) 
			{
				$buffer = fgets($noext, 4096);
			}

			$result = array();		// Mang ket qua
			$one_log = array();		// 1 log

			while (!feof($noext)) 
			{
			    $buffer = fgets($noext, 4096);
			    if (strpos($buffer, "-----") > -1) 
			    {
			    	array_push($result, $this->convertLog($one_log));
			    	$one_log = array();		 //reset one_log
			    }
			    else 
			    {
			    	$one_log[] = $buffer;
			    }
			}
			return $result;
		}
		return false;
	}
	//------------------------------
	private function convertLogToRawResult(array $strLog)
	{
		if (!is_array($strLog)) {
			return array();
		}
		$result = array();		//Ket qua tra ve
		foreach ($strLog as $element) 
		{
			//lay key and value
			$split_pos = strpos($element, '=');
			$key = substr($element, 0, $split_pos - 1);
			$value = substr($element, $split_pos + 2);	//Cat tu vi tri sau dau '= '

			$key = trim($key);
			$value = trim($value);

			$result[$key] = $value;
		}
		return $result;
	}
	private function convertLog(array $oneLog)
	{
		if (!is_array($oneLog)) {
			return array();
		}
		
		$raw_result = $this->convertLogToRawResult($oneLog);
		$raw_result_lenght = count($raw_result);

		$result = array();
		$messages = array();
		
		foreach ($raw_result as $key => $value) {
			if (strpos($key, "Message") !== false && strpos($key, "Message ID") === false) 
			{
				$messages[] = $value;
			}
			else
			{
				$result[$key] = $value;
			}
		}
		$result['Message'] = $messages;

		return $result;

	}
}
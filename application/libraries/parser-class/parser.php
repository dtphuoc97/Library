<?php 
abstract class Parser
{
	
	protected $file='';
	function __construct()
	{
		# code...
	}

	abstract function checkFile();
	/**
	 * read file and parse
	 * argument: file path
	 */
	
	abstract function doParser();

	/**
	 * export result to json
	 * argument: file path
	 */
	// function exportJsonOutput($file='')
	// {
	// 	if(!$this->checkFile($file))
	// 	{
	// 		return false;
	// 	}
	// 	$output = $this->doParser($file);
	// 	return json_encode($output);
	// 	// return json format from array
	// }
	public function setFile($file)
	{
		$this->file = $file;
	}
	public function exportArrayOutput()
	{
		if(!$this->checkFile($this->file))
		{
			return false;
		}
		$output = $this->doParser($this->file);
		
		return $output;
		//return array format
	}
}

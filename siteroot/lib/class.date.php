<?php

class Date
{
	private $datetime;
	public function __construct($date)
	{
		$this->datetime = $date;
	}
	public function get_datetime()
	{
		return $datetime;	
	}
	public function get_string_formatted($format)
	{
		$phpdate = strtotime($this->datetime);
		return date($format, $phpdate);
	}
	public function get_string()
	{
		if($this->datetime != NULL)
			return $this->get_string_formatted('H:i M jS');
		else return "TBA";
	}
}
?>
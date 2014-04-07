<?php  
  
class Database  
{
	protected $link;
    private $user = 'perry';
    private $pass = '@pollo';
    private $host = 'localhost';
	private $dbid = 'companion';
	private $connected = false;
  
    public function __construct()
    {  
		if(!$this->connect()) trigger_error("Couldn't connect to database");
    }
	
	public function connect()
	{
		if($this->connected)
			return true;
		$this->link = mysql_connect($this->host, $this->user, $this->pass);
		$this->connected = ($this->link != NULL);
		if(!$this->connected)
			return false; // couldn't connect
		return mysql_select_db($this->dbid); // true if success, false if cant select
	}
	
	public function is_connected()
	{
		return $this->connected;
	}
}
  
?>  

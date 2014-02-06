<?php  
  
class User  
{
    public $ID;
	public $Name;
	public $Username;
	// not going to store hash for security, just check it
	  
    public function __construct($id)
    {
        $this->ID = $id;
		// TODO: factory method to retrieve from db
    }
	
	// TODO: remove, debug function
	public function quick_dump()
	{
		var_dump($this);	
	}
}  
  
?>  

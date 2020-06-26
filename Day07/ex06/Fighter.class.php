<?php
class Fighter{
	private $type;
	public function __construct($name_type)
	{
		$this->type = $name_type;
	}
	public function getType(){
		return $this->type;
	}


}
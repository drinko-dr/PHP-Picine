<?php
class UnholyFactory{
    private $fighters = array();

    public function absorb($o){
    	if ($o instanceof Fighter){
    		if (in_array($o, $this->fighters))
    			print ("(Factory already absorbed a fighter of type ");
    		else{
				$this->fighters[] = $o;
    			print ("(Factory absorbed a fighter of type ");
			}
			print ($o->getType() .")".PHP_EOL);
		}else
			print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
	}

	function fabricate($name_att){
		foreach ($this->fighters as $value){
			if ($value->getType() == $name_att) {
				print ("(Factory fabricates a fighter of type ". $value->getType() .")" . PHP_EOL);
				return $value;
			}
		}
		print ("(Factory hasn't absorbed any fighter of type ". $name_att .")".PHP_EOL);
		return null;
	}

}
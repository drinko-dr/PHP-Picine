<?php
class NightsWatch implements IFighter {

	private $recruit;

	function recruit($o){
		if ($o instanceof IFighter){
			$this->recruit[] = $o;
		}
	}
	public function fight()
	{
		foreach ($this->recruit as $value) {
			$value->fight();
		}
	}

}
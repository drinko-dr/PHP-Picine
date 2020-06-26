<?php
class Tyrion extends Lannister{

	public function sleepWith(object $o)
	{
		if ($o instanceof Lannister)
			print ("Not even if I'm drunk !" . PHP_EOL);
		else
			return "Let's do this." . PHP_EOL;
	}
}
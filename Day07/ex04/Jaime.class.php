<?php
class Jaime extends Lannister {

	public function sleepWith(object $o)
	{
		if ($o instanceof Cersei)
			print ("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
		else if ($o instanceof Lannister)
			print ("Not even if I'm drunk !" . PHP_EOL);
		else
			print ("Let's do this." . PHP_EOL);

	}
}
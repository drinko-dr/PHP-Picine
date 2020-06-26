<?php
Class Color{
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = false;

	function __construct(array $rgb)
	{
		if (array_key_exists('rgb', $rgb)){
			$color = intval($rgb['rgb']);
			$this->red = ($color >> 16) & 255;
			$this->green = ($color >> 8) & 255;
			$this->blue = $color & 255;
		}else if (array_key_exists('red', $rgb) && array_key_exists('green', $rgb) && array_key_exists('blue', $rgb)) {
			$this->red = intval($rgb['red']);
			$this->green = intval($rgb['green']);
			$this->blue = intval($rgb['blue']);
		}
		if (self::$verbose)
			printf("%s constructed.\n", $this->__toString());
	}

	public static function doc()
	{
		if (file_exists('Color.doc.txt'))
			return file_get_contents('Color.doc.txt');
	}

	function __toString()
	{
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	function __destruct()
	{
		if (self::$verbose)
			printf("%s destructed.\n", $this->__toString());
	}

	public function add(Color $color){
		return new Color(array('red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue));
	}

	public function sub(Color $color){
		return new Color(array('red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue));
	}

	public function mult($num){
		return new Color(array('red' => $this->red * $num, 'green' => $this->green * $num, 'blue' => $this->blue * $num));
	}
}
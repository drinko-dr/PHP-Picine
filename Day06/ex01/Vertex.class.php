<?php

require_once ("Color.class.php");

Class Vertex{
    private $_x = 0;
    private $_y = 0;
    private $_z = 0;
    private $_w = 1.0;
    private $_color;
	public static $verbose = false;

    public function __construct(array $argv)
	{
		$this->_x = $argv['x'];
		$this->_y = $argv['y'];
		$this->_z = $argv['z'];
		if (array_key_exists('w',$argv))
			$this->_w = $argv['w'];
		if (array_key_exists('color',$argv))
			$this->_color = $argv['color'];
		else
			$this->_color = new Color(array('reg' => 255, 'green' => 255, 'blue' => 255));
		if (self::$verbose)
			printf ("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )",
										$this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red,
										$this->_color->green, $this->_color->blue);

	}

	function __toString()
	{
		if (self::$verbose)
			return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )",
										$this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red,
										$this->_color->green, $this->_color->blue));
		return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )",
										$this->_x, $this->_y, $this->_z, $this->_w));
	}


	public static function doc()
	{
		if (file_exists('Vertex.doc.txt'))
			return file_get_contents('Vertex.doc.txt');
	}

	public function getX()
	{
		return $this->_x;
	}

	public function setX($x): void
	{
		$this->_x = $x;
	}

	public function getY()
	{
		return $this->_y;
	}

	public function setY($y): void
	{
		$this->_y = $y;
	}

	public function getZ()
	{
		return $this->_z;
	}

	public function setZ($z): void
	{
		$this->_z = $z;
	}

	public function getW()
	{
		return $this->_w;
	}

	public function setW($w): void
	{
		$this->_w = $w;
	}

	public function getColor(): Color
	{
		return $this->_color;
	}

	public function setColor(Color $color): void
	{
		$this->_color = $color;
	}

}
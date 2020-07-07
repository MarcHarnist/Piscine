<?php
/* by Marc Harnist 2017 */
  class Message
  {
    private $_red;
	private $_green;
	private $_normal;
	
	public function setRed($red)
	{
		$this->_red = $red;
	}
	public function setGreen($green)
	{
		$this->_green = $green;
	}
	public function setNormal($normal)
	{
		$this->_normal = $normal;
	}
	public function red()
	{
		return $this->_red;
	}
	public function green()
	{
		return $this->_green;
	}
	public function normal()
	{
		return $this->_normal;
	}

	public function addRed()
	{
		$this->_red .= $red;
	}
	public function addGreen()
	{
		$this->_green .= $green;
	}
	public function addNormal()
	{
		$this->_normal .= $normal;
	}
}
<?php 

/**
* 
*/
class persegipanjang
{
	public $panjang;
	public $lebar;
	function __construct($panjangnya,$lebarnya)
	{
		this->panjang=$panjangnya;
		this->lebar=$lebarnya;
	}
	public function hitungluas()
	{
		$luas=this->panjang*this->lebar;
		return $luas
	}
	public function hitungluas()
	{
		$keliling=2(this->panjang+this->lebar);
		return $keliling
	}
}
?>
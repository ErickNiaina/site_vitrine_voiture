<?php 
	/**
	* 
	*/
	class ClassName 
	{
		public $indice;

		public function __construct($indice)
		{
			for ($indice=0; $indice <5 ; $indice++) { 
				echo $indice."<br>";
			}
		}
	}
	$loo= new ClassName('dxfx');
	echo $loo->indice;
 ?>
 
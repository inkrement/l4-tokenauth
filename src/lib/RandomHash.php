<?php

namespace Pichkrement\Tokenauth\Lib;

use \Illuminate\Support\Facades\Config as Config;

class RandomHash {

	private $length;
	private $alpha;

	public function __construct(){
		//TODO $app->make('config')->get('tokenauth');
	}

	public function __construct(Config $config){
		$this->legth = $config->get('length');
		$this->alpha = $config->get('alpha');
	}

	public function __construct($legth, $alpha){
		$this->legth = $legth;
		$this->alpha = $alpha;
	}


	public function getRandomToken(){
		$token = '';
		$max = strlen($this->alpha) - 1;

		for($i = 0; $i < $this->length; $i++)
			$token .= $this->alpha[mt_rand(0, $max)];

		return $token;
	}

}


?>
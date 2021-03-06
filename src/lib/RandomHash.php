<?php

namespace Pichkrement\Tokenauth\Lib;

use \Illuminate\Support\Facades\Config as Config;

class RandomHash {

	private $length;
	private $alpha;

	public function __construct($length, $alpha){
		$this->length = $length;
		$this->alpha = $alpha;
	}

	/**
	 * getRandomToken
	 *
	 * @return string random token
	 */
	public function getRandomToken(){
		$token = '';
		$max = strlen($this->alpha) - 1;

		for($i = 0; $i < $this->length; $i++)
			$token .= $this->alpha[mt_rand(0, $max)];

		return $token;
	}

}


?>
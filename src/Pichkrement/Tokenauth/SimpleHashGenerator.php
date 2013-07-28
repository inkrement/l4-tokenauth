<?php

namespace Pichkrement\Tokenauth;

class SimpleHashGenerator implements HashGeneratorInterface {

	static function getToken($length=null, $alpha = null){
		if(is_null($length)){
			//load default length from config
			//TODO
		}

		if(is_null($alpha)){
			//load default alpha from config
			//TODO
		}

		$ret = "";

		for($i=0; $i < $length; $i++){
			$next = $alpha{rand(0, strlen($alpha) - 1)};

			$ret .= $next;
		}

		return $ret;
	}

}
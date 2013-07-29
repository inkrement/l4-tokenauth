<?php

namespace Pichkrement\Tokenauth;

class SimpleHashGenerator implements HashGeneratorInterface {

	static function getToken($length=null, $alpha = null, $urlencode = null){

		/* load config */
		$val = include __DIR__."/../../config/token.php";

		/* load default length property from config */
		if(is_null($length))
			$length = $val['length'];
		
		/* load default alpha property from config */
		if(is_null($alpha))
			$length = $val['alphabet'];

		/* load default urlencode property from config */
		if(is_null($urlencode))
			$urlencode = $val['urlencode'];

		$ret = "";

		for($i=0; $i < $length; $i++){
			/* get random char from alphabet */
			$next = $alpha{rand(0, strlen($alpha) - 1)};

			$ret .= $next;
		}

		return ($urlencode)? rawurlencode($ret): $ret;
	}

}
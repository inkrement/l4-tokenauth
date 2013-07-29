<?php

namespace Pichkrement\Tokenauth;

interface HashGeneratorInterface {
	static function getToken($length, $alpha, $urlencode);
}
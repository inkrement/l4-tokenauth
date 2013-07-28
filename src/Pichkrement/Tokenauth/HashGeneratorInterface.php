<?php

namespace Pichkrement\Tokenauth;

interface HashGeneratorInterface {
	function getToken($length=null, $alpha = null);
}
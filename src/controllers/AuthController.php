<?php

namespace Pichkrement\Tokenauth;

class AuthController extends \BaseController {

	public function logout(){
		\Auth::logout();

		\Redirect::to(\URL::previous());
	}


}

?>
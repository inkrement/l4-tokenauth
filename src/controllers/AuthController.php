<?php

namespace Pichkrement\Tokenauth;

class AuthController extends \Illuminate\Routing\Controllers\BaseController {

	public function login(){
		return "login controller - yay!";
	}

	public function logout(){
		\Auth::logout();

		\Redirect::to(\URL::previous());
	}


}

?>
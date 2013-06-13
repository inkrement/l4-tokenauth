<?php

Log::info("Tokenauth: register admin-filter ...");

Route::filter('admin', function()
{
	log::info("tokenauth: admin-filter triggered");

	$token = Input::get('token');

    if(!empty($token)){

        /* try to log in */
        $user =  User::where('token', '=', $token)->first();

        if(is_null($user))
            return Redirect::to('auth/login');

        Auth::login($user->id, array_get(array(), 'remember'));
    }

    if (Auth::guest()){
            return Redirect::to('auth/login');
    }
});


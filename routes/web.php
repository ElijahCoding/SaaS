<?php

Route::get('/token',function() {
  $token = auth()->user()->generateConfirmationToken();
  dd($token);
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function() {
  Route::get('/dashboard', 'DashboardController@index');
});



/**
* Account
*/
Route::group(['prefix' => 'account', 'middleware' => ['auth'], 'as' => 'account.', 'namespace' => 'Account'],function() {
  Route::get('/','AccountController@index')->name('index');

  /**
  * Profile
  */
  Route::get('/profile','ProfileController@index')->name('profile.index');
  Route::post('/profile','ProfileController@store')->name('profile.store');

  /**
  * Password
  */
  Route::get('/password','PasswordController@index')->name('password.index');
  Route::post('/password','PasswordController@store')->name('password.store');


  /**
  * Subscription
  */
  Route::group(['prefix' => 'subscription', 'namespace' => 'Subscription'],function() {
      /**
      * Cancel
      */
      Route::get('/cancel','SubscriptionCancelController@index')->name('subscription.cancel.index');
      Route::post('/cancel','SubscriptionCancelController@store')->name('subscription.cancel.store');

  });

});


/**
* Activation
*/
Route::group(['prefix' => 'activation', 'as' => 'activation.', 'middleware' => ['guest']],function() {
  Route::get('/resend', 'Auth\ActivationResendController@index')->name('resend');
  Route::post('/resend', 'Auth\ActivationResendController@store')->name('resend.store');
  Route::get('/{confirmation_token}', 'Auth\ActivationController@activate')->name('activate');

});

/**
* Plans
*/
Route::group(['prefix' => 'plans', 'as' => 'plans.'],function() {
  Route::get('/','Subscription\PlanController@index')->name('index');
  Route::get('/teams','Subscription\PlanTeamController@index')->name('teams.index');
});

/**
* Payment (Subscription)
*/
Route::group(['prefix' => 'subscription', 'as' => 'subscription.', 'middleware' => 'auth.register'],function() {
  Route::get('/','Subscription\SubscriptionController@index')->name('index');
  Route::post('/','Subscription\SubscriptionController@store')->name('store');
});

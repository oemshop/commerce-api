<?php

Route::post('/auth', 'Auth\AuthController@authenticate');
Route::post('/register', 'Auth\RegisterController@register');

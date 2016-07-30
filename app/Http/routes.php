<?php


Route::get('/', 'IagController@home');

Route::get('/podelenie_autocomplete', ['as' => 'podelenie_autocomplete', 'uses' => 'AotocompleteController@podelenie_autocomplete' ]);

Route::get('/api/signali',['as'=>'signalidata','uses'=>'DatatablesController@signaliData']);


//Route::get('/signali/iag/home',['as'=>'signali.iag.home','uses'=>'HomeController@index']);
//Route::resource('signali/iag','SignaliController');
Route::get('/signali/iag/home',['as'=>'signali.iag.home','uses'=>'IagController@home']);
//iag user
Route::resource('signali/iag','IagController');
Route::resource('signali/report', 'ReportController');
Route::get('signali/spravki/', ['as'=>'signali.spravki.index', 'uses' => 'SpravkaController@index']);
Route::get('signali/spravki/podelenia/{podelenia}', ['as'=>'signali.spravki.podelenia', 'uses' => 'SpravkaController@podelenia']);
Route::get('signali/spravki/dp', ['as'=>'signali.spravki.dp', 'uses' => 'SpravkaController@dp']);
//Route::get('signali/report/create/{report}', 'ReportController@create');
//Route::get('signali/report/create/{report}', 'ReportController@create');
//Route::post('signali/report/store', 'ReportController@store');
//rdg + dp
//Route::resource('signali/rdg','RdgController');
////dgs + obshtini
//Route::resource('signali/dgs','DgsController');


#Route::get('/signali/podelenia',['as'=>'podelenia','uses'=>'PodeleniaController@index']);

#Route::get('/search','PodeleniaController@search');





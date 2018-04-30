<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  

Route::get('/', function () {
    $data = ['name' => 'James'];
    return view('index',$data);
    //return view('welcome');
});

Route::get('index',['as' => 'index'],function(){
});

//normal route
Route::get('username/{id?}',['as' => 'view.show'] , function($name= John){
    return 'My Name is'.$name;
});
//group the route convinean to manage,and prefix if for initial url
Route::group(['prefix'=> 'admin'],function(){
  Route::post('users',function(){
    //reality route is admin/users
  });
});
//only for few domain can using this route
Route::group(['domain'=>'{account}.myapp.com'],function(){
  Route::get('user/{id}',function($account,$id){
    //if URL ={account}.myapp.com then jump in this route
  });
});

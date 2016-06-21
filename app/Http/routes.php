<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::group(['middleware'=>'web'],function (){
   /*
    * Show task dashboard
    * */
//    Route::get('/', function () {
//        $task=\App\Models\Task::orderBy('created_at','asc')->get();
//        return view('task',[
//            'tasks'=>$task
//        ]);
//
//    });
//            /*
//             * Add task
//             * */
//
//    Route::post('/task', function (\Illuminate\Http\Request $request) {
//        $v= Validator::make($request->all(),
//            [
//                'task'=>'required|max:25'
//            ]);
//        if ($v->fails())
//        {
//            return redirect('/')
//                ->withInput()
//                ->withErrors($v);
//        }
//        $task=new \App\Models\Task();
//        $task->name=$request->task;
//
//        $task->save();
//        return redirect('/');
//    });
//
//
//            /*
//            * Delete task
//            * */
//    Route::delete('/task/{task}', function (\App\Models\Task $task) {
//            $task->delete();
//        return redirect('/');
//    });
//});
//Route::get('/test', [
//    'as' => 'test', 'uses' => 'TestController@index'
//]);
    Route::get('/', function ()
    {

        return view('welcome');
    });

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'],function ()
{
   Route::get('/tasks','TaskController@index');
   Route::get('/task/create','TaskController@create');
   Route::post('/task','TaskController@store');
    Route::get('/task/{task}','TaskController@edit');
    Route::put('/task/{task}','TaskController@update');
   Route::delete('/task/{task}','TaskController@destroy');
    
    Route::resource('/newTask','NewTaskController');
    
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Requests\NameRequest;
use App\Task;

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
    $tasks = Task::orderBy('created_at','asc')->get();
    return view('tasks', ['tasks' => $tasks]);
});


/**
 * Add New Task
 */
Route::post('/task', function (NameRequest   $request) {
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect("/");
});